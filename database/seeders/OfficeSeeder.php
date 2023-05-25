<?php

namespace Database\Seeders;

use App\Models\Office;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            [
                'name' => 'Electronic Data Processing',
                'building' => 'Main Building',
                'user_id' => 2
            ],
            [
                'name' => 'Accounting 1',
                'building' => 'Main Building',
                'user_id' => '5',
            ],
            [
                'name' => 'Accounting 2',
                'building' => 'Main Building',
                'user_id' => '6',
            ],
            [
                'name' => 'Production Phase 1',
                'building' => 'Production Building',
                'user_id' => '9',
            ],
            [
                'name' => 'Production Phase 2',
                'building' => 'Production Building',
                'user_id' => '7',
            ],
            [
                'name' => 'Stock Room',
                'building' => 'Main Building',
                'user_id' => '4',
            ]
        ];

        foreach($offices as $office) {
            Office::create($office);
        }
    }
}
