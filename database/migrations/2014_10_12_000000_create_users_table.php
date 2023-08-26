<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('administrator')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            'username' => 'placement-direct',
            'firstname' => 'PlacementDirect',
            'lastname' => 'Administateur',
            'password' => Hash::make('Admin2022'),
            'email' => 'contact@placementdirect.fr',
            'phone' => '0769178981',
            'administrator' => true,
        ]);



        DB::table('users')->insert([
            'username' => 'test',
            'firstname' => 'test',
            'lastname' => 'test',
            'password' => Hash::make('Test2022'),
            'email' => 'contact@test.fr',
            'phone' => '0134211208',
            'administrator' => false,
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
