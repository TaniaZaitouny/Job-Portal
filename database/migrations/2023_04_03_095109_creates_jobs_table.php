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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id')->unsigned()->index();
            $table->string('title');
            $table->set('category', ['Healthcare', 'Commputer and Information Technology', 'Real Estate', 'Retail', 'Education', 'Entertaiment and Sports', 'Legal', 'Transportation', 'Social Services', 'Sales and Marketing', 'Management', 'Businness and Finance', 'Architecture and Engineering', 'Arts and Design', 'Construction']);
            $table->string('description');
            $table->string('requirements');
            $table->set('workspace', ['on-site', 'hybrid', 'remote']);
            $table->set('employment', ['full-time', 'part-time', 'freelance']);
            $table->string('location');
            $table->float('salary')->nullable();
            $table->float('bid')->nullable();
            $table->foreign('company_id')->references('id')->on('companies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
