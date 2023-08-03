<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Companies;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/companies.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];



    	foreach($datas as $data)
    	{
    		$instagram = ($data['instagram'] == "\"\"") ? null : $data['instagram'];
    		$linkedin = ($data['linkedin'] == "\"\"") ? null : $data['linkedin'];
    		$twitter = ($data['twitter'] == "\"\"") ? null : $data['twitter'];
    		$facebook = ($data['facebook'] == "\"\"") ? null : $data['facebook'];

    		$imagePath = $data['logo'];
    		$imagePathPieces = explode('/', $imagePath);
    		$imageName = end($imagePathPieces);
    		$imageNewPath = "/back/assets/images/companies/" . $imageName;

    		Companies::create([
				"id" => $data['id'],
    			'user_id' => $data['user_id'],
    			'sector_id' => $data['sector'],

    			'name' => $data['title'],

    			'slug' => Str::slug($data['title']),

    			'about' => $data['about'],
    			'hr' => $data['hr'],

    			'address' => $data['address'],
    			'website' => $data['website'],

    			'map' => $data['map'],

    			'instagram' => $instagram,
    			'linkedin' => $linkedin,
    			'facebook' => $facebook,
    			'twitter' => $twitter,

    			'image' => $imageNewPath,

    			'view' => $data['view'],

    			'status' => $data['status'],
    		]);
    	}
    }
}