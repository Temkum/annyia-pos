<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_code');
            $table->decimal('price');
            $table->decimal('total')->nullable();
            $table->string('full_name');
            $table->string('mobile');
            $table->date('due_date');
            $table->decimal('advance_paid');
            $table->decimal('balance');
            $table->string('address');
            $table->enum(
                'status',
                ['ordered', 'delivered', 'processing', 'cancelled']
            )->default('ordered');
            $table->boolean('paid_total')->default(false);
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}