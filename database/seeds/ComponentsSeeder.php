<?php
    
    use App\Components;
    
    use Illuminate\Database\Seeder;
    
    class ComponentsSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            //
            Components::create([
                'name'            => '',
                'body'            => '',
                'page_id'         => 1,
                'order_component' => 1,
            ]);

        }
    }
