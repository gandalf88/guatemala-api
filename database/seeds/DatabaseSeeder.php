<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('users')->insert([
            'name' => 'Mobile Access',
            'email' => 'mobile@guatemala.com',
            'password' => Hash::make('Guatemala'),
            'type' => 1,
        ]);

        foreach (range(1,100) as $index) {
            
            $address = 'cityPrefix '.$faker->cityPrefix.', secondaryAddress '.$faker->secondaryAddress                    
                .', state '.$faker->state                              
                .', stateAbbr '.$faker->stateAbbr                          
                .', citySuffix '.$faker->citySuffix                          
                .', streetSuffix '.$faker->streetSuffix                       
                .', buildingNumber '.$faker->buildingNumber                      
                .', city '.$faker->city                                
                .', streetName '.$faker->streetName                     
                .', streetAddress '.$faker->streetAddress                      
                .', postcode '.$faker->postcode                        
                .', address '.$faker->address.', country '.$faker->country;  

            DB::table('promotions')->insert([
                'title' => 'Titulo - '.Str::random(10),
                'price' => $faker->numberBetween(200,1000).'$',
                'address' => $address,
                'latitude' =>  '14.6229',
                'longitude' => '-90.5315',
                'created_at' => '2020-07-26 19:24:35'
            ]);
        }
    }
}



   
