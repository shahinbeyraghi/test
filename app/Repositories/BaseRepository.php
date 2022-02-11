<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

abstract class BaseRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function store($data)
    {
        $data['created_at'] = new \DateTime();
        DB::table($this->model->getTable())->insert($data);
        return DB::getPdo()->lastInsertId();
    }

    /**
     * @param $data
     *
     * @return bool
     */
    public function batchStore($data)
    {
        return DB::table($this->model->getTable())->insert($data);
    }

    /**
     * @param $id
     * @param $data
     *
     * @return int
     */
    public function edit($id, $data)
    {
        return DB::table($this->model->getTable())->where('id', $id)->update($data);
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model|\Illuminate\Database\Query\Builder|object|null
     */
    public function getById($id)
    {
        return DB::table($this->model->getTable())->where('id', $id)->first();
    }

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return \Illuminate\Support\Collection|null
     */
    public function getList($offset = 0, $limit = 20)
    {
        $list = DB::table($this->model->getTable())->offset($offset)->limit($limit)->get();

        if ($list->isEmpty()) {
            return null;
        }
        return $list;
    }

}