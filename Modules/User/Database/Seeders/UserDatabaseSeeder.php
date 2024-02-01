<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

use Illuminate\Database\Seeder;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        // $user = User::factory()->create([
        //     'name' => 'User',
        //     'email' => 'user@kvi.com',
        //     'password' => bcrypt('12345678')
        // ]);

        $faker = Faker::create();
        $gender = $faker->randomElement(['male', 'female']);
        foreach (range(1, 200) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name($gender),
                'email' => $faker->email,
                'password' => bcrypt('12345678')
            ]);
        }
    }
}
