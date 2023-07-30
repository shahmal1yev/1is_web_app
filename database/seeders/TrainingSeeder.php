<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Trainings;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/training.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		$imagePath = $data['image'];
    		$imagePieces = explode('/', $imagePath);
    		$imageName = end($imagePieces);
    		$imageNewPath = "/back/assets/images/trainings/$imageName";

    		Trainings::create([

    			'user_id' => $data['user_id'],
    			'company_id' => $data['company_id'],
    			'title' => $data['name'],
    			'slug' => Str::slug($data['name']),
    			'about' => $data['about'],
    			'redirect_link' => $data['redirect_link'],
    			'image' => $imageNewPath,
    			'payment_type' => $data['payment_type'],
    			'price' => $data['price'],
    			'view' => $data['view'],
    			'deadline' => $data['deadline'],
    			'status' => $data['status'],

    		]);
    	}
    }
}
