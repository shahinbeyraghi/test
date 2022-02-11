<?php


namespace App\Services;


use App\Repositories\BaseRepository;
use App\Transformers\BaseTransformer;
use Illuminate\Http\Request;

abstract class Service
{
    /**
     * @var \App\Repositories\BaseRepository
     */
    protected $repository;
    /**
     * @var \App\Transformers\BaseTransformer
     */
    protected $transformer;

    public function __construct(BaseRepository $baseRepository, BaseTransformer $baseTransformer)
    {
        $this->repository = $baseRepository;
        $this->transformer = $baseTransformer;
    }

    abstract public function Handle(Request $request);
}