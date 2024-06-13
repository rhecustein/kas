<?php

namespace App\Http\Controllers;

use App\Models\CashTransaction;
use App\Models\User;
use Illuminate\Contracts\View\View;

class CashTransactionController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(): View
    {
        $students = User::select(
            'id',
            'name',
            'gender'
        )->whereHas('role',function($query){
            $query->where('name', 'student');
        })->get();

        $studentsPaidThisWeekIds = CashTransaction::whereBetween('date_paid', [
            now()->startOfWeek()->toDateString(),
            now()->endOfWeek()->toDateString(),
        ])->pluck('student_id');

        $studentsPaidThisWeek = $students->filter(function (User $student) use ($studentsPaidThisWeekIds) {
            return $studentsPaidThisWeekIds->contains($student->id);
        })->sortBy('name');

        $studentsNotPaidThisWeek = $students->reject(function (User $student) use ($studentsPaidThisWeekIds) {
            return $studentsPaidThisWeekIds->contains($student->id);
        })->sortBy('name');

        $totalThisWeek = CashTransaction::whereBetween('date_paid', [
            now()->startOfWeek()->toDateString(),
            now()->endOfWeek()->toDateString(),
        ])->sum('amount');

        $totalThisYear = CashTransaction::whereBetween('date_paid', [
            now()->startOfYear()->toDateString(),
            now()->endOfYear()->toDateString(),
        ])->sum('amount');

        $cashTransaction = [
            'studentsNotPaidThisWeek' => $studentsNotPaidThisWeek,
            'studentsNotPaidThisWeekWithLimit' => $studentsNotPaidThisWeek->take(6),
            'studentsNotPaidThisWeekCount' => $studentsNotPaidThisWeek->count(),
            'studentsPaidThisWeekCount' => $studentsPaidThisWeek->count(),
            'total' => [
                'thisWeek' => CashTransaction::localizationAmountFormat($totalThisWeek),
                'thisYear' => CashTransaction::localizationAmountFormat($totalThisYear),
            ],
            'dateRange' => [
                'start' => now()->startOfWeek()->format('d-m-Y'),
                'end' => now()->endOfWeek()->format('d-m-Y'),
            ],
        ];

        $transactionCountUnApproved = CashTransaction::whereHas('student', function ($query) {
            $query->whereHas('role',function($query){
                $query->where('name','student');
            });
        })->where('approved',false) ->count();

        return view('cash_transactions.index', compact('cashTransaction','transactionCountUnApproved', 'students'));
    }
}
