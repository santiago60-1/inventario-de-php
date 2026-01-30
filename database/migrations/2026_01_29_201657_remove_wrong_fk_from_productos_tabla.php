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
        Schema::table('productos_tabla', function (Blueprint $table) {

            // Eliminar la FK incorrecta (id -> users.id)
            $table->dropForeign('user_id');
        });
    }

    public function down(): void
    {
        // ❌ No se restaura porque nunca debió existir
    }

};
