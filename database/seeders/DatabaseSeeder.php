<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Medellín: parapente en los Andes colombianos',
                'url' => 'Medellín--parapente-en-los-Andes-colombianos',
                'url_img' => 'storage/img/noticias/f1NfmtIIs9HBmNAzpdzGMfzxbQWOpIq6LLgeh0Le.jpg',
                'name_img' => 'f1NfmtIIs9HBmNAzpdzGMfzxbQWOpIq6LLgeh0Le',
                'imagen' => 'f1NfmtIIs9HBmNAzpdzGMfzxbQWOpIq6LLgeh0Le.jpg',
                'resumen' => 'Disfruta de la perspectiva aérea de las montañas majestuosas que rod',
                'texto' => 'Disfruta de la perspectiva aérea de las montañas majestuosas que rodean la ciudad de Medellín con una excursión en parapente.

                ¡Daero mi piloto fue increíble! Este fue el punto culminante de mi viaje a Medellín. Reservé esta actividad para tres de mis amigos y a todos nos encantó. Tenga en cuenta que Yku debe escalar muchos escalones para llegar al área de lanzamiento. Es necesario arreglar los escalones e instalar la barandilla. Eso fue más desafiante que el parapente real. Todavía le doy 5 estrellas',
                'importancia' => 'pri',
                'region' => 'Antioquia',
                'urlRegion' => 'img/region/Antioquia.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Cartagena: vuelo de paratriking desde la playa',
                'url' => 'Cartagena--vuelo-de-paratriking-desde-la-playa',
                'url_img' => 'storage/img/noticias/x5SHjR8R5i0fmYxZ2UlyTTkBgliFkMC2V4LOFYMu.jpg',
                'name_img' => 'x5SHjR8R5i0fmYxZ2UlyTTkBgliFkMC2V4LOFYMu',
                'imagen' => 'x5SHjR8R5i0fmYxZ2UlyTTkBgliFkMC2V4LOFYMu.jpg',
                'resumen' => 'Siente la adrenalina mientras te elevas sobre las playas de Cartagena ',
                'texto' => 'Siente la adrenalina mientras te elevas sobre las playas de Cartagena con un vuelo en paratrike. Disfruta de una experiencia fantástica con un piloto profesional mientras admiras la belleza de la costa caribeña. Elige entre vuelos de 10 o 15 minutos.',
                'importancia' => 'pri',
                'region' => 'San Andres',
                'urlRegion' => 'img/region/San_Andres.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Desde Medellín: Guatapé y El Peñol, barco, desayuno y comida',
                'url' => 'Desde-Medellín--Guatapé-y-El-Peñol--barco--desayuno-y-comida',
                'url_img' => 'storage/img/noticias/Ll1WdVOJZWqqdUTNHs9zFf71FnGMgyI9IsLr5goH.jpg',
                'name_img' => 'Ll1WdVOJZWqqdUTNHs9zFf71FnGMgyI9IsLr5goH',
                'imagen' => 'Ll1WdVOJZWqqdUTNHs9zFf71FnGMgyI9IsLr5goH.jpg',
                'resumen' => 'Visita la ciudad de Guatapé, situada a 1 h y 30 min de Medellín y de',
                'texto' => 'Visita la ciudad de Guatapé, situada a 1 h y 30 min de Medellín y descubre un mundo de color entre sus calles adornadas con azulejos. Embarca en un relajante crucero y disfruta de un almuerzo tradicional colombiano.',
                'importancia' => 'sec',
                'region' => 'Antioquia',
                'urlRegion' => 'img/region/Antioquia.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Cartagena: volcán del Totumo y baño de lodo',
                'url' => 'Cartagena--volcán-del-Totumo-y-baño-de-lodo',
                'url_img' => 'storage/img/noticias/QP8zTgYZs86cNL20hoDR5975UaSRqfBnBXlzSKlP.jpg',
                'name_img' => 'QP8zTgYZs86cNL20hoDR5975UaSRqfBnBXlzSKlP',
                'imagen' => 'QP8zTgYZs86cNL20hoDR5975UaSRqfBnBXlzSKlP.jpg',
                'resumen' => 'Accede a uno de los volcanes más pequeños del mundo y disfruta de un',
                'texto' => 'Accede a uno de los volcanes más pequeños del mundo y disfruta de un relajante baño en lodo caliente. Disfruta las propiedades curativas del lodo rico en minerales mientras te diviertes en el volcán del Totumo.',
                'importancia' => 'sec',
                'region' => 'Bolivar',
                'urlRegion' => 'img/region/Bolivar.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Desde Leticia: Tour de 2, 3, 4 ó 5 días de Aventura por el Amazonas',
                'url' => 'Desde-Leticia--Tour-de-2--3--4-ó-5-días-de-Aventura-por-el-Amazonas',
                'url_img' => 'storage/img/noticias/JYVXh3ejUDpZEsNFGUnJH9nonfZluFDdgfZabzIl.jpg',
                'name_img' => 'JYVXh3ejUDpZEsNFGUnJH9nonfZluFDdgfZabzIl',
                'imagen' => 'JYVXh3ejUDpZEsNFGUnJH9nonfZluFDdgfZabzIl.jpg',
                'resumen' => 'Descubre la majestuosidad del Amazonas en una aventura de 2, 3, 4 ó 5',
                'texto' => 'Descubre la majestuosidad del Amazonas en una aventura de 2, 3, 4 ó 5 días. Desarrolla una conexión con la naturaleza y los lugareños mientras exploras la Amazonia colombiana con una experiencia guiada.',
                'importancia' => 'sec',
                'region' => 'Magdalena',
                'urlRegion' => 'img/region/Magdalena.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Choco:Nuquí y sus hermosas playas con grandiosas visitas de ballenas',
                'url' => 'Choco-Nuquí-y-sus-hermosas-playas-con-grandiosas-visitas-de-ballenas',
                'url_img' => 'storage/img/noticias/JbqhKZcqmBWrCpvFrC0TwMxHvv0QsXMgtkwY5JmG.jpg',
                'name_img' => 'JbqhKZcqmBWrCpvFrC0TwMxHvv0QsXMgtkwY5JmG',
                'imagen' => 'JbqhKZcqmBWrCpvFrC0TwMxHvv0QsXMgtkwY5JmG.jpg',
                'resumen' => 'Nuquí es un destino exótico ubicado en la costa Pacífica colombiana',
                'texto' => 'Nuquí es un destino exótico ubicado en la costa Pacífica colombiana, ideal para los amantes de la naturaleza y de la tranquilidad de escenarios sorprendentes. Es un lugar que brilla por la riqueza natural de flora y fauna, además porque ofrece un ambiente idóneo para desconectarse de la vida citadina y entregarse al descanso.',
                'importancia' => 'sec',
                'region' => 'Choco',
                'urlRegion' => 'img/region/Choco.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Desde Pereira/Salento: Senderismo guiado por el Valle del Cocora',
                'url' => 'Desde-Pereira-Salento--Senderismo-guiado-por-el-Valle-del-Cocora',
                'url_img' => 'storage/img/noticias/neQG4mVN2E3uSTGiJu9AW3akPaEwDzQbIGyPvJkd.jpg',
                'name_img' => 'neQG4mVN2E3uSTGiJu9AW3akPaEwDzQbIGyPvJkd',
                'imagen' => 'neQG4mVN2E3uSTGiJu9AW3akPaEwDzQbIGyPvJkd.jpg',
                'resumen' => 'Sumérgete en el sueño de un amante del café en una excursión guiad',
                'texto' => 'Sumérgete en el sueño de un amante del café en una excursión guiada por el Valle del Cocora. Explora parte del Triángulo del Café y experimenta la belleza natural del valle.',
                'importancia' => 'sec',
                'region' => 'Quindio',
                'urlRegion' => 'img/region/Quindio.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);

        DB::table('noticias')->insert(
            [
                'idUser' => '1',
                'titulo' => 'Bogotá: tour guiado de 5 h por un cafetal',
                'url' => 'Bogotá--tour-guiado-de-5-h-por-un-cafetal',
                'url_img' => 'storage/img/noticias/toBUtLIHFTlUEDxCJ4KP4ni2OXUZ1yeZ3zAmT9r6.jpg',
                'name_img' => 'toBUtLIHFTlUEDxCJ4KP4ni2OXUZ1yeZ3zAmT9r6',
                'imagen' => 'toBUtLIHFTlUEDxCJ4KP4ni2OXUZ1yeZ3zAmT9r6.jpg',
                'resumen' => 'Descubre en este tour cómo es el día de un caficultor en la zona rur',
                'texto' => 'Descubre en este tour cómo es el día de un caficultor en la zona rural de Bogotá. Comienza el día con un desayuno tradicional y dirígete a la granja. Experimenta paso a paso el trabajo diario de un caficultor y termina el tour con un almuerzo local.',
                'importancia' => 'sec',
                'region' => 'Cundinamarca',
                'urlRegion' => 'img/region/Cundinamarca.jpg',
                'fecha' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        
    }
}
