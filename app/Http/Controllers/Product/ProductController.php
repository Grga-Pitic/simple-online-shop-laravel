<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Services\Product\ProductRepository;
use App\Services\CommentListRepository;


class ProductController extends Controller {
	public function show(int $id = null){
		try {
			$container  = app();
			$productRepository = $container->make(ProductRepository::class);
			$commentRepository = $container->make(CommentListRepository::class);

			$model       = $productRepository->getProductByID($id);
			$commentList = $commentRepository->getListByProductId($id);

			$this->getDataForHeader($container);
			$this->putParameter('product', $model);
			$this->putParameter('commentList', $commentList);

			$parameters = $this->getParameters();

			return view('bootstrap.product.page', $parameters);
		} catch (\UnderflowException $e){
			abort(404);
		}
		
	}
	
}