<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function ShowProductPage() {
        return view('admin.products');
    }
}
