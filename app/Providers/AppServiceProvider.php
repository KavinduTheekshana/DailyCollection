<?php

namespace App\Providers;

use App\Installment;
use App\Observers\InstallmentObserver;
use App\Observers\TransactionObserver;
use App\Transaction;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);
        Transaction::observe(TransactionObserver::class);
        Installment::observe(InstallmentObserver::class);
    }
}
