<?php


namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\CommentModel;

class CommentListRepository {
    public function getListByProductId(int $productId){
        $query = DB::table('comments');
        $query->where('product_id', $productId);
        $result = $query->get();

        $models = array();
        foreach ($result as $row) {
            $newModel = new CommentModel($row->name, $row->text);
            array_push($models, $newModel);
        }

        return $models;
    }
}