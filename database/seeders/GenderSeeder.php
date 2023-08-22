<?php

namespace Database\Seeders;

use App\Models\General\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = ['Male','Female','Common'];
        foreach ($item as $key => $value) {
            Gender::create([
                'name' => $value,
            ]);
        }
    }
}
