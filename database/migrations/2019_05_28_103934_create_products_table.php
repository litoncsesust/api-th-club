<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->integer('sku');
            $table->integer('user_id');
            $table->integer('category_id')->unsigned();
            $table->integer('club_id');
            $table->string('location');
            $table->text('address');
            $table->integer('post_code');
            $table->string('city');
            $table->date('expire_date');
            $table->integer('total_number');
            $table->integer('initial_point');
            $table->text('description')->nullable();
            $table->text('short_description');
            $table->string('seller_club')->nullable();
            $table->string('seller_address')->nullable();
            $table->string('seller_postcode')->nullable();
            $table->string('seller_city')->nullable();
            $table->string('seller_email')->nullable();
            $table->string('seller_telephone')->nullable();
            $table->text('seller_description')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            //$table->foreign('category_id')->references('id')->on('categories');
            //$table->foreign('club_id')->references('id')->on('clubs');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
