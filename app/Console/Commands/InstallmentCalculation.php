<?php

namespace App\Console\Commands;

use App\Installment;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;

class InstallmentCalculation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'installment:auto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dueInstalmemts = Installment::whereDate('payment_date',Carbon::yesterday()->format('Y-m-d'))
            ->whereStatus(0)->with(['transaction'])->get();

        foreach ($dueInstalmemts as $instalmemt){
            $allInstallmentsAfterToday = Installment::whereDate('payment_date','>',Carbon::yesterday()->format('Y-m-d'))
                ->whereStatus(0)->whereTransactionId($instalmemt->transaction_id)->get();
            foreach ($allInstallmentsAfterToday as $item){
                $item->amount = $item->amount + $instalmemt->transaction->installment;
                $item->save();
            }
        }
    }
}
