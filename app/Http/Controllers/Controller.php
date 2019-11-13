<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Models\CartModel;

class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private $parameters;

    function __construct() {
        $this->parameters = array();
    }

    protected function getDataForHeader($container){
        $cartModel = $container->make(CartModel::class);
        $cartTotal = count($cartModel->getDataArray());
        $this->putParameter('cartTotal', $cartTotal);
    }

    protected function getParameters() {
        return $this->parameters;
    }

    protected function putParameter(string $key, $value) {
        $this->parameters[$key] = $value;
    }

}
