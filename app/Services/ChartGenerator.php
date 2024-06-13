<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\CashTransactionRepository;
use App\Repositories\StudentRepository;

class ChartGenerator
{
    public function __construct(
        private StudentRepository $studentRepository,
        private CashTransactionRepository $cashTransactionRepository
    ) {
    }

    /**
     * Generate chart data for various statistical charts.
     *
     * @return array An associative array containing chart data.
     */
    public function generateCharts(): array
    {
        $cashTransactionAmountPerYear = $this->cashTransactionRepository->getTotalAmountsPerYear();
        $cashTransactionCountPerYear = $this->cashTransactionRepository->getCountsPerYear();
        $cashTransactionCountByGender = $this->cashTransactionRepository->getCountByGender();
        $studentGenders = $this->studentRepository->countStudentGender();

        return [
            'counter' => [
                'student' => User::whereHas('role',function($query){
                    $query->where('name', 'student');
                })->count(),
                'administrator' => User::whereHas('role',function($query){
                    $query->where('name', 'admin');
                })->count(),
            ],
            'pieChart' => [
                'studentGender' => [
                    'series' => [
                        $studentGenders['male'],
                        $studentGenders['female']
                    ],
                    'labels' => ['Laki-laki', 'Perempuan']
                ],
                'cashTransactionCountByGender' => [
                    'series' => $cashTransactionCountByGender->pluck('total_paid'),
                    'labels' => ['Laki-laki', 'Perempuan']
                ]
            ],
            'lineChart' => [
                'cashTransactionAmountPerYear' => [
                    'series' => $cashTransactionAmountPerYear->pluck('amount'),
                    'categories' => $cashTransactionAmountPerYear->pluck('year')
                ],
                'cashTransactionCountPerYear' => [
                    'series' => $cashTransactionCountPerYear->pluck('count'),
                    'categories' => $cashTransactionCountPerYear->pluck('year')
                ],
            ]
        ];
    }
}
