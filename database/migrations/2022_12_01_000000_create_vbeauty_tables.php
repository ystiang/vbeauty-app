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
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date')->nullable();
            $table->string('name');
            $table->string('card');
            $table->string('treatment');
            $table->string('productcourse');
            $table->string('product');
            $table->string('course');
            $table->string('service');
            $table->decimal('commission', 10, 2);
            $table->timestamps();
        });
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_code');
            $table->string('package_name');
            $table->string('treatment');
            $table->string('package_type');
            $table->string('commission');            
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
        Schema::dropIfExists('commissions');
        Schema::dropIfExists('packages');
    }
};
