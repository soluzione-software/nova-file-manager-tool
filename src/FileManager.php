<?php

namespace SoluzioneSoftware\Nova\Tools\FileManager;

use Illuminate\Container\Container;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\View\View;
use Illuminate\View\Factory as ViewFactory;
use Laravel\Nova\Nova;
use Laravel\Nova\Tool;

class FileManager extends Tool
{
    /**
     * @var string
     */
    private $url = '/laravel-filemanager';

    /**
     * Perform any tasks that need to happen when the tool is booted.
     *
     * @return void
     */
    public function boot()
    {
        Nova::provideToScript([
            'filemanager' => [
                'url' => $this->url,
            ],
        ]);

        Nova::script('file-manager', __DIR__.'/../dist/js/tool.js');
    }

    /**
     * Build the view that renders the navigation links for the tool.
     *
     * @return View
     * @throws BindingResolutionException
     */
    public function renderNavigation()
    {
        /** @var ViewFactory $viewFactory */
        $viewFactory = Container::getInstance()->make(ViewFactory::class);
        return $viewFactory->make('file-manager::navigation');
    }

    /**
     * Change the default file manager url
     *
     * @param  string  $url
     * @return $this
     */
    public function withUrl(string $url): self
    {
        $this->url = $url;
        return $this;
    }
}
