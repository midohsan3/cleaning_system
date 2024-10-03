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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('bill_no');
            $table->foreignId('booking_id')->constrained('booking')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->double('total',2);
            $table->double('materials',2);
            $table->double('discount',2);
            $table->double('subtotal',2);
            $table->double('paid_amount',2);
            $table->smallInteger('payment')->default(0)->comment('0=>cash,1=>card');
            $table->smallInteger('status')->default(0)->comment('0=>pending,1=>unpaid,2=>paid');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
};
