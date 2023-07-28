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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');

            $table->string('surname')->nullable();

            $table->string('email')->unique();

            $table->string('image')->nullable()->default('back/assets/images/users/default-user.png');

            $table->string('email_verification_code');

            $table->string('password');

            $table->string('cat_id')->nullable();

            // $table->string('google_id',  400)->nullable();

            $table->string('remember_token', 100)->nullable();

            $table->boolean('is_admin')->default(0);
            $table->boolean('is_superadmin')->default(0);

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
        Schema::dropIfExists('users');
    }
};
