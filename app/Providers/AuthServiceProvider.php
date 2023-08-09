<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        // App\Models\Model\Prospect::class => App\Policies\ProspectPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('show-prospect', function ($user, $prospect) {
            $role = $user->role_id;
            if($role == 5) return true;
            else if($role == 4) return $user->kode_bo == $prospect->kode_bo;
            else if($role == 3) return $user->kode_uker == $prospect->kode_uker;
            else if($role == 2) return $user->PN == $prospect->PN;
            else if($role == 1) return false;
            else false;
        });
        Gate::define('show-menu', function ($user, $menu) {
            $role = $user->role_id;
            if($menu == 'prospects') return $role == 5;
            else if($menu == 'prospects-branch') return $role == 4;
            else if($menu == 'prospects-uker') return $role == 3 or $role == 4;
            else if($menu == 'prospects-saya') return $role == 2;
            else return false;
        });

        Gate::define('show-approval-option', function ($user) {
            $role = $user->role_id;
            return $role > 2;
        });

        Gate::define('permission', function ($user, $ask){
            $perm = Permission::select('value')->where('permit', $ask)->first();
            return $perm->value;
        });
    }
}
