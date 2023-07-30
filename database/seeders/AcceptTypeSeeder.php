<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AcceptType;

use Illuminate\Support\Str;

class AcceptTypeSeeder extends Seeder
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
        		'title_az' => 'Elektron Poçt vasitəsilə',
        		'title_en' => 'Via Email',
        		'title_ru' => 'По электронной почте',
        		'title_tr' => 'E-posta yoluyla',
        		'slug' => Str::slug('Elektron Poçt vasitəsilə'),
        		'status' => 1,
        	],
        	[
        		'title_az' => '1iş.az üzərindən',
        		'title_en' => 'via 1ish.az',
        		'title_ru' => 'через 1ish.az',
        		'title_tr' => '1ish.az aracılığıyla',
        		'slug' => Str::slug('1iş.az üzərindən'),
        		'status' => 1,
        	],
        	[
        		'title_az' => 'Keçid Linki',
        		'title_en' => 'Transition Link',
        		'title_ru' => 'Ссылка на переход',
        		'title_tr' => 'Geçiş Bağlantısı',
        		'slug' => Str::slug('Keçid Linki'),
        		'status' => 1,
        	],
        ];

        foreach($datas as $data)
        {
        	AcceptType::create($data);
        }
    }
}
