<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnsUserDatas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_datas', function (Blueprint $table) {
            $table->dropColumn('currency');
            $table->dropColumn('currency_h');
        });

        Schema::table('user_datas', function (Blueprint $table){
            $table->enum('currency', ['услуга', 'час'])->after('min_price')->default('час');
            $table->enum('currency_h', ['услуга', 'час'])->after('price_for_hour')->default('час');
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
            $table->dropColumn(['currency', 'currency_h']);
        });
    }
}
