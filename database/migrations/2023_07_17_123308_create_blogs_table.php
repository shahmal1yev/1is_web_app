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
        Schema::create('blogs', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');

            $table->string('title_az');
            $table->string('title_en');
            $table->string('title_ru');
            $table->string('title_tr');

            $table->string('slug');

            $table->longtext('content_az');
            $table->longtext('content_en');
            $table->longtext('content_ru');
            $table->longtext('content_tr');

            $table->string('keywords_az', 500);
            $table->string('keywords_en', 500);
            $table->string('keywords_ru', 500);
            $table->string('keywords_tr', 500);

            $table->string('image');

            $table->integer('view')->default(0);

            $table->boolean('status')->default(true);

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
        Schema::dropIfExists('blogs');
    }
};
