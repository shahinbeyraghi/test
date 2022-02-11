<?php


namespace App\Services\Products;


use App\Services\Service;

class ProductService extends Service
{
    public function Handle($request)
    {
        $list = $this->repository->getEnableList();
        if (!$list) {
            return [];
        }
        foreach ($list as &$product) {
            $className = '\App\ThirdParties\\'.ucfirst($product->provider);
            if (class_exists($className)) {
                $product->price = resolve($className)->getPrice();
            }
        }
        return $this->transformer->Transform($list);
    }
}