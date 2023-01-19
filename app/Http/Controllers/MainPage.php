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
        $filters = $request->query('filter');
        $paginate = $request->query('paginate') ?? 5;
        $query = Product_With_Image::query();
        if (!is_null($filters)) {
            if (array_key_exists('categories', $filters)) {
                $query = $query->whereIn('category_id', $filters['categories']);
            }
            if (!is_null($filters['price_min'])) {
                $query = $query->where('price', '>=', $filters['price_min']);
            }
            if (!is_null($filters['price_max'])) {
                $query = $query->where('price', '<=', $filters['price_max']);
            }

            return response()->json($query->paginate($paginate));
        }



        return view('main', [
            'products' => $query->paginate(6),
            'categories' => ProductCategory::orderBy('name', 'ASC')->get()
        ]);
    }
}
