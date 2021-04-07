<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webinfos', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->nullable();
            $table->string('web_name')->nullable();
            $table->string('web_url')->nullable();
            $table->text('site_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('footer_info')->nullable();
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
        Schema::dropIfExists('webinfos');
    }
}
