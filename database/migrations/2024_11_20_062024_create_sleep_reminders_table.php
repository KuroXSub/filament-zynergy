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
        Schema::create('sleep_reminders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('sleep_name');
            $table->integer('sleep_hour');
            $table->integer('sleep_minute');
            $table->integer('wake_hour');
            $table->integer('wake_minute');
            $table->integer('sleep_frequency');
            $table->integer('toggle_value');
            $table->timestamp('sleep_time')->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sleep_reminders');
    }
};
