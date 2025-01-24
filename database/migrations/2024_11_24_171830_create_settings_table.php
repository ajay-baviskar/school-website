<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('x_link', 255)->nullable();
            $table->string('meta_link', 255)->nullable();
            $table->string('youtube_link', 255)->nullable();
            $table->string('facebook_link', 255)->nullable();
            $table->longText('fee_data')->nullable();
            $table->longText('contact_data')->nullable();
            $table->timestamps();
        });

        Schema::table('notices', function (Blueprint $table) {
            $table->string('url_name', 255)->nullable();
        });

        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
