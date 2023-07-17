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
            $table->string('slug');
            $table->text('about');

            $table->text('hr')->nullable()->default(null);

            $table->string('address');
            $table->string('website');
            $table->text('map');

            $table->string('instagram')->default(null);
            $table->string('linkedin')->default(null);
            $table->string('facebook')->default(null);
            $table->string('twitter')->default(null);

            $table->string('image');
            $table->integer('view');
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
