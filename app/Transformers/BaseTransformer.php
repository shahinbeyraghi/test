<?php


namespace App\Transformers;


abstract class BaseTransformer
{
    public $response;

    abstract public function Transform($data);
}