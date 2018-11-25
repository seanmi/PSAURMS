<?php

use Illuminate\Database\Seeder;

use App\DocumentClass;

class DocumentClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $c = [
            'name' => 'Communication',
            'tag' => 'Comm'
        ];

        DocumentClass::create($c);
    }
}
