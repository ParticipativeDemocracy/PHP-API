<?php

use App\Models\DocumentIteration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentIterationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_iterations', function(Blueprint $table){
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('content');
            $table->unsignedInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('document_iterations');
    }
}
