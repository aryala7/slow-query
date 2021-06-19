<?php

namespace Aryala\SlowQuery;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class SlowQueryLogger extends ServiceProvider
{
	/**
	 * Bootstrap the application services.
	 */
	public function boot()
	{
		if ($this->app->runningInConsole()) {
			$this->publishes([
				__DIR__ . '/../config/query-logger.php' => config_path('query-logger.php'),
			], 'config');
		}

		$this->setupListener();
	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->mergeConfigFrom(
			__DIR__ . '/../config/query-logger.php', 'query-logger'
		);
	}

	/**
	 * setting up listener
	 */
	private function setupListener()
	{
		if(config('query-logger.slow_queries.enabled') or config('query-logger.all_queries.enabled')){
            DB::listen(function($query) {
                File::ensureDirectoryExists(config('query-logger.general.directory'));
                if(config('query-logger.all_queries.enabled')){
                    File::append(
                        config('query-logger.general.directory').'/'.config('query-logger.all_queries.file_name').date('Y-m-d') . '.log',

                        '{"created_at":"'.time() . '","query":"'. $query->sql . '['.implode(',', $query->bindings).']","duration":"'.$query->time * 1000 . ' ms"},'.PHP_EOL
                    );
                    return;
                }
                if (($query->time < config('query-logger.slow_queries.min_exec_time'))) {

                    return;
                }
                File::append(
                    config('query-logger.general.directory').'/'.config('query-logger.slow_queries.file_name').date('Y-m-d') . '.log',
                    '{"created_at":"'.time() . '","query":"'. $query->sql . '['.implode(',', $query->bindings).']","duration":"'.$query->time * 1000 . ' ms"},'.PHP_EOL

                );
            });
        }
	}
}
