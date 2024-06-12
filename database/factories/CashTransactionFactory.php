<?php

namespace Database\Factories;

use App\Models\CashTransaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CashTransaction>
 */
class CashTransactionFactory extends Factory
{
    protected $model = CashTransaction::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => function () {
                return \App\Models\User::whereHas('role', function ($query) {
                    $query->where('name', 'student');
                })->inRandomOrder()->first()->id;
            },
            'amount' => $this->faker->numberBetween(10000, 1000000),
            'date_paid' => $this->faker->date(),
            'transaction_note' => $this->faker->sentence(),
            'created_by' => function () {
                return \App\Models\User::whereHas('role', function ($query) {
                    $query->where('name', 'admin');
                })->inRandomOrder()->first()->id;
            },
        ];
    }
}
