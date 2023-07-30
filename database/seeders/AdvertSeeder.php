<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Adverts;


class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
        	[
        		'image' => 'back/assets/images/adverts/advert_ej5KzI.png',
        		'redirect_link' => 'https://1is.butagrup.az/back/assets/images/logos/favicon_kPZKOx.png',
        		'status' => 1
        	]
        ];

        foreach($datas as $data)
        {
        	Adverts::create($data);
        }
    }
}
