<?php

namespace App\Providers;

use App\View\Composers\CartComposer;
use App\View\Composers\MenuComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{

      public function register()
      {
            //
      }

      public function boot()
      {
            View::composer(
                  'customer.header',
                  MenuComposer::class
            );
            View::composer(
                  'customer.cart',
                  CartComposer::class
            );
      }
}