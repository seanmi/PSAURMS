<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transaction_number');
            $table->boolean('edit_transaction_number');
            $table->integer('document_class_id')->unsigned();
            $table->integer('assign_to_user_id')->unsigned();
            $table->string('document_no');
            $table->longText('subject');
            $table->string('sender');
            $table->string('origin');
            $table->string('file');
            $table->integer('state_id')->unsigned();
            $table->integer('retention_id')->unsigned();
            $table->boolean('read')->default(0);
            $table->timestamp('disposal_date')->nullable();
            $table->boolean('archive')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('documents');
    }
}
