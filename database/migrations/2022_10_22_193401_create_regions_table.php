<?php

use App\Models\Region;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
        });

        $this->insertDefaultValues();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }

    public function insertDefaultValues(){

        Region::create([
            'nombre' => 'Antioquia'
        ]);

        Region::create([
            'nombre' => 'San Andres'
        ]);

        Region::create([
            'nombre' => 'Bolivar'
        ]);

        Region::create([
            'nombre' => 'Quindio'
        ]);

        Region::create([
            'nombre' => 'Cundinamarca'
        ]);

        Region::create([
            'nombre' => 'Magdalena'
        ]);

        Region::create([
            'nombre' => 'Guajira'
        ]);

        Region::create([
            'nombre' => 'Choco'
        ]);
    }
}
