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
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('meta_keywords_az', 500);
            $table->string('meta_keywords_en', 500);
            $table->string('meta_keywords_ru', 500);
            $table->string('meta_keywords_tr', 500);

            $table->string('meta_title_az', 500);
            $table->string('meta_title_en', 500);
            $table->string('meta_title_ru', 500);
            $table->string('meta_title_tr', 500);

            $table->text('meta_description_az');
            $table->text('meta_description_en');
            $table->text('meta_description_ru');
            $table->text('meta_description_tr');

            $table->string('logo');
            $table->string('favicon');

            $table->boolean('status')->default(true);

            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
