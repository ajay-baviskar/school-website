<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->text('desc')->nullable();
            $table->bigInteger('cat_id')->length(11)->nullable();
            $table->bigInteger('type_id')->length(11)->nullable();
            $table->bigInteger('field_type_id')->length(11)->nullable();
            // $table->string('type', 255);
            $table->text('options')->nullable();
            $table->enum('status', ['1', '0'])->default(1);
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
        Schema::dropIfExists('questions');
    }
}
