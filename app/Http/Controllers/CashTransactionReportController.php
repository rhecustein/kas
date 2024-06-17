<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashTransactionReportRequest;
use App\Models\CashTransaction;
use Illuminate\Support\Facades\Auth;

class CashTransactionReportController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \App\Http\Requests\CashTransactionReportRequest
     */
    public function __invoke(CashTransactionReportRequest $request)
    {
        $cashTransactions = [];
        $current_user =  Auth::user();
        if( $current_user->role->name== 'admin'){
            $cashTransactionsCurrentYear = CashTransaction::whereYear('date_paid', now()->year)->get();
        }else{
            $cashTransactionsCurrentYear = CashTransaction::whereHas('student',function ($query) use( $current_user){
                $query->where('name', $current_user->name);
            })->whereYear('date_paid', now()->year)->get();
        }


        $cashTransactionCurrentMonthCount = $cashTransactionsCurrentYear->filter(function (CashTransaction $transaction) {
        $datePaid = now()->createFromFormat('Y-m-d', $transaction->date_paid);
                return (int) $datePaid->format('m') === now()->month;
        })->sum('amount');


        $cashTransactionCurrentWeekCount = $cashTransactionsCurrentYear->filter(function (CashTransaction $transaction) {
        return now()->createFromFormat('Y-m-d', $transaction->date_paid)
                    ->between(now()->startOfWeek()->toDateString(), now()->endOfWeek()->toDateString());
        })->sum('amount');


        $cashTransactionTodayCount = $cashTransactionsCurrentYear->filter(function (CashTransaction $transaction) {
                return now()->createFromFormat('Y-m-d', $transaction->date_paid)->isToday();
        })->sum('amount');

        $cashTransactions = [
            'cashTransactionCurrentYearCount' => CashTransaction::localizationAmountFormat($cashTransactionsCurrentYear->sum('amount')),
            'cashTransactionCurrentMonthCount' => CashTransaction::localizationAmountFormat($cashTransactionCurrentMonthCount),
            'cashTransactionCurrentWeekCount' => CashTransaction::localizationAmountFormat($cashTransactionCurrentWeekCount),
            'cashTransactionTodayCount' => CashTransaction::localizationAmountFormat($cashTransactionTodayCount),
        ];

        if ($request->has('start_date') && $request->has('end_date')) {
            if($current_user->role->name == 'admin'){
                $cashTransactions['filteredResult'] = CashTransaction::with('student:id,name', 'createdBy:id,name')
                    ->select('id', 'student_id','category','approved', 'amount', 'date_paid', 'created_by')
                    ->whereBetween('date_paid', [$request->start_date, $request->end_date])
                    ->get();
            }else{
                $cashTransactions['filteredResult'] = CashTransaction::whereHas('student',function ($query) use( $current_user){
                    $query->where('name', $current_user->name);
                })->with('student:id,name', 'createdBy:id,name')
                    ->select('id', 'student_id','category','approved','amount', 'date_paid', 'created_by')
                    ->whereBetween('date_paid', [$request->start_date, $request->end_date])
                ->get();
            }
            $cashTransactions['sum'] = CashTransaction::localizationAmountFormat($cashTransactions['filteredResult']->sum('amount'));
        }



        return view('cash_transactions.reports.index', compact('cashTransactions'));
    }
}
