<?php namespace Electrica\Paybox;

use Backend;
use Illuminate\Support\Facades\Log;
use System\Classes\PluginBase;
use Lovata\OrdersShopaholic\Models\PaymentMethod;
use Illuminate\Support\Facades\Event;

/**
 * Paybox Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Paybox',
            'description' => 'No description provided yet...',
            'author'      => 'Electrica',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

        Event::listen(\Lovata\OrdersShopaholic\Models\PaymentMethod::EVENT_GET_GATEWAY_LIST, function() {
            $arPaymentMethodList = [
                'paybox' => 'Paybox',
            ];

            return $arPaymentMethodList;
        });
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Electrica\Paybox\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'electrica.paybox.some_permission' => [
                'tab' => 'Paybox',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'paybox' => [
                'label'       => 'Paybox',
                'url'         => Backend::url('electrica/paybox/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['electrica.paybox.*'],
                'order'       => 500,
            ],
        ];
    }
}
