<?php


namespace App\Repositories\Orders;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class OrdersRepository extends BaseRepository
{
    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getByProductId($id)
    {
        return DB::table($this->model->getTable())->where('product_id', $id)->first();
    }
}