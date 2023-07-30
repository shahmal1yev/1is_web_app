<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Blogs;

use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/blog.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		$slug = Str::slug($data['title']) . '-' . time();
    		
    		$imagePath = $data['icon'];
    		$imagePathPieces = explode('/', $imagePath);
    		$imageName = end($imagePathPieces);
    		$imageNewPath = '/back/assets/images/posts/' . $imageName;

    		Blogs::create([
    			'user_id' => 1,

    			'title_az' => $data['title'],
    			'title_en' => $data['title'],
    			'title_ru' => $data['title'],
    			'title_tr' => $data['title'],

    			'slug' => $slug,

    			'content_az' => $data['content'],
    			'content_en' => $data['content'],
    			'content_ru' => $data['content'],
    			'content_tr' => $data['content'],

    			'keywords_az' => '',
    			'keywords_en' => '',
    			'keywords_ru' => '',
    			'keywords_tr' => '',

    			'image' => $imageNewPath,

    			'view' => $data['views'],

    			'status' => $data['status'],

    			'created_at' => $data['created']
    		]);
    	}
    }
}
