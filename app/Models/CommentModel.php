<?php


namespace App\Models;


class CommentModel {

    private $name;
    private $text;

    function __construct(string $name, string $text){

        $this->name = $name;
        $this->text = $text;

    }

    public function getName(){
        return $this->name;
    }

    public function getText(){
        return $this->text;
    }
}