<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class DefaultSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Default admin acc

        $user = new User;
        $user->name = 'admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('admin');
        $user->save();

        //Example components
        DB::table('components')->insert([
            'type' => 'Wheels',
            'value' => 'Alloy wheels',
        ]);

        //Example brand
        DB::table('brands')->insert([
            'name' => 'Toyota',
        ]);

        //Example model
        DB::table('car_models')->insert([
            'brand_id' => '1',
            'name' => 'Corolla',
        ]);

        //Example package
        DB::table('packages')->insert([
           'model_id' => '1',
           'name' => 'Premium',
           'price' => '850000',
        ]);

        //Engine example
        DB::table('engines')->insert([
           'package_id' => '1',
           'type' => '2.0 TDI',
        ]);

        //Engine -> component relation
        DB::table('engine_component')->insert([
           'engine_id' => '1',
           'component_id' => '1',
        ]);

        //Example engine

        /*DB::table('users')->insert([
            'name' => 'admin',
            'e-mail' => 'admin@example.com',
            'password' => bcrypt('admin'),
        ]);*/
    }
}
