<?php

namespace App\Frontend;

use Illuminate\Foundation\ProviderRepository;
use Illuminate\Filesystem\Filesystem;

class Application extends \App\Common\Application
{
    /**
     * The application namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Frontend';

    /**
     * Get the path to the application "app" directory.
     *
     * @return string
     */
    public function path()
    {
        return $this->basePath.DIRECTORY_SEPARATOR.'app'.DIRECTORY_SEPARATOR.'Frontend';
    }

    /**
     * Register all of the configured providers.
     *
     * @return void
     */
    public function registerConfiguredProviders()
    {
        $manifestPath = $this->getCachedServicesPath();

        (new ProviderRepository($this, new Filesystem, $manifestPath))
            ->load(array_merge($this->config['app.providers'], $this->config['frontend.providers']));
    }

    /**
     * Get the path to the configuration cache file.
     *
     * @return string
     */
    public function getCachedConfigPath()
    {
        return $this->basePath().'/bootstrap/cache/frontend_config.php';
    }

    /**
     * Get the path to the routes cache file.
     *
     * @return string
     */
    public function getCachedRoutesPath()
    {
        return $this->basePath().'/bootstrap/cache/frontend_routes.php';
    }

    /**
     * Get the path to the cached "compiled.php" file.
     *
     * @return string
     */
    public function getCachedCompilePath()
    {
        return $this->basePath().'/bootstrap/cache/frontend_compiled.php';
    }

    /**
     * Get the path to the cached services.php file.
     *
     * @return string
     */
    public function getCachedServicesPath()
    {
        return $this->basePath().'/bootstrap/cache/frontend_services.php';
    }
}