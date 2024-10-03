<?php

namespace Database\Seeders;

use App\Models\NationalityMdl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NationalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nationalities = [
            'nationality1',
            'nationality2',
            'nationality3',
            'nationality4',
            'nationality5',
        ];

        foreach($nationalities as $nationality){
            NationalityMdl::create([
                'name_en'=>$nationality,
                'status'=>1,
            ]);
        }
    }
}