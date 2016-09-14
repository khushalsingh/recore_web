<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use Illuminate\Hashing\BcryptHasher as Hasher;
use Illuminate\Session\Store as Session;
use Illuminate\Http\Request;

class ValidationServiceProvider extends ServiceProvider {

	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot() {
		Validator::extend('validate_captcha', function($attribute, $value, $parameters, $validator) {
			return captcha_check($value);
		});
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register() {
		$this->app->bind(
				'Illuminate\Contracts\Auth\Registrar', 'App\Services\Registrar'
		);
	}

}
