<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('arch')->nullable();
            $table->string('file2D_path');
            $table->string('file3D_path')->nullable();
            $table->tinyInteger('accepted')->nullable();
            $table->tinyInteger('payment_status')->nullable();
            $table->bigInteger('paied_salary')->nullable();
            $table->foreignId('user_id')
            ->constrained()
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('tax_record')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
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
        Schema::dropIfExists('projects');
    }
}
