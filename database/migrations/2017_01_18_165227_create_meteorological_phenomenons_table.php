<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeteorologicalPhenomenonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meteorological_phenomenons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->enum('type',['lluvia', 'viento','nieve','tormenta eléctrica','inundación','sequías','heladas']);
            $table->enum('wind_direction',[
                'NNE?Norte Noreste?22.50',
                'NE?Noreste?45.00',
                'ENE?Este Nordeste?67.50',
                'E?Este?90.00',
                'ESE?Este Sudeste?112.50',
                'SE?Sudeste?135.00',
                'SSE?Sur Sudeste?157.00',
                'S?Sur?180.00',
                'SSW?Sur Sudoeste?202.50',
                'SW?Sudoeste?225.50',
                'WSW?Oeste Sudeste?247.50',
                'W?Oeste?270.00',
                'WNW?Oeste Noroeste?292.50',
                'NW?Noroeste?315.00',
                'NNW?Norte Noroeste?337.50',
                'N?Norte?360.00'
            ]);        
            $table->enum('sea_state',[
                '0?Sin olas?Sin oleaje?Mar llana o en calma?La superficie del mar está lisa como un espejo',
                '1?0 a 0 10?Muy bajo (olas cortas y bajas) Mar rizada?El mar comienza a rizarse por partes',
                '2?0 10 a 0 5?Bajo (Olas largas y bajas)?Marejadilla?Se forman olas cortas pero bien marcadas  comienzan a romper las crestas formando una espuma que no es blanca sino de aspecto vidroso (ovejas) ',
                '3?0 5 a 1 25?Ligero (Olas cortas y moderadas)?Marejada?Se forman olas largas con crestas de espuma blanca bien caracterizadas El mar de viento está bien definido y se distingue fácilmente del mar de fondo que pudiera existir Al romper las olas producen un murmullo que se desvanece rápidamente',
                '4?1 25 a 2 5?Moderado (Olas medias y moderadas)?Fuerte marejada?Se forman olas más largas  con crestas de espuma por todas partes  El mar rompe con un murmullo constante ',
                '5?2 5 a 4?Grueso moderado (Olas largas y moderadas)?Gruesa?Comienzan a formarse olas altas  las zonas de espuma blanca cubren una gran superficie  Al romper el mar produce un ruido sordo como de arrojar cosas ',
                '6?4 a 6?Grueso (Olas cortas y altas)?Muy gruesa?El mar se alborota  La espuma blanca que se forma al romper las crestas comienza a disponerse en bandas en la dirección del viento ',
                '7?6 a 9?Alto (olas medias y altas)?Arbolada?Aumentan notablemente la altura y la longitud de las olas y de sus crestas  La espuma se dispone en bandas estrechas en la dirección del viento ',
                '8?9 a 14?Muy alto (Olas largas y altas)?Montañosa?Se ven olas altas con largas crestas que caen como cascadas  las grandes superficies cubiertas de espuma se disponen rápidamente en bandas blancas en la dirección del viento  el mar alrededor de ellas adquiere un aspecto blanquecino ',
                '9?Más de 14?Confuso (Olas de longitud y altura indefinible)?Enorme?Las olas se hacen tan altas que a veces los barcos desaparecen de la vista en sus senos  El mar está cubierto de espuma blanca dispuesta en bandas en la dirección del viento y el ruido que se produce es fuerte y ensordecedor  El aire está tan lleno de salpicaduras  que la visibilidad de los objetos distantes se hace imposible '
            ]);
            $table->enum('cloud_type',[
                'Ci?Cirrus',
                'Cc?Cirrocumulus',
                'Cs?Cirrostratus',
                'As?Altostratus',
                'Ac?Altocumulus',
                'St?Stratus',
                'Sc?Stratocumulus',
                'Ns?Nimbostratus',
                'Cu?Cumulus',
                'Cb?Cumulonimbus'
            ]);
            $table->enum('wind_velocity',[
                '0?0 a 1?< 1?Calma?Despejado?Calma  el humo asciende verticalmente',
                '1?2 a 5?1 a 3?Ventolina?Pequeñas olas  pero sin espuma?El humo indica la dirección del viento',
                '2?6 a 11?4 a 6?Flojito (Brisa muy débil)?Crestas de apariencia vítrea  sin romper?Se caen las hojas de los árboles  empiezan a moverse los molinos de los campos',
                '3?12 a 19?7 a 10?Flojo (Brisa Ligera)?Pequeñas olas  crestas rompientes ?Se agitan las hojas  ondulan las banderas',
                '4?20 a 28?11 a 16?Bonancible (Brisa moderada)?Borreguillos numerosos  olas cada vez más largas?Se levanta polvo y papeles  se agitan las copas de los árboles',
                '5?29 a 38?17 a 21?Fresquito (Brisa fresca)?Olas medianas y alargadas  borreguillos muy abundantes?Pequeños movimientos de los árboles  superficie de los lagos ondulada',
                '6?39 a 49?22 a 27?Fresco (Brisa fuerte)?Comienzan a formarse olas grandes  crestas rompientes  espuma?Se mueven las ramas de los árboles  dificultad para mantener abierto el paraguas',
                '7?50 a 61?28 a 33?Frescachón (Viento fuerte)?Mar gruesa  con espuma arrastrada en dirección del viento?Se mueven los árboles grandes  dificultad para caminar contra el viento',
                '8?62 a 74?34 a 40?Temporal (Viento duro)?Grandes olas rompientes  franjas de espuma?Se quiebran las copas de los árboles  circulación de personas muy difícil  los vehículos se mueven por sí mismos ',
                '9?75 a 88?41 a 47?Temporal fuerte (Muy duro)?Olas muy grandes  rompientes  Visibilidad mermada?Daños en árboles  imposible caminar con normalidad  Se empiezan a dañar las construcciones  Arrastre de vehículos ',
                '10?89 a 102?48 a 55?Temporal duro(Temporal)?Olas muy gruesas con crestas empenachadas  Superficie del mar blanca ?Árboles arrancados  daños en la estructura de las construcciones  Daños mayores en objetos a la intemperie ',
                '11?103 a 117?56 a 63?Temporal muy duro(Borrasca)?Olas excepcionalmente grandes  mar completamente blanca  visibilidad muy reducida?Destrucción en todas partes  lluvias muy intensas  inundaciones muy altas  Voladura de personas y de otros muchos objetos ',
                '12?118?64?Temporal huracanado(Huracán)?Olas excepcionalmente grandes  mar blanca  visibilidad nula?Voladura de vehículos  árboles  casas  techos y personas  Puede generar un huracáno tifón'
            ]);
            $table->float('temperature');
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
        Schema::drop('meteorological_phenomenons');
    }
}
