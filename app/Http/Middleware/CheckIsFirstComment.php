<?php

namespace App\Http\Middleware;

use App\Models\Insurance;
use App\Models\RegisterCompany;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Products\ProductsRepository;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CheckIsFirstComment
{

    /**
     * @var \App\Repositories\Comments\CommentsRepository
     */
    private $commentsRepository;

    public function __construct(CommentsRepository $commentsRepository)
    {
        $this->commentsRepository = $commentsRepository;
    }

    public function handle($request, Closure $next)
    {
        if (!$this->commentsRepository->getByProductId($request->id)) {
            return $next($request);
        }

        return abort(401);
    }
}
