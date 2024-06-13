<?php

namespace App\Repositories;

use App\Models\User;

class StudentRepository
{
    public function __construct(
        private User $model
    ) {
    }

    /**
     * Count student occurences by gender.
     *
     * @return array
     */
    public function countStudentGender(): array
    {
        $students = $this->model->whereHas('role', function ($query) {
            $query->where('name', 'student');
        })->select('gender')->get();

        $counts = $students->countBy(function ($student) {
            return $student->gender == 1 ? 'male' : 'female';
        })->all();

        $counts += ['male' => 0, 'female' => 0];

        return $counts;
    }
}
