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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('product_name');
            $table->string('store_name');
            $table->string('user_email');
            $table->string('user_phone');
            $table->string('shipping_address');
            $table->integer("product_quantity");
            $table->integer("product_total");
            $table->integer("shipping_total");
            $table->decimal('distance', 20, 2);
            $table->decimal('shipping_charg_perkm', 8, 2);
            $table->integer("total_price");
            $table->boolean("payment_status")->default(true);
            $table->boolean("store_paid_status")->default(false);
            $table->text("transaction_id")->nullable();
            $table->boolean("shipping_status")->default(false);
            $table->boolean("shipping_confirmation")->default(false);
            $table->boolean("order_status")->default(false);
            $table->unsignedBigInteger("user_id");


            $table->unsignedBigInteger("store_id");
            $table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
};
