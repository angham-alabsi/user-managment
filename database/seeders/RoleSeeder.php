<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name_en'=>'Admin',
            'name_ar'=>'ادمن',
        ]);
        Role::create([
            'name_en'=>'Author',
            'name_ar'=>'محرر',
        ]);
        Role::create([
            'name_en'=>'User',
            'name_ar'=>'مستخدم',
        ]);

    }
}
