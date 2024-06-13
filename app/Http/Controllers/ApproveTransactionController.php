<?php

namespace App\Http\Controllers;

use App\Models\CashTransaction;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ApproveTransactionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request):View
    {
        $transactionCount = CashTransaction::whereHas('student', function ($query) {
            $query->whereHas('role',function($query){
                $query->where('name','student');
            });
        })->where('approved',false)->count();
        return view('cash_transactions.approve',compact('transactionCount'));
    }
}
