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

        // 1️⃣ Crear la columna si no existe
        if (!Schema::hasColumn('productos_tabla', 'user_id')) {
            $table->foreignId('user_id')
                  ->after('cantidad')
                  ->constrained('users')
                  ->cascadeOnDelete();
        }

    });
}

public function down(): void
{
    Schema::table('productos_tabla', function (Blueprint $table) {
        $table->dropForeign(['user_id']);
        $table->dropColumn('user_id');
    });
}
};
