<?php

use Illuminate\Database\Seeder;
use App\Classification;

class ClassificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Classification = array (
            [

                'name' => 'Cámaras',
                'slug' => 'camaras'
            ],
            [

                'name' => 'Óptica',
                'slug' => 'optica'
            ],
            [

                'name' => 'Accesorios y Filtros',
                'slug' => 'accesorios-y-filtros'
            ],
            [

                'name' => 'Iluminación',
                'slug' => 'iluminacion'
            ],

            [

                'name' => 'Móviles y Plantas',
                'slug' => 'moviles-y-plantas'
            ],

            [

                'name' => 'Grúas Dollies Cabezas Remotas',
                'slug' => 'gruas-dollies-cabezas-remotas'
            ],

            [

                'name' => 'Motion Control',
                'slug' => 'motion-control'
            ],

            [

                'name' => 'Personal',
                'slug' => 'personal'
            ]
        );

        Classification::insert($Classification);
    }
}
