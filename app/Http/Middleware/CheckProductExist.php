<?php

namespace App\Http\Middleware;

use App\Models\Insurance;
use App\Models\RegisterCompany;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Products\ProductsRepository;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CheckProductExist
{

    /**
     * @var \App\Repositories\Products\ProductsRepository
     */
    private $productRepository;

    public function __construct(ProductsRepository $productsRepository)
    {
        $this->productRepository = $productsRepository;
    }

    public function handle($request, Closure $next)
    {
        if ($this->productRepository->getById($request->id)) {
            return $next($request);
        }

        return abort(401);
    }
}
