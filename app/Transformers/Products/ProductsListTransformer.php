<?php


namespace App\Transformers\Products;


use App\Transformers\BaseTransformer;

class ProductsListTransformer extends BaseTransformer
{

    /**
     * @param array $data
     *
     * @return array
     */
    public function Transform($data = []):array
    {
        foreach ($data as $product) {
            $productObjsect = new ProductObject();
            $productObjsect->setId($product->id);
            $productObjsect->setName($product->title);
            $productObjsect->setDescription($product->description);
            $productObjsect->setPrice($product->price ?? null);
            $productObjsect->setCommentStatus($product->comment_status);
            $productObjsect->setVote($product->vote);
            $productObjsect->setAverageRate($product->average_rate);
            $productObjsect->setCommentCount($product->commanet_count ?? 0);
            $this->response[] = $productObjsect;
        }

        return $this->response;
    }
}