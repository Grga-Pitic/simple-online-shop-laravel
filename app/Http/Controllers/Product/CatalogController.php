<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Ajax\ProductListController;
use Illuminate\Http\Request;

use App\Services\Product\ProductRepository;
use App\Services\ProductListService;

class CatalogController extends Controller {
    public function show(Request $request) {
        $container = app();
        $repository = $container->make(ProductRepository::class);
        $service     = $container->make(ProductListService::class);
        $listContoller = $container->make(ProductListController::class);

        // $parameters  = $service->readParams($request);
        // $productList = $repository->getProductsArray($parameters);

        $listHtmlCode = $listContoller->show($request);//view('catalog.list', ['productList' => $productList]);
        return view('catalog.main', ['list' => $listHtmlCode]);

    }
}
