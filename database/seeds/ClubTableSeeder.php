<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Club;
use App\Category;

class ClubTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //$dt = Carbon::now();
        //$dateNow = $dt->toDateTimeString();

        for($i=0; $i < 3; $i++ ){
          DB::table('categories')->insert([
              'name' => Str::random(10),
          ]);
        }

        DB::table('clubs')->insert([
            'name' => Str::random(10),
            'post_code' => Str::random(10),
            'city' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'telephone' => Str::random(10),
            'mobile' => Str::random(10),
            'address' => Str::random(10),
            'short_description' => Str::random(100),
        ]);

        DB::table('clubs')->insert([
            'name' => Str::random(10),
            'post_code' => Str::random(10),
            'city' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'telephone' => Str::random(10),
            'mobile' => Str::random(10),
            'address' => Str::random(10),
            'short_description' => Str::random(100),
        ]);

        for($i=0; $i < 15; $i++ ){
          DB::table('products')->insert([
              'title' => Str::random(10),
              'category_id' => Category::all()->random()->id,
              'club_id' => Club::all()->random()->id,
              'location' => Str::random(10),
              'address' => Str::random(10),
              'post_code' => $i,
              'city' => Str::random(10),
              'expire_date' => \Carbon\Carbon::createFromDate(2000,01,01)->toDateTimeString(),
              'total_number' => $i,
              'initial_point' => $i,
              'description' => Str::random(100),
              'short_description' => Str::random(100),
          ]);
        }

    }
}
