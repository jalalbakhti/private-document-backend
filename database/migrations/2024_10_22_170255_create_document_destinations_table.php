<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document_destinations', function (Blueprint $table) {
            $table->id();
            $table->integer('step');
            $table->integer('deadline');            
            $table->date('send_date');
            $table->date('recieve_date');
            $table->boolean('response');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id')->references('id')->on('documents')
                ->onUpdate('cascade')
                ->onDelete('no action');
                $table->unsignedBigInteger('destination_id');
            $table->foreign('destination_id')->references('id')->on('destinations')
                ->onUpdate('cascade')
                ->onDelete('no action');








            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_destinations');
    }
};