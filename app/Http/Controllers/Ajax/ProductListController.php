<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Services\Product\ProductRepository;
use App\Services\ProductListService;

class ProductListController extends Controller{
	public function show(Request $request) {
    	$container   = app();
        $repository  = $container->make(ProductRepository::class);
        $service     = $container->make(ProductListService::class);

        $parameters  = $service->readParameters($request);
        $parameters  = $service->setDefaultParameters($parameters);
        $productList = $repository->getProductsArray($parameters);

        return view('bootstrap.catalog.list.wrap', [
        	'productList' => $productList->getArray(),
        	'listSize' => $productList->getSize(),
        	'currentPage' => $parameters['page'],
        	'pageSize' => $parameters['productCount'],
        	'pagesQuantity' => $service->getPagesQuantity($parameters['productCount'], $productList->getSize())
        	]);
    }	
}