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
                'NNE?Norte_Noreste?22',
                'NE?Noreste?45',
                'ENE?Este_Nordeste',
                'E?Este?90.00',
                'ESE?Este_Sudeste?112',
                'SE?Sudeste?135',
                'SSE?Sur_Sudeste?157',
                'S?Sur?180',
                'SSW?Sur_Sudoeste?202',
                'SW?Sudoeste?225',
                'WSW?Oeste_Sudeste?247',
                'W?Oeste?270',
                'WNW?Oeste_Noroeste?292',
                'NW?Noroeste?315',
                'NNW?Norte_Noroeste?337',
                'N?Norte?360'
            ]);        
            $table->enum('sea_state',[
                '0?Sin_olas?Sin_oleaje?Mar_llana_o_en_calma?La_superficie_del_mar_está_lisa_como_un_espejo',
                '1?0_a_0_10?Muy_bajo_(olas_cortas_y_bajas)_Mar_rizada?El_mar_comienza_a_rizarse_por_partes',
                '2?0_10_a_0_5?Bajo_(Olas_largas_y_bajas)?Marejadilla?Se_forman_olas_cortas_pero_bien_marcadas_comienzan_a_romper_las_crestas_formando_una_espuma_que_no_es_blanca_sino_de_aspecto_vidroso_(ovejas)',
                '3?0_5_a_1_25?Ligero_(Olas_cortas_y_moderadas)?Marejada?Se_forman_olas_largas_con_crestas_de_espuma_blanca_bien_caracterizadas_El_mar_de_viento_está_bien_definido_y_se_distingue_fácilmente_del_mar_de_fondo_que_pudiera_existir_Al_romper_las_olas_producen_un_murmullo_que_se_desvanece_rápidamente',
                '4?1_25_a_2_5?Moderado_(Olas_medias_y_moderadas)?Fuerte_marejada?Se_forman_olas_más_largas_con_crestas_de_espuma_por_todas_partes_El_mar_rompe_con_un_murmullo_constante',
                '5?2_5_a_4?Grueso_moderado_(Olas_largas_y_moderadas)?Gruesa?Comienzan_a_formarse_olas_altas_las_zonas_de_espuma_blanca_cubren_una_gran_superficie_Al_romper_el_mar_produce_un_ruido_sordo_como_de_arrojar_cosas',
                '6?4_a_6?Grueso_(Olas_cortas_y_altas)?Muy_gruesa?El_mar_se_alborota_La_espuma_blanca_que_se_forma_al_romper_las_crestas_comienza_a_disponerse_en_bandas_en_la_dirección_del_viento',
                '7?6_a_9?Alto_(olas_medias_y_altas)?Arbolada?Aumentan_notablemente_la_altura_y_la_longitud_de_las_olas_y_de_sus_crestas_La_espuma_se_dispone_en_bandas_estrechas_en_la_dirección_del_viento',
                '8?9_a_14?Muy_alto_(Olas_largas_y_altas)?Montañosa?Se_ven_olas_altas_con_largas_crestas_que_caen_como_cascadas_las_grandes_superficies_cubiertas_de_espuma_se_disponen_rápidamente_en_bandas_blancas_en_la_dirección_del_viento_el_mar_alrededor_de_ellas_adquiere_un_aspecto_blanquecino',
                '9?Más_de_14?Confuso_(Olas_de_longitud_y_altura_indefinible)?Enorme?Las_olas_se_hacen_tan_altas_que_a_veces_los_barcos_desaparecen_de_la_vista_en_sus_senos_El_mar_está_cubierto_de_espuma_blanca_dispuesta_en_bandas_en_la_dirección_del_viento_y_el_ruido_que_se_produce_es_fuerte_y_ensordecedor_El_aire_está_tan_lleno_de_salpicaduras_que_la_visibilidad_de_los_objetos_distantes_se_hace_imposible'
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
                '0?0_a_1?<_1?Calma?Despejado?Calma_el_humo_asciende_verticalmente',
                '1?2_a_5?1_a_3?Ventolina?Pequeñas_olas_pero_sin_espuma?El_humo_indica_la_dirección_del_viento',
                '2?6_a_11?4_a_6?Flojito_(Brisa_muy_débil)?Crestas_de_apariencia_vítrea_sin_romper?Se_caen_las_hojas_de_los_árboles_empiezan_a_moverse_los_molinos_de_los_campos',
                '3?12_a_19?7_a_10?Flojo_(Brisa_Ligera)?Pequeñas_olas_crestas_rompientes_?Se_agitan_las_hojas_ondulan_las_banderas',
                '4?20_a_28?11_a_16?Bonancible_(Brisa_moderada)?Borreguillos_numerosos_olas_cada_vez_más_largas?Se_levanta_polvo_y_papeles_se_agitan_las_copas_de_los_árboles',
                '5?29_a_38?17_a_21?Fresquito_(Brisa_fresca)?Olas_medianas_y_alargadas_borreguillos_muy_abundantes?Pequeños_movimientos_de_los_árboles_superficie_de_los_lagos_ondulada',
                '6?39_a_49?22_a_27?Fresco_(Brisa_fuerte)?Comienzan_a_formarse_olas_grandes_crestas_rompientes_espuma?Se_mueven_las_ramas_de_los_árboles_dificultad_para_mantener_abierto_el_paraguas',
                '7?50_a_61?28_a_33?Frescachón_(Viento_fuerte)?Mar_gruesa_con_espuma_arrastrada_en_dirección_del_viento?Se_mueven_los_árboles_grandes_dificultad_para_caminar_contra_el_viento',
                '8?62_a_74?34_a_40?Temporal_(Viento_duro)?Grandes_olas_rompientes_franjas_de_espuma?Se_quiebran_las_copas_de_los_árboles_circulación_de_personas_muy_difícil_los_vehículos_se_mueven_por_sí_mismos',
                '9?75_a_88?41_a_47?Temporal_fuerte_(Muy_duro)?Olas_muy_grandes_rompientes_Visibilidad_mermada?Daños_en_árboles_imposible_caminar_con_normalidad_Se_empiezan_a_dañar_las_construcciones_Arrastre_de_vehículos',
                '10?89_a_102?48_a_55?Temporal_duro(Temporal)?Olas_muy_gruesas_con_crestas_empenachadas_Superficie_del_mar_blanca_?Árboles_arrancados_daños_en_la_estructura_de_las_construcciones_Daños_mayores_en_objetos_a_la_intemperie',
                '11?103_a_117?56_a_63?Temporal_muy_duro(Borrasca)?Olas_excepcionalmente_grandes_mar_completamente_blanca_visibilidad_muy_reducida?Destrucción_en_todas_partes_lluvias_muy_intensas_inundaciones_muy_altas_Voladura_de_personas_y_de_otros_muchos_objetos',
                '12?118?64?Temporal_huracanado(Huracán)?Olas_excepcionalmente_grandes_mar_blanca_visibilidad_nula?Voladura_de_vehículos_árboles_casas_techos_y_personas_Puede_generar_un_huracáno_tifón'
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
