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
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('user_id');

            $table->integer('company_id');

            $table->string('title');

            $table->string('slug');

            $table->text('about');

            $table->string('redirect_link');

            $table->string('image');

            $table->boolean('payment_type');

            $table->integer('price')->nullable();

            $table->integer('view')->default(0);

            $table->date('deadline');

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
        Schema::dropIfExists('trainings');
    }
};
