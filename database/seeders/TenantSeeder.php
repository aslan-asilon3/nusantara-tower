<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Tenant::create([

            'company' => 'Fringilla Crusus Foundation',
            'email' => 'proin.non@google.com',
            'phone' => '0889-3775-4467',
            'address' => 'Jakarta',

        ]);

        Tenant::create([

            'company' => 'Nascetur Investement Corp.',
            'email' => 'accumsan.sed@google.com',
            'phone' => '0853-7763-9476',
            'address' => 'Bandung',

        ]);

        Tenant::create([

            'company' => 'Risus In LLP',
            'email' => 'accumsan.sed@google.com',
            'phone' => '0811-1361',
            'address' => 'Jakarta',

        ]);
    }
}
