<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Setting;
use App\Models\CustomPage;
use App\Models\OtherPageItem;
use App\Models\Menu;
use App\Models\Language;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $setting_data = Setting::where('id',1)->first();
        $custom_pages = CustomPage::orderBy('id','asc')->get();
        $other_page_items = OtherPageItem::where('id',1)->first();
        $menus = Menu::get();
        $languages = Language::get();

        view()->share('global_setting', $setting_data);
        view()->share('global_custom_pages', $custom_pages);
        view()->share('global_other_page_items', $other_page_items);
        view()->share('global_menu', $menus);
        view()->share('global_languages', $languages);
        
        Paginator::useBootstrap();
    }
}
