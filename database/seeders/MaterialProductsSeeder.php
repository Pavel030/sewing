<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json_file = storage_path('json\material-products.json');
        $contents = json_decode(file_get_contents($json_file), true);

        foreach ($contents as $content) {
            DB::table('material_products')->insert($content);
        }
    }
}
