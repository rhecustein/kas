<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable()->unique();
            $table->string('username');
            $table->string('student_identification_number')->unique()->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('school_year_start')->nullable();
            $table->integer('school_year_end')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
