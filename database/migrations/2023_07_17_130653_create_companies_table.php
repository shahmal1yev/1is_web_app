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
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id');
            $table->integer('sector_id');

            $table->integer('average')->default(0);

            $table->string('name');
            $table->string('slug')->nullable();

            $table->text('about');
            $table->text('hr')->nullable();

            $table->string('address');
            $table->string('website');

            $table->text('map');

            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();

            $table->string('image');

            $table->integer('view')->default(0);

            $table->boolean('status')->default(false);

            $table->bigInteger('vacanc_say')->default(0);

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
        Schema::dropIfExists('companies');
    }
};
