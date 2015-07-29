<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        // Run seeder data using faker
        $this->call('StudentTableSeeder');

        Model::reguard();
    }
}

class StudentTableSeeder extends Seeder
{
    public function run ()
    {
        App\Student::truncate();

        factory(App\Student::class, 20)->create();
    }
}
