<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Table::create([
            'numero'=>1,
            'aforo'=>3
        ]);
        Table::create([
            'numero'=>2,
            'aforo'=>2
        ]);
        Table::create([
            'numero'=>3,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>4,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>5,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>6,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>7,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>8,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>9,
            'aforo'=>4
        ]);
        Table::create([
            'numero'=>10,
            'aforo'=>3
        ]);
        Table::create([
            'numero'=>11,
            'aforo'=>3
        ]);
    }
}
