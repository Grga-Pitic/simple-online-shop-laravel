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

        $requestParameters  = $service->readParameters($request);
        $requestParameters  = $service->setDefaultParameters($requestParameters);
        $productList = $repository->getProductsArray($requestParameters);
        $this->getDataForHeader($container);

        $this->putParameter('productList', $productList->getArray());
        $this->putParameter('listSize', $productList->getSize());
        $this->putParameter('currentPage', $requestParameters['page']);
        $this->putParameter('pageSize', $requestParameters['productCount']);
        $this->putParameter('pagesQuantity', $service->getPagesQuantity(
                                                            $requestParameters['productCount'],
                                                            $productList->getSize()
        ));
        $this->putParameter('maxPrice', $repository->getMaxPrice());


        $parameters = $this->getParameters();
        return view('bootstrap.catalog.page', $parameters);

    }
}
