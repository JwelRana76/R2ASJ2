<?php

namespace Database\Seeders;

use App\Models\General\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = ['Islam','Hinduism','Buddhism','Christianity','Other'];
        foreach ($item as $key => $value) {
            Religion::create([
                'name' => $value,
            ]);
        }
    }
}
