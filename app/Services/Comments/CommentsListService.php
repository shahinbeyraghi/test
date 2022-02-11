<?php


namespace App\Services\Comments;


use App\Requests\ProductCommentsRequest;
use App\Services\Service;

/**
 * Class CommentsListService
 *
 * @property \App\Repositories\Comments\CommentsListsRepository $repository
 * @property \App\Transformers\Comments\CommentsListTransformer $transformer
 * @property \App\Requests\ProductCommentsRequest $request
 *
 * @package App\Services\Comments
 */
class CommentsListService extends Service
{
    /**
     * @param ProductCommentsRequest $request
     *
     * @return array
     */
    public function Handle($request)
    {
        $list = $this->repository->getEnableList($request->productId, $request->offset, $request->limit);
        if (!$list) {
            return [];
        }
        return $this->transformer->Transform($list);
    }
}