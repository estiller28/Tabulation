<?php

namespace Database\Seeders;
use App\Models\Barangay;
use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Spatie\Permission\Models\Permission;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            'Admin',
            'CoAdmin'
        ];

        foreach ($role as $roles ){
            Role::create(['name' => $roles]);
        }

        $defaultAdmin =  User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $defaultAdmin->assignRole('Admin');


        $criterias = [
            'Casual Wear',
            'Summer Wear',
            'Filipiñana',
            'Top 5 Question and Answer',
            'Top 3 Question and Answer',
        ];

        foreach ($criterias as $criteria){
            Criteria::create([
                'name' => $criteria,
            ]);
        }

       $judge1 =  User::create([
            'name' => 'Judge 1',
            'email' => 'judge1@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge1->assignRole('Admin');

        $judge2 =  User::create([
            'name' => 'Judge 2',
            'email' => 'judge2@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge2->assignRole('Admin');

        $judge3 =  User::create([
            'name' => 'Judge 3',
            'email' => 'judge3@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge3->assignRole('Admin');

        $judge4 =  User::create([
            'name' => 'Judge 4',
            'email' => 'judge4@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge4->assignRole('Admin');

        $judge5 =  User::create([
            'name' => 'Judge 5',
            'email' => 'judge5@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge5->assignRole('Admin');

        $judge6 =  User::create([
            'name' => 'Judge 6',
            'email' => 'judge6@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge6->assignRole('Admin');

        $judge7 =  User::create([
            'name' => 'Judge 7',
            'email' => 'judge7@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge7->assignRole('Admin');


        $judge8 =  User::create([
            'name' => 'Judge 8',
            'email' => 'judge8@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge8->assignRole('Admin');

        $judge9 =  User::create([
            'name' => 'Judge 9',
            'email' => 'judge9@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $judge9->assignRole('Admin');



    }
}
