<?php

use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert([
        	'city' => 'araneta cubao',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'edsa cubao',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'gubat',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'legaspi',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'calabanga',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'lagunoy',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'legaspi',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'sorsogon',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'naga',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'ermita',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'gubat',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'masbate',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'aroroy',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'iriga',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'buhi',
            'address' => '---',
            'status' => 'active',]
            );

        DB::table('cities')->insert([
        	'city' => 'madaon',
            'address' => '---',
            'status' => 'active',]
            );
    }
}
