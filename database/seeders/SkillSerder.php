<?php

namespace Database\Seeders;

use App\Models\SkillMdl;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SkillSerder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skills = [
            'skill1',
            'skill2',
            'skill3',
            'skill4',
            'skill5',
        ];

        foreach($skills as $skill){
            SkillMdl::create([
                'name_en'=>$skill,
            ]);
        }
    }
}