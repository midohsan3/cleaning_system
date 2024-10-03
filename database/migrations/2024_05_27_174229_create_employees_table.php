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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->foreignId('nationality_id')->constrained('nationalities')->cascadeOnDelete()->cascadeOnUpdate()->nullable();
            $table->bigInteger('code');
            $table->string('position');
            $table->timestamp('birth_date');
            $table->timestamp('join_date')->nullable();
            $table->smallInteger('gender')->default(0)->comment('0=female, 1=male');
            $table->string('passport_no')->nullable();
            $table->timestamp('passport_expired_date')->nullable();
            $table->string('em_id')->nullable();
            $table->timestamp('em_id_expired_date')->nullable();
            $table->string('salary_bank_account')->nullable();
            $table->double('salary', 2);
            $table->double('overtime', 2);
            $table->double('allowance', 2);
            $table->smallInteger('status')->default(0)->comment('0=inactive, 1=active');
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
        Schema::dropIfExists('employees');
    }
};
