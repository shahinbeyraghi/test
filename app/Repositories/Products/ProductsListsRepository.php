<?php


namespace App\Repositories\Products;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class ProductsListsRepository extends BaseRepository
{

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return array|\Illuminate\Support\Collection
     */
    public function getEnableList($offset = 0, $limit = 20)
    {
        $list = DB::table($this->model->getTable())->where('status', 'enable')->offset($offset)->limit($limit)->get();

        if ($list->isEmpty()) {
            return [];
        }
        return $list;
    }
}