<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class ListSpecificApiRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:list-data-routes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List API routes with /api prefix and specific routes like /user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $routes = Route::getRoutes();
        $this->info('API Routes with api prefix and user:');

        foreach ($routes as $route) {
            $uri = $route->uri();
            if (strpos($uri, 'api/') === 0 || (strpos($uri, 'user') !== false)) {
                $this->info(sprintf(
                    '%s %s -> %s',
                    $route->methods()[0],
                    $uri,
                    $route->getName() ?: 'No Name'
                ));
            }
        }
    }
}
