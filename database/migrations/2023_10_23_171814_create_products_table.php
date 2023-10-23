<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', static function (Blueprint $table): void {
            $table->id();
            $table->string('name');
            $table->longText('description');
            $table->double('price');
            $table->unsignedMediumInteger('amount')->default(0);
            $table->timestamps();
        });
    }
};
