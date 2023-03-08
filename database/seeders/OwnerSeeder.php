<?php

namespace Database\Seeders;
use App\Models\Owner;
use App\Models\Car;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $owners = Owner::factory()->count(100)->create();

        // foreach($owners as $owner){
        //     Car::factory()->count(rand(1,3))->create(['owner_id' => $owner->id]);
        // }

        Owner::factory()->count(100)->has(Car::factory()->count(rand(1,3)))->create();
    
        // Owner::factory()->count(3)->create();
    }
}
