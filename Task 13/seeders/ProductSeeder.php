<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    
    public function run(): void
    {
        $elektronikId = Category::where('name', 'Elektronik')->first()->id;
        $pakaianPriaId = Category::where('name', 'Pakaian Pria')->first()->id;
        
        DB::table('products')->insert([
            [
                'category_id' => $elektronikId,
                'name' => 'Laptop Gaming',
                'description' => 'Laptop performa tinggi untuk gaming dan desain grafis.',
                'stock' => 10,
                'image' => 'laptop.jpg'
            ],
            [
                'category_id' => $pakaianPriaId,
                'name' => 'Kaos Polos',
                'description' => 'Kaos katun 100% nyaman untuk sehari-hari.',
                'stock' => 50,
                'image' => 'kaos.jpg'
            ],
        ]);
    }
}
