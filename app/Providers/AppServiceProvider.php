<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Application;

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

      Gate::define('update-post', function (User $user, Post $post) {
          return $user->id === $post->user_id;
      });


      Gate::define('update-comment', function (User $user, Comment $comment) {
        return $user->id === $comment->user_id;
    });


        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        Gate::define('store-post', function (User $user) {
            return $user->role === 'employer';
        });

        Gate::define('edit-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });


        // Gate::define('employer-application', function (Application $application) {
        //     return Auth::userid === $application->post->employer_id; // Check if the employer owns the job
        // });
    }
}
