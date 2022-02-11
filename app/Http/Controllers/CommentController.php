<?php


namespace App\Http\Controllers;



use App\General\AppResponse;
use App\Http\Requests\ChangeCommentStatus;
use App\Http\Requests\ChangeStatus;
use App\Http\Requests\ChangeVoteStatus;
use App\Http\Requests\InsertCommentRequest;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Products\ProductsRepository;
use App\Requests\ProductCommentsRequest;
use App\Services\Comments\AcceptCommentService;
use App\Services\Comments\CommentsListService;
use App\Services\Comments\InsertCommentService;
use App\Services\Products\ProductService;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    /**
     * @param                                            $id
     * @param int                                        $limit
     * @param \App\Services\Comments\CommentsListService $commentsService
     * @param \App\Requests\ProductCommentsRequest       $productCommentsRequest
     *
     * @return \App\General\AppResponse
     */
    public function getList($id, $offset = 0, $limit = 20, CommentsListService $commentsService, ProductCommentsRequest $productCommentsRequest)
    {
        $productCommentsRequest->setProductId($id);
        $productCommentsRequest->setLimit($limit);
        $productCommentsRequest->setOffset($offset);
        $products = $commentsService->Handle($productCommentsRequest);
        return new AppResponse(200, $products);
    }

    /**
     * @param                                             $id
     * @param \App\Http\Requests\InsertCommentRequest     $commentsService
     * @param \App\Services\Comments\InsertCommentService $insertCommentService
     *
     * @return \App\General\AppResponse
     */
    public function store($id, InsertCommentRequest $commentsService, InsertCommentService $insertCommentService)
    {
        $products = $insertCommentService->Handle($commentsService);
        return new AppResponse(200, null, $products);
    }

    /**
     * @param                                             $id
     * @param \App\Services\Comments\AcceptCommentService $acceptCommentService
     * @param \Illuminate\Http\Request                    $request
     *
     * @return \App\General\AppResponse
     */
    public function acceptComment($id, AcceptCommentService $acceptCommentService, Request $request)
    {
        $request->id = $id;
        $accept = $acceptCommentService->Handle($request);
        return new AppResponse(200, null, $accept);
    }
}