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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->tinyInteger('year');
            $table->text('description');
            $table->text('img')->nullable();
            $table->foreignId('author_id')->nullable()->constrained('authors')->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->onUpdate('cascade')
                ->nullOnDelete();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('books');
    }
};
