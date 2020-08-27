<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            
            $table->Increments('id');
            $table->string('name')->nullable();
            $table->string('addresss')->nullable();
            $table->integer('city')->nullable();
            $table->string('representative')->nullable();            
            $table->string('contact_person')->nullable();
            $table->string('mobile')->nullable();
            $table->string('email')->nullable();

            $table->text('programs')->nullable();
            $table->text('certificate_fees')->nullable();


            $table->longText('standards')->nullable();
            $table->longText('unit_categories')->nullable();
            $table->longText('num_subunits')->nullable();
            $table->longText('reg_fees')->nullable();

            $table->integer('status')->nullable();
            $table->string('description')->nullable();
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
        Schema::dropIfExists('invoice');
    }
}
