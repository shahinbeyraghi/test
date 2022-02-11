<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Repositories\BaseRepository;
use App\Repositories\Comments\CommentsListsRepository;
use App\Repositories\Comments\CommentsRepository;
use App\Repositories\Orders\OrdersRepository;
use App\Repositories\Products\ProductsListsRepository;
use App\Repositories\Products\ProductsRepository;
use App\Services\Comments\AcceptCommentService;
use App\Services\Comments\CommentsListService;
use App\Services\Comments\InsertCommentService;
use App\Services\Products\ProductService;
use App\Transformers\BaseTransformer;
use App\Transformers\Comments\CommentsListTransformer;
use App\Transformers\Comments\CommentTransformer;
use App\Transformers\Products\ProductsListTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->when(OrdersRepository::class)->needs(Model::class)->give(Order::class);
        $this->app->when(ProductsRepository::class)->needs(Model::class)->give(Product::class);
        $this->app->when(ProductsListsRepository::class)->needs(Model::class)->give(Product::class);
        $this->app->when(CommentsListsRepository::class)->needs(Model::class)->give(Comment::class);
        $this->app->when(CommentsRepository::class)->needs(Model::class)->give(Comment::class);

        $this->app->when(ProductService::class)->needs(BaseRepository::class)->give(ProductsListsRepository::class);
        $this->app->when(ProductService::class)->needs(BaseTransformer::class)->give(ProductsListTransformer::class);

        $this->app->when(CommentsListService::class)->needs(BaseRepository::class)->give(CommentsListsRepository::class);
        $this->app->when(CommentsListService::class)->needs(BaseTransformer::class)->give(CommentsListTransformer::class);

        $this->app->when(InsertCommentService::class)->needs(BaseTransformer::class)->give(CommentTransformer::class);
        $this->app->when(InsertCommentService::class)->needs(BaseRepository::class)->give(CommentsRepository::class);

        $this->app->when(AcceptCommentService::class)->needs(BaseTransformer::class)->give(CommentTransformer::class);
        $this->app->when(AcceptCommentService::class)->needs(BaseRepository::class)->give(CommentsRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
