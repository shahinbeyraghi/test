<?php


namespace App\Services\Comments;


use App\Http\Requests\InsertCommentRequest;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Products\ProductsRepository;
use App\Services\Service;

/**
 * Class CommentsListService
 *
 * @property \App\Repositories\Comments\CommentsRepository $repository
 * @property \App\Transformers\Comments\CommentTransformer $transformer
 * @property \App\Requests\ProductCommentsRequest $request
 *
 * @package App\Services\Comments
 */
class InsertCommentService extends Service
{
    /**
     * @param InsertCommentRequest $request
     *
     * @return array
     */
    public function Handle($request)
    {
        $product = app()->make(ProductsRepository::class)->getById($request->id);

        if ($product->comment_status == 'enable_buyer' || $product->vote == 'enable_buyer') {
            $order = app()->make(OrdersRepository::class)->getByProductId($request->id);
        }

        if ($product->comment_status == 'enable' || ($product->comment_status == 'enable_buyer' && ($order ?? false))) {
            $store = $this->repository->store(['product_id' => $request->id, 'author_name' => 'test',
                'body' => $request->post('body', '')]);
        }

        if ($product->vote == 'enable' || ($product->vote == 'enable_buyer' && ($order ?? false))) {
            if ($store ?? false) {
                $this->repository->edit($store, ['vote' => $request->post('vote', '')]);
            } else {
                $store = $this->repository->store(['product_id' => $request->id, 'author_name' => 'test',
                    'vote' => $request->post('vote', '')]);
            }

        }
        return $store ?? '';
    }
}