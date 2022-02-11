<?php


namespace App\Repositories\Comments;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CommentsListsRepository extends BaseRepository
{

    /**
     * @param     $productId
     * @param int $offset
     * @param int $limit
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function getEnableList($productId, $offset = 0, $limit = 20)
    {
        $list = DB::table($this->model->getTable())->where('product_id', $productId)
            ->where('status', 'enable')->offset($offset)->limit($limit)->get();

        if ($list->isEmpty()) {
            return [];
        }
        return $list;
    }
}