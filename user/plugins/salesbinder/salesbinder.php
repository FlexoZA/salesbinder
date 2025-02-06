<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;
use Grav\Common\Grav;
use Grav\Plugin\SalesBinder\Api;

class SalesbinderPlugin extends Plugin
{
    public function onPluginsInitialized()
    {
        // Enable the main events we are interested in
        $this->enable([
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigInitialized' => ['onTwigInitialized', 0]
        ]);
    }

    /**
     * Add plugin templates path
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = '/templates';
    }

    /**
     * Register Twig function
     */
    public function onTwigInitialized()
    {
        $this->grav['twig']->twig->addFunction(
            new \Twig_SimpleFunction('salesbinder_items', [$this, 'getSalesbinderItems'])
        );
    }

    public function getSalesbinderItems()
    {
        try {
            return Api::getStaticItems();
        } catch (\Exception $e) {
            $this->grav['log']->error('SalesBinder Plugin: ' . $e->getMessage());
            return [];
        }
    }
}
