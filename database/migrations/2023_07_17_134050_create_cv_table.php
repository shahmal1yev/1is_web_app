<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cv', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('category_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('region_id')->nullable();
            $table->integer('education_id')->nullable();
            $table->integer('experience_id')->nullable();
            $table->integer('job_type_id')->nullable();
            $table->integer('gender_id')->nullable();
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('father_name')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('position')->nullable();
            $table->string('slug');
            $table->longtext('about_education')->nullable();
            $table->string('salary', 25)->nullable();
            $table->date('birth_date')->nullable();
            $table->longtext('work_history')->nullable();
            $table->text('skills')->nullable();
            $table->string('contact_mail', 50)->nullable();
            $table->string('contact_phone', 50)->nullable();
            $table->string('cv', 500);
            $table->string('image', 500);
            $table->longtext('portfolio')->default('{"portfolio":[]}');
            $table->integer('view')->default(0);
            $table->boolean('status')->default(false);

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cv');
    }
};
