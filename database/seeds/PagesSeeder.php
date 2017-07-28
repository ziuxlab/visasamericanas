<?php
	
	use App\Page;
	use Illuminate\Database\Seeder;
	
	class PagesSeeder extends Seeder {
		/**
		 * Run the database seeds.
		 *
		 * @return void
		 */
		public function run() {
			//
			Page::create( [
				'slug_url'         => '',
				'name'             => 'home',
				'tittle'           => 'titulo del home',
				'body'             => '{home}',
				'menu_order'       => 1,
				'tipo'             => 1,
				'meta_description' => 'meta descripcion maximo 250 caracteres.',
				'keywords'         => 'palabras clave separadas con ","',
			
			] );

			
			Page::create( [
				'slug_url'   => 'nosotros',
				'name'       => 'Quiénes Somos',
				'tittle'     => 'Quiénes Somos',
				'body'       => '<div class="bg-white">
<div class="content content-boxed"><div class="row"><div class="col-md-8 col-md-offset-2 col-sm-12 text-center"><div class="block"><div class="block-content"><p class="text-justify"><strong>Travel<span class="text-primary">on</span>go</strong> Colombia es una empresa privada localizada en la ciudad de Armenia, Colombia (Departamento del Quind&iacute;o), dedicada a mostrarle al mundo esta regi&oacute;n cafetera de hermosas monta&ntilde;as, con su clima semi- tropical, inmensa biodiversidad, infraestructura tur&iacute;stica y una poblaci&oacute;n latina amable.</p><p class="text-justify"><strong> Travel<span class="text-primary">on</span>go</strong> Colombia fue fundada por una colombiana de Armenia Quind&iacute;o, graduada como Profesional en Comercio Internacional y un m&eacute;dico empresario Estadounidense quien en el a&ntilde;o 2016 vino por primera vez a Armenia Quind&iacute;o, se enamor&oacute; de esta tierra y su gente y ahora desea que otros viajeros internacionales disfruten de esta extraordinaria riqueza natural y cultural.</p></div></div></div></div></div></div><div class="flex row"><div class="bg-primary col-sm-6 content text-center"><div class="block block-transparent"><h2>Misi&oacute;n</h2><div class="block-content"><p class="text-justify">Crear experiencias de viajes placenteras y &uacute;nicas, especialmente a viajeros extranjeros, atray&eacute;ndolos a un hermoso escenario, a una cultura vibrante y a sitios emblem&aacute;ticos e hist&oacute;ricos del eje cafetero colombiano.</p></div></div></div><div class="bg-secondary col-sm-6 content text-center text-white"><div class="block block-transparent"><h2>Visi&oacute;n</h2><div class="block-content"><p class="text-justify">Consolidarnos como una empresa con liderazgo internacional la cual provea servicios tur&iacute;sticos con los m&aacute;s altos est&aacute;ndares de calidad a precios competitivos, y con un alto grado de responsabilidad social y ambiental.</p></div></div></div></div><div class="content-boxed flex"><div class="col-lg-10 col-md-9 col-sm-7 content flex-center"><div class="block block-transparent"><div class="text-center"><h2>Los Creadores</h2></div><div class="block-content"><p class="text-justify">Liliana Betancurt Castañeda nació y fue educada en Armenia Colombia y Malasia, fluída en Inglés y con su Español nativo, se asoció con el Doctor O ́Connell para traer lo mejor que el centro de Colombia tiene para ofrecer. Ella entiende el concepto de 
“Planear viajes todo incluído”para visitantes a este región montañosa ligeramente modernizad. Los tours pueden ser dirigidos a educación histórica o científica, recreación, clases dirigidas o una combinación de todo.</p><p>Dr O ́Connell, Estadounidense, médico retirado y viajero frecuente, ha identificado las ausencias de las agencias de viajes, especialmente en Latinoamérica muchas incertidumbres, con servicios incompletos y la persistente barrera del lenguaje.</p><p>Juntos, <strong> Travel<span class="text-primary">on</span>go</strong>  Colombia reconoce el desbalance entre lo que los angloparlantes quieren y las que otras agencias usualmente les ofrecen.  
A través de una lista de chequeo, con hospedajes deseados, diferentes actividades, y una gama de servicios a la medida,  <strong> Travel<span class="text-primary">on</span>go</strong> Colombia puede hacer todo posible.  Finalmente, somos un verdadero y completo coordinador de vacaciones.</p></div></div></div><div class="col-lg-2 col-md-3 col-sm-5 remove-padding text-white-op"><div class="col-sm-12 col-xs-6 fx-img-zoom-in img-container remove-padding"><img alt="travelogo team" class="img-responsive" src="https://travelongocolombia.com/img/avatars/liliana_photo.jpg" /><div class="img-options-content-about"><div class="bg-black-dark-op content-mini content-mini-full push-20-t"><h5>Liliana Betancurt Casta&ntilde;eda</h5></div></div></div><div class="col-sm-12 col-xs-6 fx-img-zoom-in img-container remove-padding"><img alt="travelongo colombia team" class="img-responsive" src="https://travelongocolombia.com/img/avatars/mike_photo.jpg" /><div class="img-options-content-about text-left"><div class="bg-black-dark-op content-mini content-mini-full"><h5>Dr O&#39;Connell</h5></div></div></div></div></div>',
				'menu_order' => 7,
				'tipo'       => 0,
			] );
			
			Page::create( [

				'slug_url'   => 'contactanos',
				'name'       => 'Contáctanos',
				'tittle'     => 'Contáctanos',
				'body'       => '{contact_us}',
				'menu'       => 1,
				'menu_order' => 9,
				'tipo'       => 1,

			] );

		}
	}
