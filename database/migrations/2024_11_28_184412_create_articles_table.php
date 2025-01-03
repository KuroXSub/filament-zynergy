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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('thumbnail');
            $table->foreignId('interest_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('favorite_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('disease_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('status', ['Draft', 'Publish']);
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
        Schema::dropIfExists('articles');
    }
};
