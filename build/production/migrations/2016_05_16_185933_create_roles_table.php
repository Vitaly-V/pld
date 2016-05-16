<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('role');
        });

        $id = DB::table('roles')->insertGetId(
            [
                'role' => 'admin'
            ]
        );

        DB::table('roles')->insert(
            [
                'role' => 'user'
            ]
        );

        DB::table('users')->where('id', 1)->update(['role_id' => $id]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
}
