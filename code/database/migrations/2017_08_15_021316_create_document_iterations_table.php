<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentIterationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_iterations', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents');

            $table->unsignedInteger('created_by_id');
            $table->foreign('created_by_id')->references('id')->on('users');

            $table->text('content');

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
        Schema::dropIfExists('document_iterations');
    }
}
