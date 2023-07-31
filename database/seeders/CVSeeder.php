<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Cv;

class CVSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/cvs.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{

    		$cvPath = $data['cv'];
    		$cvPathPieces = explode('/', $cvPath);
    		$cvFileName = end($cvPathPieces);
    		$cvNewPath = '/back/assets/images/cvs/' . $cvFileName;

    		$cvPhotoPath = $data['photo'];
    		$cvPhotoPathPieces = explode('/', $cvPhotoPath);
    		$cvPhotoFileName = end($cvPhotoPathPieces);
    		$cvPhotoNewPath = '/back/assets/images/cv_photo/' . $cvPhotoFileName;

    		Cv::create([

    			'user_id' => $data['user_id'],
    			'category_id' => $data['category'],
    			'city_id' => $data['city'],
    			'region_id' => null,
    			'education_id' => $data['education'],
    			'experience_id' => $data['experience'],
    			'job_type_id' => $data['work_type'],

    			'gender_id' => $data['gender'],

    			'name' => $data['name'],
    			'surname' => $data['surname'],
    			'father_name' => $data['father_name'],
    			
    			'email' => $data['mail'],

    			'position' => $data['position'],

    			'slug' => Str::slug("$data[name] $data[surname]"),

    			'about_education' => $data['about_education'],

    			'salary' => $data['salary'],

    			'birth_date' => ($data['birth']) ? $data['birth'] : null,

    			'work_history' => $data['work_history'],

    			'skills' => $data['skills'],

    			'contact_mail' => $data['contact_mail'],

    			'contact_phone' => $data['contact_phone'],

    			'cv' => $cvNewPath,
    			'image' => $cvPhotoNewPath,

    			'portfolio' => $data['portfolio'],

    			'status' => $data['status'],

    		]);
    	}
    }
}
