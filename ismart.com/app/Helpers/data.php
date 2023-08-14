<?php
    function currency_format($data){
        return number_format($data,0,',','.');
    }
    function get_date($data){
        return date('Y-m-d', strtotime($data));
    }
?>