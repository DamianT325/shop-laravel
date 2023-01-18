<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\Product_With_Image;
use Illuminate\View\View;

class MainPage extends Controller
{
    public function index(Request $request): View|JsonResponse {
        $filter = $request->query('filter');



        return view('main', [
            'products' => Product_With_Image::paginate(6),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get()
        ]);
    }
}
