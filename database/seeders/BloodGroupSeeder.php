<?php

namespace Database\Seeders;

use App\Models\General\BloodGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BloodGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $item = ['A+','A-','B+','B-','AB+','AB-','O+','O-'];
        foreach ($item as $key => $value) {
            BloodGroup::create([
                'name' => $value,
            ]);
        }
    }
}
