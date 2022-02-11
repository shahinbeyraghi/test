<?php


namespace App\Services\Comments;


use App\Http\Requests\InsertCommentRequest;
use App\Repositories\Products\ProductsRepository;
use App\Services\Service;

/**
 * Class CommentsListService
 *
 * @property \App\Repositories\Comments\CommentsRepository $repository
 * @property \App\Transformers\Comments\CommentTransformer $transformer
 * @property \Illuminate\Http\Request $request
 *
 * @package App\Services\Comments
 */
class AcceptCommentService extends Service
{
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function Handle($request)
    {
        $edit = $this->repository->edit($request->id, ['status' => 'enable']);
        $comment = $this->repository->getById($request->id);

        if ($edit && $comment) {
            $count = $this->repository->getProductCommentsCount($comment->product_id);
            $rate = $this->repository->getProductAverageVotes($comment->product_id);
            $product = app()->make(ProductsRepository::class)->edit($comment->product_id, ['comment_count' => $count, 'average_rate' => $rate]);
        }
        return $edit;
    }
}