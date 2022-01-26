<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug',255);
            $table->string('author', 100)->default('Admin');
            $table->enum('status', ['DRAFT', 'ACTIVE', 'BLOCKED'])->default('DRAFT');
            $table->string('short_description', 100)->nullable();
            $table->text('description')->nullable();
            $table->boolean('isImage')->default(false);
            $table->foreignId('source_id')
                ->constrained('data_sources')
                ->cascadeOnDelete();
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
        Schema::dropIfExists('news');
    }
}
