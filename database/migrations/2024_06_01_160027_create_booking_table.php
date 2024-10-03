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
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('service_id')->constrained('services')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->string('ref_no');
            $table->string('address');
            $table->smallInteger('cleaners_count')->default(1);
            $table->smallInteger('cleaners_assign')->default(0);
            $table->smallInteger('hours')->default(0);
            $table->smallInteger('days')->default(0);
            $table->smallInteger('months')->default(0);
            $table->timestamp('start_date')->nullable();
            $table->timestamp('end_date')->nullable();
            $table->double('hours_cost',2)->default(0.00);
            $table->double('days_cost',2)->default(0.00);
            $table->double('month_cost',2)->default(0.00);
            $table->double('material_cost',2)->default(0.00);
            $table->double('discount',2)->default(0.00);
            $table->double('total',2)->default(0.00);
            $table->smallInteger('status')->default(0)->comment('0=>new,1=>approved,2=>in Schedule, 3=>completed, 4=>rejected');
            $table->smallInteger('payment')->default(0)->comment('0=>cash,1=>card');
            $table->smallInteger('remind')->default(0)->comment('0=>oneTime,1=>Weekly,2=>Monthly');
            $table->double('paid_amount',2)->default(0.00);
            $table->smallInteger('type')->default(0)->comment('0=>booking,1=>hiring');
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
        Schema::dropIfExists('booking');
    }
};
