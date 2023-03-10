<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', '255');
            $table->timestamps();
        });
        Schema::table('product__with__images', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable()->after('price');
            $table->foreign('category_id')->references('id')->on('product_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product__with__images', function (Blueprint $table) {
            $table->dropForeign('product__with__images_category_id_foreign');
            $table->dropColumn(['category_id']);
        });
        Schema::dropIfExists('product_categories');

    }
};
