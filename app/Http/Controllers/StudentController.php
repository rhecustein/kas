<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;
use Illuminate\Contracts\View\View;

class StudentController extends Controller
{
    public function __construct(
        private StudentRepository $studentRepository
    ) {
    }

    /**
     * Handle the incoming request.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function __invoke(): View
    {

        $genderCounts = $this->studentRepository->countStudentGender();

        return view('students.index', compact( 'genderCounts'));
    }
}
