<?php

use App\Models\Business;
use App\Models\Category;
use App\Models\Municipality;
use App\Models\Service;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $municipality = Municipality::create([
            'user_id' => 1,
            'name' => 'Tepic'
        ]);

        $category = Category::create([
            'user_id' => 1,
            'name' => 'Meseros'
        ]);

        $business = Business::create([
            'name' => 'GILBERTO GASTELUM',
            'description' => 'Ofrecemos un servicio de meseros altamente calificado, diseñado para hacer de tu evento una experiencia inolvidable. Nuestro equipo de meseros profesionales se encarga de cada detalle, desde la recepción de los invitados hasta el servicio de alimentos y bebidas, garantizando una atención personalizada y cordial.',
            'sort_description' => 'Servicio de meseros',
            'phone' => '31112230',
            'email' => 'gilberto@gastelum.com',
            'address' => 'Colonia 2 de agosto Genaro Vazques #123 entre tierra y liberdad y emiliano zapata',
            'lat' => 0,
            'long' => 0,
            'price' => 1500,
            'municipality_id' => $municipality->id,
            'category_id' => $category->id,
        ]);
        
        Service::create([
            'business_id' => $business->id,
            'user_id' => 1,
            'experience' => "Valet parking",
            'skills' => 'DIFERENTES IDIOMAS',
            'additional_waiters' => 'No',
            'hour_work' => 5,
            'is_waiter' => 1,
            'extras' => 250,
            'price' => 1500,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
