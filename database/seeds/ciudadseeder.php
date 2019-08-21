<?php

use Illuminate\Database\Seeder;
use App\Models\Ciudad;

class ciudadseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ciudad::create(['nombreciudad' => 'Atlantico']);
        Ciudad::create(['nombreciudad' => 'Bolívar']);
        Ciudad::create(['nombreciudad' => 'César']);
        Ciudad::create(['nombreciudad' => 'Cordoba']);
        Ciudad::create(['nombreciudad' => 'Guajira']);
        Ciudad::create(['nombreciudad' => 'Magdalena']);
        Ciudad::create(['nombreciudad' => 'San Andres']);
        Ciudad::create(['nombreciudad' => 'Sucre']);
        Ciudad::create(['nombreciudad' => 'Antioquia']);
        Ciudad::create(['nombreciudad' => 'Boyaca']);
        Ciudad::create(['nombreciudad' => 'Caldas']);
        Ciudad::create(['nombreciudad' => 'Cundinamarca']);
        Ciudad::create(['nombreciudad' => 'Distrito Capital']);
        Ciudad::create(['nombreciudad' => 'Huila']);
        Ciudad::create(['nombreciudad' => 'Norte Santander']);
        Ciudad::create(['nombreciudad' => 'Quindio']);
        Ciudad::create(['nombreciudad' => 'Risaralda']);
        Ciudad::create(['nombreciudad' => 'Santander']);
        Ciudad::create(['nombreciudad' => 'Tolima']);
        Ciudad::create(['nombreciudad' => 'Cauca']);
        Ciudad::create(['nombreciudad' => 'Choco']);
        Ciudad::create(['nombreciudad' => 'Nariño']);
        Ciudad::create(['nombreciudad' => 'Valle']);
        Ciudad::create(['nombreciudad' => 'Amazonas']);
        Ciudad::create(['nombreciudad' => 'Caqueta']);
        Ciudad::create(['nombreciudad' => 'Guainia']);
        Ciudad::create(['nombreciudad' => 'Putumayo']);
        Ciudad::create(['nombreciudad' => 'Vaupes']);
        Ciudad::create(['nombreciudad' => 'Arauca']);
        Ciudad::create(['nombreciudad' => 'Casanare']);
        Ciudad::create(['nombreciudad' => 'Meta']);

    }
}
