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
        // gabung ke tabel menu makanans
        Schema::table('menu_makanans', function (Blueprint $table) {
            //nullable artinya gapapa klo ga diisi
            $table->string('foto')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menu_makanans', function (Blueprint $table) {
            //
            $table->dropColumn('foto');
        });
    }
};
