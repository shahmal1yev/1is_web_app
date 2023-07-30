<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Categories;

class CategorySeeder extends Seeder
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
				"title_az" => "Maliyyə və mühasibatlıq",
				"title_en" => "Finance and accounting",
				"title_ru" => "Финансы и учет",
				"title_tr" => "Finans ve muhasebe",
				"slug" => "maliyye-ve-muhasibatliq",
				"icon" => "fa fa-calculator",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Marketinq, reklam, çap, nəşriyyat",
				"title_en" => "Marketing, advertising, printing, publishing",
				"title_ru" => "Маркетинг, реклама, полиграфия, издательское дело",
				"title_tr" => "Pazarlama, reklam, basım, yayıncılık",
				"slug" => "marketinq-reklam-cap-nesriyyat",
				"icon" => "fa fa-bullhorn",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "İnformasiya texnologiyaları və proqramlaşdırma",
				"title_en" => "Information technologies and programming",
				"title_ru" => "Информационные технологии и программирование",
				"title_tr" => "Bilişim teknolojileri ve programlama",
				"slug" => "informasiya-texnologiyalari-ve-proqramlasdirma",
				"icon" => "fa fa-code",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Mühəndislik",
				"title_en" => "Engineering",
				"title_ru" => "Инжиниринг",
				"title_tr" => "Mühendislik",
				"slug" => "muhendislik",
				"icon" => "fa fa-wrench",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Data Analitika",
				"title_en" => "Data Analytics",
				"title_ru" => "Аналитика данных",
				"title_tr" => "Veri analizi",
				"slug" => "data-analitika",
				"icon" => "fa fa-line-chart",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "İnzibati, biznes və idarəetmə",
				"title_en" => "Administrative, business and management",
				"title_ru" => "Административный, бизнес и менеджмент",
				"title_tr" => "İdari, iş ve yönetim",
				"slug" => "inzibati-biznes-ve-idareetme",
				"icon" => "fa fa-briefcase",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Pərakəndə satış və müştəri xidmətləri",
				"title_en" => "Retail sales and customer service",
				"title_ru" => "Розничные продажи и обслуживание клиентов",
				"title_tr" => "Perakende satış ve müşteri hizmetleri",
				"slug" => "perakende-satis-ve-musteri-xidmetleri",
				"icon" => "fa fa-shopping-cart",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Xidmət sahəsi",
				"title_en" => "Service area",
				"title_ru" => "Зона обслуживания",
				"title_tr" => "Hizmet alanı",
				"slug" => "xidmet-sahesi",
				"icon" => "fa fa-glass",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Turizm, otel, restoran",
				"title_en" => "Tourism, hotel, restaurant",
				"title_ru" => "Туризм, гостиница, ресторан",
				"title_tr" => "Turizm, otel, restoran",
				"slug" => "turizm-otel-restoran",
				"icon" => "fa fa-cutlery",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Logistika, nəqliyyat",
				"title_en" => "Logistics, transport",
				"title_ru" => "Логистика, транспорт",
				"title_tr" => "Lojistik, ulaşım",
				"slug" => "logistika-neqliyyat",
				"icon" => "fa fa-truck",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Hüquq və məhkəmə",
				"title_en" => "Law and court",
				"title_ru" => "Закон и суд",
				"title_tr" => "Hukuk ve mahkeme",
				"slug" => "huquq-ve-mehkeme",
				"icon" => "fa fa-gavel",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Səhiyyə",
				"title_en" => "Healthcare",
				"title_ru" => "Здравоохранение",
				"title_tr" => "Sağlık hizmeti",
				"slug" => "sehiyye",
				"icon" => "fa fa-medkit",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Təhsil və elm",
				"title_en" => "Education and science",
				"title_ru" => "Образование и наука",
				"title_tr" => "Eğitim ve bilim",
				"slug" => "tehsil-ve-elm",
				"icon" => "fa fa-university",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Sənaye və kənd təsərrüfatı",
				"title_en" => "Industry and agriculture",
				"title_ru" => "Промышленность и сельское хозяйство",
				"title_tr" => "Sanayi ve tarım",
				"slug" => "senaye-ve-kend-teserrufati",
				"icon" => "fa fa-leaf",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Tikinti və inşaat",
				"title_en" => "Construction",
				"title_ru" => "Строительство",
				"title_tr" => "İnşaat",
				"slug" => "tikinti-ve-insaat",
				"icon" => "fa fa-building",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Dizayn, incəsənət",
				"title_en" => "Design, art",
				"title_ru" => "Дизайн, искусство",
				"title_tr" => "Tasarım, sanat",
				"slug" => "dizayn-incesenet",
				"icon" => "fa fa-paint-brush",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Müxtəlif",
				"title_en" => "Various",
				"title_ru" => "Различный",
				"title_tr" => "Çeşitli",
				"slug" => "muxtelif",
				"icon" => "fa fa-random",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Media",
				"title_en" => "Media",
				"title_ru" => "СМИ",
				"title_tr" => "Medya",
				"slug" => "media",
				"icon" => "fa fa-newspaper-o",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Təcrübə proqramı",
				"title_en" => "Internship program",
				"title_ru" => "Программа интернатуры",
				"title_tr" => "Staj programı",
				"slug" => "tecrube-proqrami",
				"icon" => "fa fa-suitcase",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "Sığorta",
				"title_en" => "Insurance",
				"title_ru" => "Страхование",
				"title_tr" => "Sigorta",
				"slug" => "sigorta",
				"icon" => "fa fa-life-ring",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			],
			[
				"title_az" => "İnsan resursları",
				"title_en" => "Human resources",
				"title_ru" => "Человеческие ресурсы",
				"title_tr" => "İnsan kaynakları",
				"slug" => "insan-resurslari",
				"icon" => "fa fa-users",
				"status" => "1",
				"created_at" => "2023-01-11 05:38:50",
			]
		];

		foreach($datas as $data)
		{
			Categories::create($data);
		}
    }
}
