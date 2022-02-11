<?php


namespace App\Repositories\Comments;


use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class CommentsRepository extends BaseRepository
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

    /**
     * @param $id
     *
     * @return int
     */
    public function getProductCommentsCount($id)
    {
        return DB::table($this->model->getTable())->where('product_id', $id)
            ->whereNotNull('body')->where('status', 'enable')->count();
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function getProductAverageVotes($id)
    {
        return DB::table($this->model->getTable())->where('product_id', $id)
            ->whereNotNull('vote')->where('status', 'enable')->average('vote');
    }
}