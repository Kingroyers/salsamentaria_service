<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detalle_venta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('venta_id')->constrained('ventas');
            $table->foreignId('producto_id')->constrained('productos');
            // Se guarda el nombre en el momento de la venta
            // por si el producto cambia de nombre después
            $table->string('nombre_producto', 100);
            $table->decimal('precio_unitario', 10, 2);
            $table->integer('cantidad');
            $table->decimal('descuento_item', 10, 2)->default(0);
            $table->decimal('subtotal', 10, 2);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_venta');
    }
};
