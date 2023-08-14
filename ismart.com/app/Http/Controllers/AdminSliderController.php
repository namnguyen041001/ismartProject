<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class AdminSliderController extends Controller
{
    function __construct()
    {
        $this->middleware(function ($request, $next) {
            session(['module_active' => 'slider']);
            return $next($request);
        });
    }

    function show(Request $request)
    {
        if ($request->input('status') == 'public') {
            $sliders = Slider::where('status',1)->get();
        }elseif($request->input('status') == 'private'){
            $sliders = Slider::where('status',0)->get();
        }elseif($request->input('btn-search')){
            $search_users = $request->input('search_users');
            $sliders = Slider::where('name', 'LIKE', "%{$search_users}%")->paginate(10);
        }else{
            $sliders = Slider::get();
        }
        #tính tổng các trang thái slider
        $count_slider = array();
        $count_slider['all'] = Slider::get()->count();
        $count_slider['private'] = Slider::where('status',0)->get()->count();
        $count_slider['public'] = Slider::where('status',1)->get()->count();

        return view('admin.slider.show', compact('sliders','count_slider'));
    }

    function add()
    {
        return view('admin.slider.add');
    }
    function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|max:80|min:5',
                'file' => 'required|file|image|mimes:jpeg,png,gif',
                'ordinal_number' => 'required|integer|unique:sliders,ordinal_number',
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'mimes' => 'Đuôi file không đúng định dạng',
                'unique' => ':attribute đã tồn tại',
                'integer' => ':attribute nhập vào phải là số nguyên',
            ],
            [
                'name' => 'Tên sản phẩm',
                'file' => 'File',
                'ordinal_number' => "Số thứ tự",
            ],
        );

        $file = $request->file;
        // lấy tên file:
        $file_name = $file->getClientOriginalName();
        $path =  $file->move('public/uploads', $file->getClientOriginalName());
        $thumbnail = 'uploads/' . $file_name;

        Slider::create([
            'name' => $request->input('name'),
            'ordinal_number' => $request->input('ordinal_number'),
            'thumbnail' => $thumbnail,
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.slider.show')->with('status', "Thêm Slider thành công");
    }

    function update(Slider $slider)
    {
        return view('admin.slider.update', compact('slider'));
    }

    function edit(Request $request, Slider $slider)
    {
        $request->validate(
            [
                'name' => 'required|max:80|min:5',
                'file' => 'file|image|mimes:jpeg,png,gif',
                'ordinal_number' => 'required|integer|unique:sliders,ordinal_number,' . $slider->id,
            ],
            [
                'required' => ':attribute không được bỏ trống',
                'max' => ':attribute phải ít hơn:max kí tự',
                'min' => ':attribute phải nhiều hơn :min kí tự',
                'mimes' => 'Đuôi file không đúng định dạng',
                'unique' => ':attribute đã tồn tại',
                'integer' => ':attribute nhập vào phải là số nguyên',
            ],
            [
                'name' => 'Tên sản phẩm',
                'file' => 'File',
                'ordinal_number' => "Số thứ tự",
            ],
        );
        if ($request->hasFile('file')) {
            $file = $request->file;
            // lấy tên file:
            $file_name = $file->getClientOriginalName();
            $path = $file->move('public/uploads', $file->getClientOriginalName());
            $thumbnail = 'uploads/' . $file_name;
        }

        $slider->update([
            'name' => $request->input('name'),
            'ordinal_number' => $request->input('ordinal_number'),
            'thumbnail' => ($request->hasFile('file')) ? $thumbnail : $slider->thumbnail,
            'status' => $request->input('status'),
        ]);
        return redirect()->route('admin.slider.show')->with('status', "Cập nhật Slider thành công");
    }

    function delete(Slider $slider)
    {
        $slider->delete();
        return redirect()->route('admin.slider.show')->with('status', "Xóa Slider thành công");
    }
}
