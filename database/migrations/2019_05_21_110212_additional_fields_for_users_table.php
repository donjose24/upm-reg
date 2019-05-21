<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalFieldsForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('facebook_profile');
            $table->tinyInteger('is_enrolled')->default(0);
            $table->string('course');
            $table->string('occupation');
            $table->integer('year');
            $table->date('birthdate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('mobile_number');
            $table->dropColumn('facebook_profile');
            $table->dropColumn('is_enrolled');
            $table->dropColumn('course');
            $table->dropColumn('occupation');
            $table->dropColumn('year');
            $table->dropColumn('birthdate');
        });
    }
}
