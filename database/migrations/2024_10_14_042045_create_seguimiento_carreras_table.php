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
        Schema::create('seguimiento_carreras', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_carrera')->constrained('carreras');
            $table->foreignId('id_jornada')->constrained('jornadas');
            $table->foreignId('id_modalidad')->constrained('modalidades');
            $table->foreignId('id_regional')->constrained('regionales');
            $table->foreignId('id_coordinador')->constrained('docentes');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seguimiento_carreras');
    }
};
