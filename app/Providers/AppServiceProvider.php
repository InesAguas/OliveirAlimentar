<?php

namespace App\Providers;


use App\Http\Controllers\DesejoController;
use App\Http\Controllers\CarrinhoController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('navbarprocura', function ($view) {

            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
                $controller = new DesejoController();
                $desejos =  $controller->getDesejos();
                $view->with('desejos', $desejos);

                $controller1 = new CarrinhoController();
                $produtosCarrinho =  $controller1->getProdutosCarrinho();
                $view->with('produtosCarrinho', $produtosCarrinho);

        });
    }
}
