<?php


namespace App\Http\Controllers;



use App\General\AppResponse;
use App\Http\Requests\ChangeCommentStatus;
use App\Http\Requests\ChangeStatus;
use App\Http\Requests\ChangeVoteStatus;
use App\Repositories\Products\ProductsRepository;
use App\Services\Products\ProductService;

class ProductController extends Controller
{
    /**
     * @param \App\Services\Products\ProductService $productService
     *
     * @return \App\General\AppResponse
     */
    public function list(ProductService $productService)
    {
        $products = $productService->Handle();
        return new AppResponse(200, $products);
    }

    /**
     * @param                                               $id
     * @param \App\Http\Requests\ChangeStatus           $request
     * @param \App\Repositories\Products\ProductsRepository $productsRepository
     *
     * @return \App\General\AppResponse
     */
    public function changeStatus($id, ChangeStatus $request, ProductsRepository $productsRepository)
    {
        $update = $productsRepository->edit($id, ['status' => $request->status]);
        return new AppResponse(($update == 1) ? 204 : 202);
    }

    /**
     * @param                                               $id
     * @param \App\Http\Requests\ChangeVoteStatus           $request
     * @param \App\Repositories\Products\ProductsRepository $productsRepository
     *
     * @return \App\General\AppResponse
     */
    public function changeVote($id, ChangeVoteStatus $request, ProductsRepository $productsRepository)
    {
        $update = $productsRepository->edit($id, ['vote' => $request->status]);
        return new AppResponse(($update == 1) ? 204 : 202);
    }

    /**
     * @param                                               $id
     * @param \App\Http\Requests\ChangeCommentStatus        $request
     * @param \App\Repositories\Products\ProductsRepository $productsRepository
     *
     * @return \App\General\AppResponse
     */
    public function changeCommentStatus($id, ChangeCommentStatus $request, ProductsRepository $productsRepository)
    {
        $update = $productsRepository->edit($id, ['comment_status' => $request->status]);
        return new AppResponse(($update == 1) ? 204 : 202);
    }
}