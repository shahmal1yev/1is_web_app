<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\BannerImage;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$filePath = base_path() . "/database/JSON/banner.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		$imagePath = $data['image'];
    		$imagePathPieces = explode('/', $imagePath);
    		$imageName = end($imagePathPieces);
    		$imageNewPath = "/back/assets/images/banner/" . $imageName;

    		BannerImage::create([

    			'image' => $imageNewPath,

    		]);
    	}
    }
}