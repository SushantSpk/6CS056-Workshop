
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // Create the courses table
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {

            // Unique ID for each course
            $table->id();

            // Name of the course
            $table->string('name');

            // Course description
            $table->string('description');

            // Duration of course in weeks
            $table->integer('duration');

            // Course fee
            $table->decimal('fee', 10, 2);

            // Course difficulty level
            $table->enum('difficulty', ['Easy', 'Medium', 'Hard']);

            // Whether the course is currently active
            $table->boolean('is_active')->default(true);

            // Created and updated timestamps
            $table->timestamps();
        });
    }

    // Delete the courses table if migration is rolled back
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
