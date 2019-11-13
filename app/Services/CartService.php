<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\CartModel;

class CartService {

	public function do(Request $request, CartModel $model){
		$productId = $request->input('productId');
    	$action    = $request->input('action');
    	$count     = $request->input('count');

    	switch ($action) {
    		case 'a':  // add action
    			$this->add($model, $productId, $count);
                break;
    		case 'r':  // remove action
                $this->remove($model, $productId, $count);
                break;

            case 'ra':  // removeAll action
                $quantityBeforeRemoving = $model->getDataArray()[$productId];
                $this->removeAll($model, $productId);
                return $quantityBeforeRemoving;
    		
    		default:
    			# code...
    			break;
    	}
    	$model->saveChanges();
	}

	private function add(CartModel $model, int $productId, int $count){
		$model->add($productId, $count);
	}

	private function remove(CartModel $model, int $productId, int $count) {
		$model->remove($productId, $count);
	}

    private function removeAll(CartModel $model, int $productId) {
        $productQuantity = $model->getDataArray()[$productId];
        $model->remove($productId, $productQuantity);
    }

}