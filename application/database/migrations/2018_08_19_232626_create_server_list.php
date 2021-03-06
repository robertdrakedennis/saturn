<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServerList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('description', 1000)->nullable();
            $table->string('ip');
            $table->string('port');
            $table->string('img_url')->nullable();
            $table->string('fa_icon')->nullable();
            $table->string('fa_color')->default('#333639');
            $table->enum('display', ['fontawesome', 'image']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('server_list');
    }
}
