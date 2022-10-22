<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\EloquentInterface', 'App\Repositories\EloquentRepository');
        $this->app->bind('App\Contracts\Models\BookInterface', 'App\Repositories\Models\BookRepository');
        $this->app->bind('App\Contracts\Models\UserInterface', 'App\Repositories\Models\UserRepository');
        $this->app->bind('App\Contracts\Models\SiswaInterface', 'App\Repositories\Models\SiswaRepository');
        $this->app->bind('App\Contracts\Models\AuditInterface', 'App\Repositories\Models\AuditRepository');
        $this->app->bind('App\Contracts\Models\AuthorInterface', 'App\Repositories\Models\AuthorRepository');
        $this->app->bind('App\Contracts\Models\PublisherInterface', 'App\Repositories\Models\PublisherRepository');
        $this->app->bind('App\Contracts\Models\BookCategoryInterface', 'App\Repositories\Models\BookCategoryRepository');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }
}