<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('props', function (Blueprint $table) {
            $table->id();
            $table->double('PREDICTION');
            $table->string('OverallQual', 100);
            $table->string('Neighborhood', 100);
            $table->integer('GrLivArea');
            $table->integer('GarageCars');
            $table->string('BsmtQual', 100);
            $table->string('ExterQual', 100);
            $table->integer('GarageArea');
            $table->string('KitchenQual', 100);
            $table->integer('YearBuilt');
            $table->integer('TotalBsmtSF');
            $table->integer('FirstFlrSF');
            $table->string('GarageFinish', 100);
            $table->integer('FullBath');
            $table->integer('YearRemodAdd');
            $table->string('GarageType', 100);
            $table->string('FireplaceQu', 100);
            $table->string('Foundation', 100);
            $table->string('MSSubClass', 100);
            $table->integer('TotRmsAbvGrd');
            $table->integer('Fireplaces');
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('project_id')
            ->constrained('projects')
            ->onUpdate('cascade')
            ->onDelete('cascade');
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
        Schema::dropIfExists('props');
    }
}
