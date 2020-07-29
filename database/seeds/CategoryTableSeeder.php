<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $category = [
         ['id'=>1,
         'name' => 'laptops',
         'slug'  => 'laptop',
         'details' => 'laptops'],
         ['id'=>2,
         'name' => 'watches',
         'slug'  => 'watch',
         'details' => 'watches'],
         [ 'id'=>3,
         'name' => 'mobiles',
         'slug'  => 'mobile',
         'details' => 'mobile phones '],
         ['id'=>4,
         'name' => 'tv',
         'slug'  => 'tv',
         'details' => 'tv'],
         [ 'id'=>6,
         'name' => 'headphone',
         'slug'  => 'headphone',
         'details' => 'headphone'],
     ];

     foreach($category as $item)
     {
     Category::updateOrCreate(
         
         ['id'=>$item['id']],
         [
             'name' => $item['name'],
         'slug'  => $item['slug'],
         'details' => $item['details']
         ]   
     );
 }
    }
}
