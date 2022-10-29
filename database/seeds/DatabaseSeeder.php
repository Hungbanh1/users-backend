<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $data = [
            [
                'name_product'=>'iPhone',
            ],
            [
                'name_product'=>'Samsung',
            ],
            [
                'name_product'=>'HTC',
            ],
            [
                'name_product'=>'Huawei',
            ],
            [
                'name_product'=>'Oppo',
            ],
        ];
        DB::table('search')->insert($data);
        
    }
}
