<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->integer('manufac_id')->default(-1)->index();
            $table->integer('user_id')->default(-1)->index();
            $table->string('additional_name')->nullable()->default('')->comment('If a car has a specific name tied to the model, BMW (manu) M3 (model) E46 GTR (additional name)');
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
        Schema::dropIfExists('car_models');
    }
};
