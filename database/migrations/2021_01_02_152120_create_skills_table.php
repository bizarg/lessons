<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class CreateSkillsTable
 */
class CreateSkillsTable extends Migration
{
    /**
     * @return void
     */
    public function up(): void
    {
        Schema::create('skills', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
}
