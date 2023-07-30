<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $filePath = base_path() . "/database/JSON/contact_info.json";
    	$json_data = file_get_contents($filePath);
    	$json = json_decode($json_data, true);
    	$datas = $json[2]['data'];

    	foreach($datas as $data)
    	{
    		ContactInfo::create($data);
    	}
    }
}
