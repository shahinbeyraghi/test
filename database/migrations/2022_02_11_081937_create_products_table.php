<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('title');
            $table->text('description');
            $table->enum('comment_status', ['disable', 'enable_buyer', 'enable'])->default('disable');
            $table->enum('vote', ['disable', 'enable', 'enable_buyer'])->default('disable');
            $table->enum('status', ['disable', 'enable'])->default('disable');
            $table->decimal('average_rate')->nullable();
            $table->integer('comment_count')->nullable();
            $table->string('provider');
            $table->string('provider_id');
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
        Schema::dropIfExists('products');
    }
}
