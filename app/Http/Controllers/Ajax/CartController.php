<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Services\CartService;
use App\Services\Product\ProductRepository;

class CartController extends Controller {
    public function send(Request $request) {
    	$container = app();
    	$model     = $container->make(CartModel::class); 
    	$service   = $container->make(CartService::class);

        $service->do($request, $model);

        return view('cart.success');
    }

    public function edit(Request $request) {
    	$container = app();
    	$model     = $container->make(CartModel::class);
    	$service   = $container->make(CartService::class);
        $productRepository = $container->make(ProductRepository::class);

        $service->do($request, $model);
        $cartData = $model->getDataArray();

        $productId = $request->input("productId");
        if(!isset($cartData[$productId])){
            return view('cart.deleted');
        }

        $product = $productRepository->getProductById($productId);
        $productQuantiry = $cartData[$productId];

        return view('cart.field', ['product' => $product, 'quantity' => $productQuantiry]);
    }

    public function clear() {
        $container = app();
        $model     = $container->make(CartModel::class);
        $model->clear();
        $model->saveChanges();

        return view('cart.empty');
    }
}
