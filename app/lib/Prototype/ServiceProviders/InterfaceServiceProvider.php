<?php
namespace Prototype\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    
    public function register()
    {
        
        $this->app->bind('Prototype\Interfaces\UserRepository', function ($app) {
            
            return new \Prototype\DBClasses\Eloquent\EloquentUserRepository(new \User);
        });
    }
}
