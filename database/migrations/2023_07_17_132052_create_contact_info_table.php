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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->increments('id');

            $table->string('phone', 50);
            $table->string('email', 50);

            $table->string('address_az');
            $table->string('address_en');
            $table->string('address_ru');
            $table->string('address_tr');

            $table->boolean('status')->default(1);

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
        Schema::dropIfExists('contact_info');
    }
};
