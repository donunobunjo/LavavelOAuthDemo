<?php
use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'name'=>'frontend',
            'category_id'=>1,
            'user_id'=>1,
            'order'=>3
        ]);
        Task::create([
            'name'=>'backend',
            'category_id'=>1,
            'user_id'=>2,
            'order'=>4
        ]);
        Task::create([
            'name'=>'frontend',
            'category_id'=>2,
            'user_id'=>1,
            'order'=>4
        ]);
    }
}
