<?php


namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Services\Product\ProductRepository;

class HomepageController extends Controller {

    public function show(Request $request){

        $container = app();

        $productRepository = $container->make(ProductRepository::class);
        $productList = $productRepository->getProductsArray();

        $this->getDataForHeader($container);
        $this->putParameter('discountList', $productList->getArray());

        $parameters = $this->getParameters();

        return view('bootstrap.main', $parameters);
    }

}