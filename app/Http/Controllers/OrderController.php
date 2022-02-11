<?php


namespace App\Http\Controllers;



use App\General\AppResponse;
use App\Http\Requests\ChangeCommentStatus;
use App\Http\Requests\ChangeStatus;
use App\Http\Requests\ChangeVoteStatus;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Products\ProductsRepository;
use App\Services\Products\ProductService;

class OrderController extends Controller
{

    /**
     * @param                                           $id
     * @param \App\Repositories\Orders\OrdersRepository $orderRepository
     *
     * @return \App\General\AppResponse
     */
    public function orderExist($id, OrdersRepository $orderRepository)
    {
        $order = $orderRepository->getByProductId($id);
        return new AppResponse(($order) ? 200 : 404);
    }
}