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
            $table->string('contact_number');
            $table->string('facebook_profile')->default('')->nullable();
            $table->tinyInteger('is_enrolled')->default(0);
            $table->string('course')->nullable()->default('');
            $table->string('occupation')->default('')->nullable();
            $table->integer('year')->default(0)->nullable();
            $table->date('birthdate')->nullable();
            $table->dropColumn('name');
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
            $table->dropColumn('contact_number');
            $table->dropColumn('facebook_profile');
            $table->dropColumn('is_enrolled');
            $table->dropColumn('course');
            $table->dropColumn('occupation');
            $table->dropColumn('year');
            $table->dropColumn('birthdate');
            $table->string('name');
        });
    }
}
