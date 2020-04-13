<?php
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Don Uno',
            'email'=>'don.unobunjo@gmail.com',
            'password'=>bcrypt('123456'),
            'city'=>'lagos'
        ]);

        User::create([
            'name'=>'karol Uno',
            'email'=>'karol.unobunjo@gmail.com',
            'password'=>bcrypt('123456'),
            'city'=>'lagos'
        ]);
    }
}
