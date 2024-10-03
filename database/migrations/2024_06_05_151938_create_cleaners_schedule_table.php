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
        Schema::create('cleaners_schedule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->timestamp('start_job')->nullable();
            $table->timestamp('end_job')->nullable();
            $table->smallInteger('type')->default(1)->comment('1=>Annual Leave,2=>Sick Leave,3=>permission,4=>offDay ,5=>booking');
            $table->text('description')->nullable();
            $table->foreignId('leave_id')->constrained('leaves')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('booking_id')->constrained('booking')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
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
        Schema::dropIfExists('cleaners_schedule');
    }
};
