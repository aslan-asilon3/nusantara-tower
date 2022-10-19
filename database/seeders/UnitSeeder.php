<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([

            'nama_unit' => 'Unit A',
            'lantai' => '1',
            'area' => '200m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit B',
            'lantai' => '1',
            'area' => '300m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit C',
            'lantai' => '1',
            'area' => '200m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit D',
            'lantai' => '1',
            'area' => '300m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit A',
            'lantai' => '2',
            'area' => '200m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit B',
            'lantai' => '2',
            'area' => '400m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit C',
            'lantai' => '2',
            'area' => '400m2',

        ]);

        Unit::create([

            'nama_unit' => 'Unit D',
            'lantai' => '2',
            'area' => '300m2',

        ]);

    }
}
