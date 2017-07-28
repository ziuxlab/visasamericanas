<?php
    
    use App\Config;
    use Illuminate\Database\Seeder;
    
    class SettingsTable extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            Config::create([
                'tittle'           => 'titulo de la pagina | otra informacion',
                'meta_description' => 'meta descripcion',
                'keywords'         => 'palabras clave separadas por ","',
                'email'            => 'info@web.com',
                'phone'            => '+57-314-553-5632',
                'address'          => 'Direccion de la empresa',
            ]);
        }
    }
