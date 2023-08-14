<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categor_id');
            $table->string('name',255);
            $table->text('detail')->nullable();
            $table->text('dess')->nullable();
            $table->integer('price');
            $table->integer('sale_price')->nullable();
            $table->string('thumbnail',255);
            $table->integer('status')->default(0);
            $table->foreign('categor_id')->references('id')->on('categors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
