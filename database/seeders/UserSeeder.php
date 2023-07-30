<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/users.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		User::create([

    			'name' => $data['name'],
    			'surname' => $data['surname'],
    			'email' => $data['mail'],
    			'email_verification_code' => '',
    			'password' => $data['password'],
    			'status' => 1,
    			'created_at' => $data['created']

    		]);
    	}
    }
}
