<?php


namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CommentModel;
use App\Services\CommentListRepository;

class CommentController extends Controller{
    public function send(Request $request, $id) {

        $name = $request->input('name');
        $text = $request->input('text');

        $container = app();
        $repository = $container->make(CommentListRepository::class);
        $commentModel = $container->make(CommentModel::class, ['name' => $name, 'text' => $text]);

        $repository->saveOneById($commentModel, $id);

        return view('product.messages.commentSuccess');
    }
}