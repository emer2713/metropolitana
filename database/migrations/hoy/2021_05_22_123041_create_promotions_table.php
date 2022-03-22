<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->string  ('name', 128)           ->nullable();
            $table->string  ('slug', 128)           ->nullable();
            $table->string  ('sku')                 ->unique()->nullable();
            $table->string  ('file_path')           ->nullable();
            $table->string  ('file')                ->nullable();
            $table->string  ('file_icon')           ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
