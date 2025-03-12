<?php

namespace App\Providers;
use App\Models\Post;
use App\Models\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();

        // define middleware
          # 1- define gate
      Gate::define('delete-post', function (User $user, Post $post) {
          return $user->id === $post->user_id;
      });
      Gate::define('update-post', function (User $user, Post $post) {
          return $user->id === $post->user_id;
      });

      Gate::define('update-post', function (User $user, Post $post) {
        return $user->id === $post->user_id;
    });
    
    }
}
