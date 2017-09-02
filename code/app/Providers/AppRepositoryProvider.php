<?php

namespace App\Providers;

use App\Contracts\Repositories\DocumentIterationRepositoryContract;
use App\Contracts\Repositories\DocumentRepositoryContract;
use App\Models\Document;
use App\Models\DocumentIteration;
use App\Repositories\DocumentIterationRepository;
use App\Repositories\DocumentRepository;
use Illuminate\Support\ServiceProvider;

class AppRepositoryProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(DocumentRepositoryContract::class, function(){
            return new DocumentRepository(
                new Document()
            );
        });

        $this->app->bind(DocumentIterationRepositoryContract::class, function(){
            return new DocumentIterationRepository(
                new DocumentIteration()
            );
        });
    }

    /**
     * Array of classes provided as repositories
     *
     * @return array
     */
    public function provides()
    {
        return [
            DocumentRepositoryContract::class,
            DocumentIterationRepositoryContract::class,
        ];
    }
}
