<?php

namespace App\Console\Commands;

use App\Holiday;
use App\Installment;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Validation\Rules\In;

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
        // $this->croneLog($this->signature);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dueInstalmemts = Installment::whereDate('payment_date', Carbon::yesterday()->format('Y-m-d'))
            ->whereStatus(0)->with(['transaction'])->get();

        if (!empty($dueInstalmemts) && sizeof($dueInstalmemts) > 0) {
            foreach ($dueInstalmemts as $instalmemt) {
                if ($instalmemt->transaction->paymenttype == 'daily') {
                    $allInstallmentsAfterToday = Installment::whereDate('payment_date', '>', Carbon::yesterday()->format('Y-m-d'))
                        ->whereStatus(0)->whereTransactionId($instalmemt->transaction_id)->first();
                    $previousRecord = Installment::whereId(($allInstallmentsAfterToday->id)-1)->whereStatus(0)->whereTransactionId($instalmemt->transaction_id)->first();

                    $allInstallmentsAfterToday->amount = $allInstallmentsAfterToday->amount + $previousRecord->amount;
                    $allInstallmentsAfterToday->save();
                } else {
                    return $this->addDayForWeeklyPayment($instalmemt);
                }

            }
        }
    }

    private function addDayForWeeklyPayment(Installment $installment)
    {
        $duePaymentDate = Carbon::parse($installment->payment_date);
        $nextPaymentDueDate = Installment::whereTransactionId($installment->transaction_id)
            ->whereDate('payment_date', '>', $duePaymentDate)->orderBy('payment_date')->first();
        $nextPaymentDate = $this->nextValidDay($duePaymentDate);
        if ($nextPaymentDate <= $nextPaymentDueDate->payment_date) {
            Transaction::$FIRE_EVENTS = true;
            $installment = new Installment();
            $installment->payment_date = Carbon::parse($nextPaymentDate)->format('Y-m-d');
            $transaction = Transaction::find($nextPaymentDueDate->transaction_id);
            $installment->amount = $transaction->installment;
            $installment->remain = $transaction->remain;
            $transaction->installments()->save($installment);

        } else {
            $nextPaymentDueDate->amount = $nextPaymentDueDate->amount + $installment->transaction->installment;
            $nextPaymentDueDate->save();
        }

    }

    private function nextValidDay(Carbon $day)
    {
        $nextDay = $day->addDay();
        $holidays = Holiday::whereDate('date', $nextDay)->first();
        $condition = $nextDay->dayOfWeek == Transaction::weekend || !empty($holidays);
        return ($condition) ? $this->nextValidDay($nextDay) : $nextDay;
    }
}
