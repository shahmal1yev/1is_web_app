<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Models\Vacancies;

class VacancySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/vacancy.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		Vacancies::create([
    			'user_id' => $data['user_id'],
    			'company_id' => $data['company'],
    			'city_id' => $data['city'],
    			'village_id' => null,
    			'category_id' => $data['category'],
    			'job_type_id' => $data['work_type'],
    			'experience_id' => $data['experience'],
    			'education_id' => $data['education'],
    			'position' => $data['position'],
    			'slug' => Str::slug($data['position']),
    			'salary_type' => $data['salary_other'],
    			'min_salary' => $data['min_salary'],
    			'max_salary' => $data['max_salary'],
    			'min_age' => $data['min_age'],
    			'max_age' => $data['max_age'],
    			'requirement' => $data['requirements'],
    			'description' => $data['description'],
    			'contact_name' => $data['contact'],
    			'accept_type' => $data['cv_accept'],
    			'contact_info' => $data['contact_info'],
    			'deadline' => $data['expire'],
    			'status' => $data['status'],
    			'view' => $data['viewed'],

    			'created_at' => $data['created']
    		]);
    	}
    }
}
