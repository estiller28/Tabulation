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
        Schema::create('update_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dogs_id')->nullable()->constrained()->nullOnDelete();
            $table->string('id_number')->nullable();
            $table->string('dog_name')->nullable();
            $table->string('owner_name')->nullable();
            $table->string('status')->nullable();
            $table->string('reason')->nullable();
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
        Schema::dropIfExists('update_requests');
    }
};
