<?php

namespace App\Observers;

use App\Installment;

class InstallmentObserver
{
    /**
     * Handle the installment "created" event.
     *
     * @param \App\Installment $installment
     * @return void
     */
    public function created(Installment $installment)
    {
        $transaction = $installment->transaction;
        $transaction->remain = $installment->remain;
        $transaction->save();
    }

    /**
     * Handle the installment "updated" event.
     *
     * @param \App\Installment $installment
     * @return void
     */
    public function updated(Installment $installment)
    {
        //
    }

    /**
     * Handle the installment "deleted" event.
     *
     * @param \App\Installment $installment
     * @return void
     */
    public function deleted(Installment $installment)
    {
        //
    }

    /**
     * Handle the installment "restored" event.
     *
     * @param \App\Installment $installment
     * @return void
     */
    public function restored(Installment $installment)
    {
        //
    }

    /**
     * Handle the installment "force deleted" event.
     *
     * @param \App\Installment $installment
     * @return void
     */
    public function forceDeleted(Installment $installment)
    {
        //
    }
}
