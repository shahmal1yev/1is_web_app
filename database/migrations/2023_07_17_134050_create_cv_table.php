<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('category_id')->default(null);
            $table->integer('city_id')->default(null);
            $table->integer('region_id')->default(null);
            $table->integer('education_id')->default(null);
            $table->integer('experience_id')->default(null);
            $table->integer('job_type_id')->default(null);
            $table->integer('gender_id')->default(null);
            $table->string('name')->default(null);
            $table->string('surname')->default(null);
            $table->string('father_name')->default(null);
            $table->string('email', 50)->default(null);
            $table->string('position')->default(null);
            $table->string('slug');
            $table->longtext('about_education')->default(null);
            $table->string('salary', 25)->default(null);
            $table->date('birth_date')->default(null);
            $table->longtext('work_history')->default(null);
            $table->text('skills')->default(null);
            $table->string('contact_mail', 50)->default(null);
            $table->string('contact_phone', 50)->default(null);
            $table->string('cv', 500);
            $table->string('image', 500);
            $table->longtext('portfolio')->default(null);
            $table->integer('view')->default(0);
            $table->boolean('status')->default(false);

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv');
    }
};
