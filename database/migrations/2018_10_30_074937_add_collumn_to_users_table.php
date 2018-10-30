<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCollumnToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('avatar', 255)->after('email');
            $table->date('dob')->after('avatar');
            $table->text('address')->after('dob');
            $table->text('biography')->after('address');
            $table->string('role', 50)->after('gender');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table -> dropCollumn('avatar');
            $table -> dropCollumn('dob');
            $table -> dropCollumn('addres');
            $table -> dropCollumn('biography');
        });
    }
}
