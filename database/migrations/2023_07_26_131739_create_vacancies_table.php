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
        Schema::create('vacancies', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id');
            $table->integer('company_id');
            $table->integer('city_id');
            $table->integer('village_id')->nullable();
            $table->integer('category_id');
            $table->integer('job_type_id');
            $table->integer('experience_id');
            $table->integer('education_id');
            $table->string('position', 1000);
            $table->string('slug', 1000);
            $table->boolean('salary_type')->default(true);
            $table->integer('min_salary')->nullable();
            $table->integer('max_salary')->nullable();
            $table->integer('min_age');
            $table->integer('max_age');
            $table->longtext('requirement');
            $table->longtext('description');
            $table->string('contact_name', 50)->nullable();
            $table->boolean('accept_type')->default(true);
            $table->string('contact_info', 1500)->nullable();
            $table->date('deadline');
            $table->boolean('status')->default(false);
            $table->integer('view')->default(false);

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacancies');
    }
};
