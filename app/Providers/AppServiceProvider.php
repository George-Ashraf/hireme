<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\User;

use App\Models\Application;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

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


        Gate::define('store-post', function (User $user) {
            return $user->role === 'employer';
        });
        Gate::define('delete-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });
        Gate::define('update-post', function (User $user, Post $post) {
            return $user->id === $post->user_id;
        });

        Gate::define('update-comment', function (User $user, Comment $comment) {
            return $user->id === $comment->user_id;
            Gate::define('admin-only', function () {
                return Auth::check() && Auth::user()->role === 'admin';
            });
        });
        Gate::define('employer-only', function () {
            return Auth::check() && Auth::user()->role === 'employer';
        });


        Gate::define('admin-only', function () {
            return Auth::check() && Auth::user()->role === 'admin';
        });

        Gate::define('candidate-only', function () {
            return Auth::check() && Auth::user()->role === 'candidate';
        });
        Gate::define('admin-or-employer', function () {
            return (Auth::check() && Auth::user()->role === 'admin') || (Auth::check() && Auth::user()->role === 'employer');
        });
    
        Gate::define('candidate-or-employer', function () {
            return (Auth::check() && Auth::user()->role === 'candidate') || (Auth::check() && Auth::user()->role === 'employer');
        });
    }
}