<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product_With_Image;
use App\Models\ProductCategory;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Http\Requests\Product;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        return view('products.index', [
            'products' => Product_With_Image::paginate(6)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('products.create', [
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Product  $request
     * @return RedirectResponse
     */
    public function store(Product $request): RedirectResponse
    {
        $product = new Product_With_Image($request->validated());
        if ($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();
        return redirect(route('products.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param Product_With_Image $product
     * @return View
     */
    public function show(Product_With_Image $product) :View
    {
        return \view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Product_With_Image  $product
     * @return View
     */
    public function edit(Product_With_Image $product): View
    {
        return \view('products.edit', [
            'product' => $product,
            'categories' => ProductCategory::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Product  $request
     * @param  Product_With_Image  $product
     * @return RedirectResponse
     */
    public function update(Product $request, Product_With_Image $product): RedirectResponse
    {
        $product->fill($request->validated());
        if ($request->hasFile('image')){
            $product->image_path = $request->file('image')->store('products');
        }
        $product->save();
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product_With_Image
     * @return JsonResponse
     */
    public function destroy(Product_With_Image $product): JsonResponse
    {
        try {
            $product->delete();
            return response()->json([
                'status' => 'success',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Wystapil blad'
            ])->setStatusCode(500);
        }
    }
}
