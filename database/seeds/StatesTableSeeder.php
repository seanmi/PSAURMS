<?php

use Illuminate\Database\Seeder;

use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $state1 = [
            'name' => 'For Receiving', 
            'order' => 1
        ];
        $state2 = [
            'name' => 'Passed', 
            'order' => 2
        ];

        State::create($state1);
        State::create($state2);
    }
}
