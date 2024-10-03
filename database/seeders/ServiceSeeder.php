<?php

namespace Database\Seeders;

use App\Models\ServiceMdl;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            'service1',
            'service2',
            'service3',
            'service4',
            'service5',
        ];

        foreach($services as $ervice){
            ServiceMdl::create([
                'name_en'=>$ervice,
            ]);
        }
    }
}