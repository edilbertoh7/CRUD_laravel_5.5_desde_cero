<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Profession;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pro= DB::table('Profession')->where('title','desarrollador front-end')->value('id');
    	//tambien se puede usar esta forma laravel entiende que title es el nombre de la columna
    	//$pro= DB::table('Profession')->whereTitle('desarrollador front-end')->value('id');
    	

        DB::table('users')->insert([

        	'name'=>'Edilberto Herrera',
        	'email'=>'edilbertoh7@gmail.com',
        	'password'=> bcrypt('141580'),
        	'Profession_id'=>$pro
        	
        ]);
        	$pro= DB::table('Profession')->where('title','=','desarrollador back-end')->value('id');
    
         DB::table('users')->insert([

        	'name'=>'Ashley Valentina Herrera',
        	'email'=>'ashleyvalenet261205@gmail.com',
        	'password'=> bcrypt('141580'),
        	'Profession_id'=>$pro
        	
        ]);
    }
}
