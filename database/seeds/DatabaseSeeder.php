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
        DB::table('staffs')->insert([
            'name' => 'Jenny Buvlock',
            'staff_id' => str_random(10),
            'role' => 'Admin',
            'password' => bcrypt('secret'),
            'last_active' => \Carbon\Carbon::now()->toDateTimeString(),
        ]);
        
        DB::table('congregations')->insert([
            'name' => 'Monday Bilingual Service',
            'display_name' => 'Monday Bilingual Service',
            'code' => 'SBS',
            'day' => '1',
            'time' => '11:00',
        ]);
        
        Model::reguard();
    }
}
