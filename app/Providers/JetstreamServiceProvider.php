<?php

namespace App\Providers;

use App\Actions\Jetstream\DeleteUser;
use Illuminate\Support\ServiceProvider;
use Laravel\Jetstream\Jetstream;

class JetstreamServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->configurePermissions();

        Jetstream::deleteUsersUsing(DeleteUser::class);
    }

    /**
     * Configure the permissions that are available within the application.
     *
     * @return void
     */
    protected function configurePermissions()
    {
        Jetstream::defaultApiTokenPermissions(['read']);

        Jetstream::role('super', __('Super'), [
            'create',
            'read',
            'update',
            'delete'
        ])->description(__('Super users can perform any action.'));

        Jetstream::role('admin', __('Admin'), [
            'create',
            'read',
            'update',
            'delete'
        ])->description(__('Admin users have the ability to read, create, update and delete.'));

        Jetstream::role('user', __('User'), [
            'read',
        ])->description(__('Just  read'));
    }
}
