<?php


namespace App\Requests;


use Illuminate\Http\Request;

class ProductCommentsRequest extends Request
{
    public $productId;
    public $offset = 0;
    public $limit;

    /**
     * @param mixed $productId
     */
    public function setProductId($productId): void
    {
        $this->productId = $productId;
    }

    /**
     * @param mixed $limit
     */
    public function setLimit($limit): void
    {
        $this->limit = $limit;
    }

    /**
     * @param mixed $offset
     */
    public function setOffset($offset): void
    {
        $this->offset = $offset;
    }

}