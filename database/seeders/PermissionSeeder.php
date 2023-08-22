<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PermissionGroup;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $groups = [
                        'product',
                        'product_setting',
                        'customer_setting',
                        'purchase',
                        'sale',
                        'return',
                         'accounting',
                         'expense',
                         'income',
                         'hrm',
                         'department',
                         'employee',
                         'payroll',
                         'salary_particular',
                         'customer',
                         'supplier',
                         'setting',
                         'report',
                         'customer_ledger',
                         'due_collection',
                         'invest',
                    ];
        $permissions = ['module','index','store','update','delete','advance'];


        for($i=0;$i<count($groups);$i++){
            $g = PermissionGroup::create(['name'=>$groups[$i]]);
            for($j=0;$j<count($permissions);$j++)
            {
                $p = new Permission();
                $p->group_id = $g->id;
                $p->name = $groups[$i].'-'.$permissions[$j];
                $p->save();
            }
        }
    }
}
