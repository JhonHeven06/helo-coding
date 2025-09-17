<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddClicksToProductsTable extends Migration
{
    
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('klik')->default(0)->after('price');
        });
    }

   
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('klik');
        });
    }
}
