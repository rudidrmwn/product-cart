<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::create([
        
            'picture' => 'https://i.ibb.co/KzD2CNg/maksim-larin-ezdrvz-A1h-Zw-unsplash.jpgHardik',
            'name' => 'New Balance',
            'sku' => 'FA4532',
            'qty' => 1,
            'price' => 455000,
        ]);

        Product::create([
            'picture' => 'https://i.ibb.co/zFDd6G5/luis-felipe-lins-J2-w-AQDckus-unsplash.jpg',
            'name' => 'Nike',
            'sku' => 'FA3518',
            'qty' => 1,
            'price' => 366000
        ]);
    }
}
