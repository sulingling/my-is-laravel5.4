<?php

namespace App\Providers;

use App\AdminPermissions;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider {
	/**
	 * The policy mappings for the application.
	 *
	 * @var array
	 */
	protected $policies = [
		'App\Posts' => 'App\Policies\PostsPolicy',
	];

	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 */
	public function boot() {
		$this->registerPolicies();

		// 查看所有的权限
		$adminPerInfo = AdminPermissions::all();
		foreach ($adminPerInfo as $adminPre) {
			Gate::define($adminPre->name, function ($user) use ($adminPre) {
				return $user->hasPermission($adminPre);
			});
		}
	}
}
