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
        Schema::create('workplaces', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('city');
            $table->string('street');
            $table->string('house')->nullable();
            $table->string('housing')->nullable();
            $table->string('apartment')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }


};
