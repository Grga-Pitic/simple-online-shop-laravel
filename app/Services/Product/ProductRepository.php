<?php

namespace App\Services\Product;

/**
* 
*/
interface ProductRepository {
	
	function getProductByID(int $id);

	// parameters:
	// int category >= 0
	// string orderBy (asc, desc)
	// int minPrice >= 0
	// int maxPrice >= 0
	// int page >= 0 (default 0)
	// int productCount > 10 and < 100 (default 20)

	function getProductsArray(array $parameters = array());

	function getProductsByArray(array $arrayOfId);
	
}