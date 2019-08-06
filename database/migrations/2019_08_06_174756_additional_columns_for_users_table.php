<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdditionalColumnsForUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('facebook_profile');
            $table->dropColumn('year');

            $table->string('ice_name')->default('')->nullable();
            $table->string('ice_contact_number')->default('')->nullable();
            $table->string('avatar')->default('')->nullable();
            $table->string('full_address')->default('')->nullable();
            $table->string('application_status')->default('')->nullable();
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
            $table->integer('year')->default(0)->nullable();
            $table->string('facebook_profile')->default('')->nullable();

            $table->dropColumn('ice_name');
            $table->dropColumn('ice_contact_number');
            $table->dropColumn('avatar');
            $table->dropColumn('full_address');
            $table->dropColumn('application_status');
        });
    }
}
