<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->morphs('issuable');
            $table->string('title');
            $table->string('type')->default('issue');
            $table->text('description')->nullable();
            $table->string('severity')->default('medium');
            $table->string('status')->default('pending');
            $table->nullableMorphs('assignee');
            $table->morphs('creator');
            $table->json('meta')->nullable()->comment('Additional info like geo-coordinates');
            $table->timestamp('resolved_at')->nullable();
            $table->timestamp('closed_at')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('issues');
    }
};
