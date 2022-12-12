<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // increment big integer
            $table->string('name'); // nama product ex: telkomsel, mobile legend
            $table->integer('status')->default(0); //0 = Non-Aktif, 1 = Aktiv
            $table->string('type')->default('game');
            $table->string('img')->nullable();
            $table->string('code')->unique(); //ex: tsel, mlbb, ff
            $table->string('slug')->unique(); //
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
        Schema::dropIfExists('products');
    }
}
