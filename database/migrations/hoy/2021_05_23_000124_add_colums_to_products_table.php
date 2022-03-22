<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {
        Schema::table('products', function (Blueprint $table) {

            $table->integer('clasification_id')->after('id')->nullable();
            $table->integer('subclasification_id')->after('clasification_id')->nullable();
            $table->string('name')->after('subclasification_id')->nullable();
            $table->string('price')->after('status')->nullable();
            $table->string('style')->after('price')->nullable();
            $table->string('degrees')->after('style')->nullable();
            $table->string('malts')->after('id')->nullable();
            $table->string('fermentation')->after('malts')->nullable();
            $table->text('description')->after('fermentation')->nullable();
            $table->string('distilled')->after('description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
