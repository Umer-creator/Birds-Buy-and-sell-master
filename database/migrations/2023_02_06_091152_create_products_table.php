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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("slug")->unique();
            $table->text("short_des")->nullable();
            $table->longText("description");
            $table->decimal("price");
            $table->boolean("stock_status")->default(true);
            $table->boolean("status")->default(false);
            $table->boolean("featured")->default(false);
            $table->unsignedInteger("quantity")->default(1);
            $table->string("image")->nullable();
            $table->text("images")->nullable();
            $table->bigInteger("category_id")->unsigned()->nullable();
            $table->bigInteger("store_id")->unsigned()->nullable();
            $table->timestamps();
            //updated
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
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
};
