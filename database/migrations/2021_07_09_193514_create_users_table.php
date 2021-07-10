<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Зарегистрированные пользователи
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id') // привязка к роли
                ->constrained('roles')
                ->cascadeOnDelete();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('password');
            $table->boolean('is_business')->default(false); // 0-клиент, 1-салон
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}