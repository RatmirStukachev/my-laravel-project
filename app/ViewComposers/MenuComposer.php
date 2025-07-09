<?php

namespace App\ViewComposers;

use App\Models\SiteMenu;
use Illuminate\View\View;
use Illuminate\Support\Facades\Cache;

class MenuComposer
{
    const ONE_MINUTE = 60;
    protected $menus;

    public function __construct()
    {
        $this->menus = Cache::flexible(
            key: 'menus',
            ttl: [
                self::ONE_MINUTE,
                config('cache.stores.menu'),
            ],
            callback: function () {
                return SiteMenu::with('children')->isActive()->get();
            });
    }

    public function compose(View $view): View
    {
        return $view->with([
            'mainMenuItems' => $this->menus->where('main', true)->sortBy('pos'),
            'slaveMenuItems' =>$this->menus->where('slave', true)->sortBy('pos'),
            'linkMenuItems' =>$this->menus->where('slave_right', true)->sortBy('pos'),
        ]);
    }
}
