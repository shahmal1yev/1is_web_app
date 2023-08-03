<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Regions;

class RegionSeeder extends Seeder
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
				"id" => 1,
                "city_id"=> 1,
				"title_az" => "Binəqədi ",
				"title_en" => "Binagadi",
				"title_ru" => "Бинагади",
				"title_tr" => "Binagadi",
				"slug" => "bineqedi",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"id" => 2,
                "city_id"=> 1,
				"title_az" => "Qaradağ  ",
				"title_en" => "Karadağ",
				"title_ru" => "Карадаг",
				"title_tr" => "Karadağ",
				"slug" => "qaradag",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 3,
                "city_id"=> 1,
				"title_az" => "Xəzər  ",
				"title_en" => "Caspian",
				"title_ru" => "Каспий",
				"title_tr" => "Hazar",
				"slug" => "xezer",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
            [
				"id" => 4,
                "city_id"=> 1,
				"title_az" => "Səbail   ",
				"title_en" => "Sabail",
				"title_ru" => "Сабаил",
				"title_tr" => "Sabail",
				"slug" => "sebail",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 5,
                "city_id"=> 1,
				"title_az" => "Sabunçu",
				"title_en" => "Sabunchu",
				"title_ru" => "Сабунчинский",
				"title_tr" => "Sabunçu",
				"slug" => "sabuncu",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 6,
                "city_id"=> 1,
				"title_az" => "Suraxanı ",
				"title_en" => "Surakhani",
				"title_ru" => "Сураханы",
				"title_tr" => "Surakhani",
				"slug" => "suraxani",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 7,
                "city_id"=> 1,
				"title_az" => "Nərimanov",
				"title_en" => "Narimanov",
				"title_ru" => "Нариманов",
				"title_tr" => "Nerimanov",
				"slug" => "nerimanov",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 8,
                "city_id"=> 1,
				"title_az" => "Nəsimi ",
				"title_en" => "Nasimi",
				"title_ru" => "Насими",
				"title_tr" => "Nesimi",
				"slug" => "nesimi",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 9,
                "city_id"=> 1,
				"title_az" => "Nizami",
				"title_en" => "Nizami",
				"title_ru" => "Низами",
				"title_tr" => "Nizami",
				"slug" => "nizami",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 10,
                "city_id"=> 1,
				"title_az" => "Pirallahı",
				"title_en" => "Pirallahi",
				"title_ru" => "Пираллахи",
				"title_tr" => "Pirallahi",
				"slug" => "pirallahi",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
            [
				"id" => 11,
                "city_id"=> 1,
				"title_az" => "Xətai",
				"title_en" => "Khatai",
				"title_ru" => "Хатаинский",
				"title_tr" => "Hatayi",
				"slug" => "xetayi",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],[
				"id" => 12,
                "city_id"=> 1,
				"title_az" => "Yasamal",
				"title_en" => "Yasamal",
				"title_ru" => "Ясамал",
				"title_tr" => "Yasamal",
				"slug" => "yasamal",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			]
		];

		foreach($datas as $data)
		{
			Regions::create($data);
		}
    }
}
