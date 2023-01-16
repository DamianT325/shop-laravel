<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product_With_Image;

class MainPage extends Controller
{
    public function index() {
        return view('main', [
            'products' => Product_With_Image::paginate(6)
        ]);
    }
}
