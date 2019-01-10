<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsToUserDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->string('avatar')->nullable()->after('about_me');
            $table->integer('mon')->default(0);
            $table->integer('tue')->default(0);
            $table->integer('wed')->default(0);
            $table->integer('thu')->default(0);
            $table->integer('fri')->default(0);
            $table->integer('sut')->default(0);
            $table->integer('sun')->default(0);
            $table->dropColumn('currency');
            $table->dropColumn('currency_h');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'mon', 'tue', 'wed', 'thu', 'fri', 'sut', 'sun', 'currency', 'currency_h']);
        });
    }
}
