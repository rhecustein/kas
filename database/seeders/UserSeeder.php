<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\SchoolClass;
use App\Models\SchoolMajor;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_admin = Role::where('name','admin')->get()->first();
        $role_student = Role::where('name','student')->get()->first();

        // username : administrator
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
            'role_id' => $role_admin->id
        ]);

        $students = [
            'Alya Dwi Arida',
            'Andini Septi Salsadilla',
            'Dita Distriani',
            'Nanda Zaini Badri',
            'Nindya',
            'Yasintha Diva Anjani',
            'Ahmad Karhali',
            'Ahnaf Dhoif Hikma Ahlana',
            'Khairana Sabila Prisari',
            'Putri Nur Azizah Azzahro',
            'Rizka Zakia Mufida',
            'Salsabillah Dani Nur Anisa',
            'Asa Nadira Pramesti',
            'Fadila Amelia',
            'Klara Safitri',
            'Nur Siti Rahmayanti',
            'Siti Annisa',
            'Wisam Maulana Iqbal',
            'Dwi Intan Febriyanti Ilyas',
            'Haura Abiyyah',
            'Nadia Nurkeisa Virani',
            'Qonita Elviana Bahiyah',
            'Rosa Amalia',
            'Suci Jaoharoh Amani',
            'Desi Nursanti',
            'Filza Putri Amaliyah',
            'Lisa Meidina',
            'Rahma Ayu Karmila',
            'Shofia Anugrah Zahira',
            'Uni Setiani',
            'Elia Nur Habibah',
            'Jamilah Qiyaafatul Haq',
            'Jihan Fhajri',
            'Novia Ramadhani',
            'Putri Khoerunnisa',
            'Risya Atika',
            'Putri Nur Aini',
            'Rara Magfirotun Nisa',
            'Andriana'
        ];


        foreach($students as $student){
            User::create([
                "name"=>$student,
                "role_id"=>$role_student->id,
                "gender"=> mt_rand(1,2),
                "school_class_id"=>SchoolClass::inRandomOrder()->first()->id,
                "school_major_id"=>SchoolMajor::inRandomOrder()->first()->id,
                "school_year_start"=>2022,
                "school_year_end"=>2025,
                "password"=> bcrypt('12345678')
            ]);
        }

    }
}
