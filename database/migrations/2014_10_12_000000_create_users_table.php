<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('users', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('name');
        //     $table->string('email')->unique();
        //     $table->timestamp('email_verified_at')->nullable();
        //     $table->string('password');
        //     $table->rememberToken();
        //     $table->timestamps();
        // });
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            //$table->string('email')->unique();
            $table->integer('nip')->unique();
            $table->string('jabatan');
            // $table->enum('jabatan', ['DIREKTUR', 'FINANCE', 'STAFF'])->default('pembeli');
            //$table->enum('jabatan', ['DIREKTUR', 'FINANCE', 'STAFF']);
            $table->string('password');
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
