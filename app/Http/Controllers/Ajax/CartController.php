<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CartModel;
use App\Services\CartService;
use App\Services\Product\ProductRepository;

class CartController extends Controller {
    public function quickAdd(Request $request) {
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

        $productId = $request->input("productId");

        $product = $productRepository->getProductById($productId);
        $productQuantity = $request->input('count');
        $model->edit($productId, $productQuantity);
        $model->saveChanges();

        return view('bootstrap.cart.row', ['product' => $product, 'quantity' => $productQuantity]);
    }

    public function remove(Request $request){
        $container = app();
        $model     = $container->make(CartModel::class);
        $productRepository = $container->make(ProductRepository::class);

        $productId = $request->input("productId");
        $quantityBeforeDeleting = $model->getDataArray()[$productId];

        $model->removeAll($productId);
        $model->saveChanges();

        $product = $productRepository->getProductById($productId);

        return view('bootstrap.cart.messages.rowDeleted',  [
            'product' => $product,
            'quantity' => $quantityBeforeDeleting
        ]);

    }

    public function clear() {
        $container = app();
        $model     = $container->make(CartModel::class);
        $model->clear();
        $model->saveChanges();

        return view('cart.empty');
    }
}
