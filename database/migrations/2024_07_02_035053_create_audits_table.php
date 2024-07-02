<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('audits', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('collection_id');
            $table->text('descripcion'); // Campo para los nombres de los productos
            $table->double('precio');
            $table->string('accion');
            $table->timestamps();

            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
        });

        DB::unprepared('
            CREATE TRIGGER after_collection_order_insert AFTER INSERT ON collection_order
            FOR EACH ROW
            BEGIN
                DECLARE productos TEXT;

                SELECT GROUP_CONCAT(p.nombre SEPARATOR ", ")
                INTO productos
                FROM orders o
                JOIN product_order po ON o.id = po.order_id
                JOIN products p ON po.product_id = p.id
                WHERE o.id = NEW.order_id;

                INSERT INTO audits (collection_id, descripcion, precio, accion, created_at, updated_at)
                VALUES (NEW.collection_id, productos, (SELECT monto_total FROM collections WHERE id = NEW.collection_id), "insert", NOW(), NOW());
            END
        ');

        DB::unprepared('
            CREATE TRIGGER after_collection_order_update AFTER UPDATE ON collection_order
            FOR EACH ROW
            BEGIN
                DECLARE productos TEXT;

                SELECT GROUP_CONCAT(p.nombre SEPARATOR ", ")
                INTO productos
                FROM orders o
                JOIN product_order po ON o.id = po.order_id
                JOIN products p ON po.product_id = p.id
                WHERE o.id = NEW.order_id;

                INSERT INTO audits (collection_id, descripcion, precio, accion, created_at, updated_at)
                VALUES (NEW.collection_id, productos, (SELECT monto_total FROM collections WHERE id = NEW.collection_id), "update", NOW(), NOW());
            END
        ');

        DB::unprepared('
            CREATE TRIGGER after_collection_order_delete AFTER DELETE ON collection_order
            FOR EACH ROW
            BEGIN
                DECLARE productos TEXT;

                SELECT GROUP_CONCAT(p.nombre SEPARATOR ", ")
                INTO productos
                FROM orders o
                JOIN product_order po ON o.id = po.order_id
                JOIN products p ON po.product_id = p.id
                WHERE o.id = OLD.order_id;

                INSERT INTO audits (collection_id, descripcion, precio, accion, created_at, updated_at)
                VALUES (OLD.collection_id, productos, (SELECT monto_total FROM collections WHERE id = OLD.collection_id), "delete", NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_collection_order_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS after_collection_order_update');
        DB::unprepared('DROP TRIGGER IF EXISTS after_collection_order_delete');
        Schema::dropIfExists('audits');
    }
};
