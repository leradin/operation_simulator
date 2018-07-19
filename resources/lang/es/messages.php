<?php

// resources/lang/es/messages.php

return [
    // App
    'app_name' =>'Administración del Simulador De Operación',
    // Login
    'enrollment' => 'Matrícula',
    'password' => 'Contraseña',
    'remember' => 'Recordarme',
    'not_authorized' => 'No tiene permisos para ingresar a este módulo',
    // Menu Group
    'group_name_general' => 'General',
    'group_name_complement' => 'Complementos',
    'group_name_unit' => 'Unidades',
    'group_name_element' => 'Elementos',
    // Menus
    'menu_home' => 'Inicio',
    'menu_exercise' => 'Ejercicios',
    'menu_stage' => 'Escenarios',
    'menu_catalog' => 'Catálogos',
    'menu_cabin' => 'Cabinas',
    'menu_computer' => 'Computadoras',
    'menu_computer_type' => 'Tipos de Computadora',
    'menu_device' => 'Dispositivos',
    'menu_device_type' => 'Tipos de Dispositivo',
    'menu_user' => 'Usuarios',
    'menu_unit' => 'Unidades',
    'menu_sensor' => 'Sensores',
    'menu_mathematical_model' => 'Modelos Matématicos',
    'menu_unit_type' => 'Tipos de Unidad',
    'menu_complement' => 'Complementos',
    'menu_track' => 'Blancos',
    'menu_meteorological_phenomenon' => 'Fénomenos Meteorológicos',
    'menu_report' => 'Reportes',
    ///////////////////////////////////
    //Cabin Message confirmation of action// 
    'create_cabin' => 'Crear Cabina',
    'edit_cabin' => 'Editar Cabina',
    'remove_cabin' => 'Cabina eliminada correctamente.',
    'success_cabin' => 'Cabina generada correctamente.',
    //Computer Message confirmation of action// 
    'create_computer' => 'Crear Computadora',
    'edit_computer' => 'Editar Computadora',
    'remove_computer' => 'Computadora eliminada correctamente.',
    'success_computer' => 'Computadora generada correctamente.',
    //Computer Type Message confirmation of action// 
    'create_computer_type' => 'Crear Tipo de Computadora',
    'edit_computer_type' => 'Editar Tipo de Computadora',
    'remove_computer_type' => 'Tipo de Computadora eliminada correctamente.',
    'success_computer_type' => 'Tipo de Computadora generada correctamente.',
    //Device Message confirmation of action// 
    'create_device' => 'Crear Dispositivo',
    'edit_device' => 'Editar Dispositivo',
    'remove_device' => 'Dispositivo eliminado correctamente.',
    'success_device' => 'Dispositivo generado correctamente.',
    //Device Type Message confirmation of action// 
    'create_device_type' => 'Crear Tipo de Dispositivo',
    'edit_device_type' => 'Editar Tipo de Dispositivo',
    'remove_device_type' => 'Tipo de Dispositivo eliminada correctamente.',
    'success_device_type' => 'Tipo de Dispositivo generada correctamente.',
    'not_remove_device_type' => 'No se puede eliminar el tipo de dispositivo, ya que se encuentran algunos dispositivos relacionados.',
    //Unit Type Message confirmation of action// 
    'create_unit_type' => 'Crear Tipo de Unidad',
    'edit_unit_type' => 'Editar Tipo de Unidad',
    'remove_unit_type' => 'Tipo de Unidad eliminada correctamente.',
    'success_unit_type' => 'Tipo de Unidad generada correctamente.',
    'not_remove_unit_type' => 'No se puede eliminar el tipo de unidad, ya que se encuentran algunos unidades relacionados.',

    //Unit  Message confirmation of action// 
    'create_unit' => 'Crear Unidad',
    'edit_unit' => 'Editar Unidad',
    'remove_unit' => 'Unidad eliminada correctamente.',
    'success_unit' => 'Unidad generada correctamente.',
    'not_remove_unit' => 'No se puede eliminar la unidad, ya que se encuentran algunos escenarios relacionados.',

    // Mathematical Model Message confirmation of action// 
    'create_mathematical_model' => 'Crear Modelo Matématico',
    'edit_mathematical_model' => 'Editar Modelo Matématico',
    'remove_mathematical_model' => 'Modelo Matématico eliminado correctamente.',
    'success_mathematical_model' => 'Modelo Matématico generado correctamente.',
    'not_remove_mathematical_model' => 'No se puede eliminar el modelo matématico, ya que se encuentran algunos tipos de unidad relacionados.',

    // Sensor Message confirmation of action// 
    'create_sensor' => 'Crear Sensor',
    'edit_sensor' => 'Editar Sensor',
    'remove_sensor' => 'Sensor eliminado correctamente.',
    'success_sensor' => 'Sensor generado correctamente.',
    'not_remove_sensor' => 'No se puede eliminar el sensor, ya que se encuentran algunas unidades relacionados.',

    // Track Message confirmation of action// 
    'create_track' => 'Crear Blanco',
    'edit_track' => 'Editar Blanco',
    'remove_track' => 'Blanco eliminado correctamente.',
    'success_track' => 'Blanco generado correctamente.',
    'not_remove_track' => 'No se puede eliminar el blanco, ya que se encuentran algunos escenarios relacionados.',

    // Meteorological Phenomenon Message confirmation of action// 
    'create_meteorological_phenomenon' => 'Crear Fénomeno Meteorológico',
    'edit_meteorological_phenomenon' => 'Editar Fénomeno Meteorológico',
    'remove_meteorological_phenomenon' => 'Fénomeno Meteorológico eliminado correctamente.',
    'success_meteorological_phenomenon' => 'Fénomeno Meteorológico generado correctamente.',
    'not_remove_meteorological_phenomenon' => 'No se puede eliminar el fénomeno meteorológico, ya que se encuentran algunos escenarios relacionados.',

    // Stage Message confirmation of action// 
    'create_stage' => 'Crear Escenario',
    'edit_stage' => 'Editar Escenario',
    'remove_stage' => 'Escenario eliminado correctamente.',
    'success_stage' => 'Escenario generado correctamente.',
    'not_remove_stage' => 'No se puede eliminar el escenario, ya que se encuentran algunos ejercicios relacionados.',

    // General
    'id' => 'Identificador',
    'name' => 'Nombre',
    'ip_address' => 'Dirección IP',
    'mac_address' => 'Dirección Fisíca',
    'label' => 'Etiqueta',
    'cabin' => 'Cabina',
    'cabins' => 'Cabinas',
    'computer_type' => 'Tipo de Computadora',
    'device_type' => 'Tipo de Dispositivo',
    'abbreviation' => 'Abreviación', 
    'ip_address_arduino' => 'Dirección IP  de Arduino',
    'mac_address_arduino' =>'Dirección Fisíca  de Arduino',
    'label_arduino' => 'Etiqueta Arduino',
    'ip_address_camera' => 'Dirección IP Cámara',
    'port_camera' => 'Puerto de Switch Cámara',
    'computers' => 'Computadoras',
    'computer' => 'Computadora',
    'devices' => 'Dispositivos',
    'switch_port' => 'Puerto del Switch',
    'unassigned' => 'Sin asignar',
    'optional' => 'Opcional',
    'file' => 'Archivo',
    'download_file' => 'Descargar archivo',
    'mathematical_model' => 'Modelo Matématico',
    'station' => 'Estación',
    'numeral' => 'Numeral',
    'country' => 'País',
    'serial_number' => 'Número Serial',
    'image' => 'Imagen',
    'sensor_type' => 'Tipo de Sensor',
    'sensor_scope' => 'Alcance de Sensor',
    'brand' => 'Marca',
    'model' => 'Modelo',
    'identity' => 'Identidad',
    'battle_dimension' => 'Dimensión de Batalla',
    'status' => 'Estatus',
    'sidc' => 'SIDC',
    'wind_direction' => 'Dirección del Viento',
    'sea_state' => 'Estado de la Mar',
    'cloud_type' => 'Tipo de Nube',
    'wind_velocity' => 'Velocidad del Viento',
    'temperature' => 'Temperatura',
    'area' => 'Área Geografíca',
    'course' => 'Rumbo',
    'speed' => 'Velocidad',
    'altitude' => 'Altitud',
    'unit' => 'Unidad',
    'meters' => 'Metros',
    'knots' => 'Nudos',
    'extents' => 'Grados',
    'close' => 'Cerrar',
    'save' => 'Guardar',
    'init_position' => 'Posición inicial',
    'root_date_time' => 'Fecha y Hora Suprema',
    'scheduler_date_time' => 'Fecha y Hora',
    'directors' => 'Directores',
    'stage' => 'Escenario',
    'number_engines' => 'Número de Motores',
    'lights' => 'Luces',
    'daylight' => 'Luz de Día',
    'battle_light' => 'Luz de Combate',
    'without_lights' => 'Sin Luces',
    'bounding_box' => 'Delimitador de Área',
    'area' => 'Área',
    'open_map' => 'Abrir Mapa',
    'directors' => 'Directores',
    'km/h' => 'Km/Hora',
    'scheduled_date_time' => 'Fecha y Hora Programada',
    'supremed_date_time' => 'Fecha y Hora Suprema (Ejercicio)',
    'execute_exercise' => 'Ejecutar Ejercicio',
    'finish_exercise' => 'Finalizar Ejercicio',
    'see_exercise' => 'Ver Datos del Ejercicio',
    'execution_exercise' => 'Ejercicio en ejecución',
    'relationship_students_computers' => 'Relación estudiantes y computadoras',
    'effects_metheology' => 'Efectos Meteorológicos',
    'tracks' => 'Blancos',
    'add_track' => 'Agregar Blanco',
    'track_1' => 'Blanco 1',
    'course_1' => 'Rumbo 1',
    'speed_1' => 'Velocidad 1',
    'position_1' => 'Posición 1',
    'track_type' => 'Tipo de Blanco',
    'object_type' => 'Tipo de Objeto',
    'radio' => 'Radio en Kilometros',
    'bounding_box' => 'Área de escenario',
    'map_comments' => 'Comentarios Mapa',
    'video_comments' => 'Comentarios Video',
    'cabins_number' => 'Número de cabinas',
    'on_map_events' => 'Eventos de Mapa',
    'on_video_events' => 'Eventos de Video',
    'extra_data' => 'Información adicional',
    'audios_videos' => 'Audios y Videos',
    'dd' => 'Grados Decimales',
    'ddm' => 'Grados Minutos',
    'dms' => 'Grados Minutos Segundos',
    'latitude' => 'Latitud',
    'longitude' => 'Longitud',
    'grades' => 'Grados',
    'minutes' => 'Minutos',
    'seconds' => 'Segundos',
    'north' => 'N',
    'south' => 'S',
    'east' => 'E',
    'west' => 'W',
    'orientation' => 'Orientación',
    'track_source' => 'Sensor Origen',

    ///////////////////
   

    'title_user' => 'Usuarios',
    'title_create_user' => 'Crear Usuario',
    'title_edit_user' => 'Editar Usuario',
    'title_delete_user' => 'Eliminar Usuario',
    // Columns General
    'tr_actions' => 'Acciones',
    'tr_id' => 'ID',
    'button_delete' => 'Eliminar',
    'button_edit' => 'Editar',
    'text_student' => 'Estudiante',
    'text_system' => 'Sistema',
    // Students
    'title_student' => 'Estudiantes',
    'title_create_student' => 'Crear Estudiante',
    'title_edit_student' => 'Editar Estudiante',
    'title_delete_student' => 'Eliminar Estudiante',
    // Practices
    'title_practice' => 'Practicas',
    'title_create_practice' => 'Crear Practica',
    'title_edit_practice' => 'Editar Practica',
    'title_delete_practice' => 'Eliminar Practica',
    // Stages
    'title_stage' => 'Escenarios',
    'title_create_stage' => 'Crear Escenario',
    'title_edit_stage' => 'Editar Escenario',
    'title_delete_stage' => 'Eliminar Escenario',
    // Catalog
    'title_catalog' => 'Catálogos',
    // Exercises
    'title_exercise' => 'Ejercicios',
    'title_create_exercise' => 'Crear Ejercicio',
    'title_edit_exercise' => 'Editar Ejercicio',
    'title_delete_exercise' => 'Eliminar Ejercicio',
    'title_detail_exercise' => 'Detalle Ejercicio',
    // Columns Report
    'tr_target' => 'Objetivo',
    'tr_source' => 'Origen',
    'tr_commentary' => 'Comentario',
    'tr_lat_lon' => 'Posición',
    'tr_course' => 'Rumbo',
    'tr_date' => 'Fecha y hora',
    // Columns Student
    'tr_enrollment' => 'Matrícula',
    'tr_names'  => 'Nombre(s)',
    'tr_lastnames' => 'Apellidos',
    'tr_degree' => 'Grado',
    'tr_ascription' => 'Adscripción',
    'tr_type' => 'Tipo',
    'tr_created_at' => 'Fecha de Creación',
    // Columns Practice
    'tr_name' => 'Nombre',
    'tr_date_time'  => 'Fecha Hora',
    'tr_duration' => 'Duración(Hrs)',
    'tr_error_type' => 'Tipo Error',
    'tr_unit_type' => 'Tipo Unidad',
    'tr_description' => 'Descripción',
    // Columns Exercise
    'tr_assignment' => 'Asignación',
    'tr_table_number' => 'Número de Mesa',
    //Column Report
    'tr_audio_video' => 'Audio/Video',
    'tr_download' => 'Descargar',
    // Degrees
    'title_degree' => 'Grados',
    'title_edit_degree' => 'Editar Grado',
    'success_degree' => 'Grado Generado Correctamente.',
    'remove_degree' => 'Grado Eliminado Correctamente.',
    'description_degree' => 'Catalogo de Grados, se utiliza para adminstrar los niveles de jerarquía del personal de SEMAR.',
    //Ascriptions
    'title_ascription' => 'Ascripciones',
    'title_edit_ascription' => 'Editar Ascripcion',
    'success_ascription' => 'Ascripcion Generado Correctamente.',
    'remove_ascription' => 'Ascripcion Eliminada Correctamente.',
    'description_ascription' => 'Catalogo de Ascripciones, se utiliza para adminstrar las entidades que existen dentro de SEMAR.',
    //ErrorTypes
    'title_error_type' => 'Tipos de Error',
    'title_create_error_type' => 'Crear Tipo de Error',
    'title_delete_error_type' => 'Eliminar Tipo de Error',
    'title_edit_error_type' => 'Editar Tipo de Error',
    'success_error_type' => 'Tipo de Error Generado Correctamente.',
    'remove_error_type' => 'Tipo de Error Eliminado Correctamente.',
    'description_error_type' => 'Catalogo de Tipos de Errores, se utiliza para adminstrar las áreas de errores que pueden llegar a tener las prácticas dentro de un ejercicio.',
    //UnitTypes
    'title_unit_type' => 'Tipos de Unidad',
    'title_create_unit_type' => 'Crear Tipo de Unidad',
    'title_delete_unit_type' => 'Eliminar Tipo de Unidad',
    'title_edit_unit_type' => 'Editar Tipo de Unidad',
    'success_unit_type' => 'Tipo de Unidad Generado Correctamente.',
    'remove_unit_type' => 'Tipo de Unidad Eliminado Correctamente.',
    'ip_address' => 'Dirección IP',
    'description_unit_type' => 'Catalogo de Tipos de Unidad, se utiliza para adminstrar las diferentes clases de unidades con la que cuenta SEMAR.',
    //Materiales
    'title_material' => 'Materiales',
    'title_create_material' => 'Crear Material',
    'title_delete_material' => 'Eliminar Material',
    'title_edit_material' => 'Editar Material',
    'success_material' => 'Material Generado Correctamente.',
    'remove_material' => 'Material Eliminado Correctamente.',
    'description_material' => 'Catalogo de Materiales, se utiliza para adminstrar los materiales que tendran los alumnos durante sus prácticas durante el ejercicio.',

    // Tools
    'title_tool' => 'Herramientas',
    'title_create_tool' => 'Crear Herramienta',
    'title_delete_tool' => 'Eliminar Herramienta',
    'title_edit_tool' => 'Editar Herramienta',
    'success_tool' => 'Herramienta Generado Correctamente.',
    'remove_tool' => 'Herramienta Eliminado Correctamente.',
    'description_tool' => 'Catalogo de Herramientas, se utiliza para adminstrar las herramientas que tendran los alumnos durante sus prácticas durante el ejercicio.',
    // Intruments
    'title_instrument' => 'Instrumentos',
    'title_create_instrument' => 'Crear Instrumento',
    'title_delete_instrument' => 'Eliminar Instrumento',
    'title_edit_instrument' => 'Editar Instrumento',
    'success_instrument' => 'Instrumento Generado Correctamente.',
    'remove_instrument' => 'Instrumento Eliminado Correctamente.',
    'description_instrument' => 'Catalogo de Instrumentos, se utiliza para adminstrar los instrumentos que tendran los alumnos durante sus prácticas durante el ejercicio.',
    // knowledge
    'title_knowledge' => 'Conocimientos',
    'title_create_knowledge' => 'Crear Conocimiento',
    'title_delete_knowledge' => 'Eliminar Conocimiento',
    'title_edit_knowledge' => 'Editar Conocimiento',
    'success_knowledge' => 'Conocimiento Generado Correctamente.',
    'remove_knowledge' => 'Conocimiento Eliminado Correctamente.',
    'description_knowledge' => 'Catalogo de Conocimientos, se utiliza para adminstrar los conocimientos que deberan tener los alumnos al presentar prácticas durante el ejercicio.',
    // software behavior
    'title_software_behavior' => 'Comportamientos de Software',
    'title_create_software_behavior' => 'Crear Comportamiento de Software',
    'title_delete_software_behavior' => 'Eliminar Comportamiento de Software',
    'title_edit_software_behavior' => 'Editar Comportamiento de Software',
    'success_software_behavior' => 'Comportamiento de Software Generado Correctamente.',
    'remove_software_behavior' => 'Comportamiento de Software Eliminado Correctamente.',
    'description_software_behavior' => 'Catalogo de Comportamientos de Software, se utiliza para adminstrar los Comportamientos de Software que tendran las consolas SEDAM durante el ejercicio.',
    // hardware behavior
    'title_hardware_behavior' => 'Comportamientos de Hardware',
    'title_create_hardware_behavior' => 'Crear Comportamiento de Hardware',
    'title_delete_hardware_behavior' => 'Eliminar Comportamiento de Hardware',
    'title_edit_hardware_behavior' => 'Editar Comportamiento de Hardware',
    'success_hardware_behavior' => 'Comportamiento de Hardware Generado Correctamente.',
    'remove_hardware_behavior' => 'Comportamiento de Hardware Eliminado Correctamente.',
    'description_hardware_behavior' => 'Catalogo de Comportamientos de Hardware, se utiliza para adminstrar los Comportamientos de Hardware que tendran las consolas SEDAM durante el ejercicio.',
    // objectives
    'title_objective' => 'Objetivos',
    'title_create_objective' => 'Crear Objetivo',
    'title_delete_objective' => 'Eliminar Objetivo',
    'title_edit_objective' => 'Editar Objetivo',
    'success_objective' => 'Objetivo Generado Correctamente.',
    'remove_objective' => 'Objetivo Eliminado Correctamente.',
    'description_objective' => 'Catalogo de Objetivos, se utiliza para adminstrar los objetivos que tendran las prácticas ejercicio.',
    // activities
    'title_activitie' => 'Actividades',
    'title_create_activitie' => 'Crear Actividad',
    'title_delete_activitie' => 'Eliminar Actividad',
    'title_edit_activitie' => 'Editar Actividad',
    'success_activitie' => 'Actividad Generado Correctamente.',
    'remove_activitie' => 'Actividad Eliminado Correctamente.',
    'description_activitie' => 'Catalogo de Actividades, se utiliza para adminstrar los actividades que tendran las prácticas ejercicio.',
    // solutions
    'title_solution' => 'Soluciones',
    'title_create_solution' => 'Crear Solucion',
    'title_delete_solution' => 'Eliminar Solucion',
    'title_edit_solution' => 'Editar Solucion',
    'success_solution' => 'Solucion Generado Correctamente.',
    'remove_solution' => 'Solucion Eliminado Correctamente.',
    'description_solution' => 'Catalogo de Soluciones, se utiliza para adminstrar las soluciones que tendran las prácticas ejercicio.',
    // sensors
    'title_sensor' => 'Sensores',
    'title_create_sensor' => 'Crear Sensor',
    'title_delete_sensor' => 'Eliminar Sensor',
    'title_edit_sensor' => 'Editar Sensor',
    'success_sensor' => 'Sensor Generado Correctamente.',
    'remove_sensor' => 'Sensor Eliminado Correctamente.',
    'description_sensor' => 'Catalogo de Sensores, se utiliza para adminstrar los sensores que utilizaran las consolas SEDAM durante el ejercicio.',
    // sedam fail
    'title_sedam_fail' => 'Fallas SEDAM',
    'title_create_sedam_fail' => 'Crear Falla SEDAM',
    'title_delete_sedam_fail' => 'Eliminar Falla SEDAM',
    'title_edit_sedam_fail' => 'Editar Falla SEDAM',
    'success_sedam_fail' => 'Falla SEDAM Generado Correctamente.',
    'remove_sedam_fail' => 'Falla SEDAM Eliminado Correctamente.',
    'description_sedam_fail' => 'Catalogo de Fallas SEDAM, se utiliza para adminstrar las fallas mas comunes en sistemas SEDAM',

    // moxa fail
    'title_moxa_fail' => 'Fallas MOXA',
    'title_create_moxa_fail' => 'Crear Falla MOXA',
    'title_delete_moxa_fail' => 'Eliminar Falla MOXA',
    'title_edit_moxa_fail' => 'Editar Falla MOXA',
    'success_moxa_fail' => 'Falla MOXA Generado Correctamente.',
    'remove_moxa_fail' => 'Falla MOXA Eliminado Correctamente.',
    'description_moxa_fail' => 'Catalogo de Fallas MOXA, se utiliza para adminstrar las fallas mas comunes en Moxa',

    //Form Student
    'enrollment' => 'Matrícula',
    'names' => 'Nombre(s)',
    'lastnames' => 'Apellido(s)',
    'degree' => 'Grado',
    'ascription' => 'Adscripción',
    'type' => 'Tipo',
    'create_degree' => 'Agregar Grado',
    'create_ascription' => 'Agregar Adscripción',
    'abbreviation' => 'Abreviación', 
    'priority' => 'Prioridad', 
    'error_duplicate_enrollment_in_user' => 'Ya existe la matrícula en el sistema',
    //Question User
    'confirmation_user_delete' => '¿Deseas eliminar este usuario?',
    'not_permission' => 'No cuenta con permisos',
    //Form Practice
    'name' => 'Nombre',
    'duration' => 'Duración (Hrs)',
    'date_time' => 'Fecha Hora',
    'unit_type' => 'Tipo Unidad',
    'student' => 'Estudiante',
    'error_type' => 'Tipo Error',
    'activitie' => 'Actividad',
    'software_behavior' => 'Comportamiento Software',
    'hardware_behavior' => 'Comportamiento Hardware', 
    'objective' => 'Objetivo', 
    'material' => 'Material',
    'tool' => 'Herramienta', 
    'instrument' => 'Instrumento',
    'knowledge' => 'Conocimiento',
    'solution' => 'Solución',
    'description' => 'Descripción',
    'sensor' => 'Sensor',
    'sensors' => 'Sensores',
    'sedam_fails' => 'Fallas SEDAM',
    'moxa_fails' => 'Fallas MOXA',
    'practices' => 'Prácticas',
    'stages' => 'Escenarios',
    'file_name' => 'Nombre de Archivo',
    'module_name' => 'Nombre de Modulo',
    'ip_address' => 'Dirección IP',
    'topic' => 'Topico',
    'create_error_type' => 'Agregar Tipo de Error',
    'create_unit_type' => 'Agregar Tipo de Unidad',
    'create_material' => 'Agregar Material', 
    'create_tool' => 'Agregar Herramienta', 
    'create_instrument' => 'Agregar Instrumento', 
    'create_knowledge' => 'Agregar Conocimiento',
    'create_software_behavior' => 'Agregar Comportamiento de Software',
    'create_hardware_behavior' => 'Agregar Comportamiento de Hardware',
    'create_objective' => 'Agregar Objetivo',
    'create_activitie' => 'Agregar Actividad',
    'create_solution' => 'Agregar Solución',
    'create_sensor'  => 'Agregar Sensor',
    'create_sedam_fail'  => 'Agregar Falla Sedam',
    'create_moxa_fail'  => 'Agregar Falla Moxa', 
    'start_practice' => 'Iniciar Práctica',
    //*** Steps Practice ***// 
    'step_1_practice' => 'Datos Generales',
    'step_2_practice' => 'Materiales,Herramientas e Instrumentos',
    'step_3_practice' => 'Conocimientos y Comportamientos',
    'step_4_practice' => 'Objetivos,Actividades y Soluciones',
    'step_5_practice' => 'Sensores,Fallas Sedam,Fallas Moxa',
    'success_practice' => 'Práctica Generada Correctamente.',
    'remove_practice' => 'Práctica Eliminada Correctamente.',
    'error_practice' => 'No se puede eliminar la practica, ya que existe algún escenario relacionado.',
    //*** Steps Stage ***//
    'success_stage' => 'Escenario Generado Correctamente.',
    'remove_stage' => 'Escenario Eliminado Correctamente.',
    'error_stage' => 'No se puede eliminar el escenario, ya que existe algún ejercicio relacionado.',
    //*** Exercise Stage ***//
    'success_exercise' => 'Ejercicio Generado Correctamente.',
    'remove_exercise' => 'Ejercicio Eliminado Correctamente.',
    'start_exercise' => 'Ejercicio Iniciado Correctamente.',
    'restart_exercise' => 'Ejercicio Reiniciado Correctamente.',
    'end_exercise' => 'Ejercicio Finalizado Correctamente.',
    'fail_exercise' => 'Algún Ejercicio Se Encuentra Iniciado.',
    'info_see_exercise' => 'Ver información.',
    'tooltip_restart_exercise' => 'Reiniciar Ejercicio.',
    'tooltip_start_exercise' => 'Iniciar Ejercicio.',
    'tooltip_delete_exercise' => 'Eliminar Ejercicio.',
    'create_exercise' => 'Crear Ejercicio.',
    'end2_exercise' => 'Finalizar Ejercicio.',
    'see_exercise' => 'Ver Ejercicio.',
    'question_start_exercise' => '¿Desea iniciar este ejercicio?',
    'question_delete_exercise' => '¿Desea eliminar este ejercicio?',
    'question_end_exercise' => '¿Desea finalizar este ejercicio?',
    'question_restart_exercise' => '¿Desea reiniciar este ejercicio?',
    'question_start_practice' => '¿Desea iniciar esta práctica?',
    'question_end_practice' => '¿Desea finalizar este práctica?',
    'question_end_all_practices_of_table' => '¿Desea finalizar todas las practicas de la mesa ',
    'button_practice_finish' => 'Finalizar Práctica',
    'button_practice_finished' => 'Práctica Finalizada',
    'button_finished_practice' => 'Práctica Finalizada',
    'end_table' => 'Finalizar mesa',
    'minimize_window' => 'Minimizar Ventana',
    'print_exercise' => 'Imprimir Ejercicio',
    'created_at' => 'Fecha Creación',
    'students' => 'Estudiantes',
    'table' => 'Mesa',
    'actions' => 'Acciones',
    'answer' => 'Respuesta',
    'qualify' => 'Calificación',
    'positive_qualify' => 'Aprobado',
    'negative_qualify' => 'No Aprobado',
    'created_date_time' => 'Fecha Hora de Creación',
    'practices_number_negative_qualify' => 'Número de Prácticas No Aprobadas',
    'practices_number_positive_qualify' => 'Número de Prácticas Aprobadas',
    //*** Exercise play ***//
    'enable_disabled' => 'Activar/Desactivar',
    'empty_practices' => 'No cuenta con prácticas',
    'dont_exists_actions_to_manipulate' => 'No existen acciones a manipular.',
    'dont_exists_information' => 'No existe información.',
    //*** User  ***//
    'success_user' => 'Usuario Generado Correctamente.',
    'remove_user' => 'Usuario Eliminado Correctamente.',
    'error_user' => 'No se puede eliminar el usuario, ya que existe algún ejercicio relacionado.',
    //------------------------------
    'step_1' => 'Paso 1',
    'step_2' => 'Paso 2',
    'step_3' => 'Paso 3',
    'step_4' => 'Paso 4',
    'step_5' => 'Paso 5',
    //------------------------------
    'title_create_degree' => 'Crear Grado',
    'title_create_ascription' => 'Crear Adscripción',
    //------------------------------
    'title_home' => 'Inicio',
    // Header
    'settings' => 'Configuraciones',
    'messages' => 'Mensajes',
    'logout' => 'Salir',
    'close' => 'Cerrar',
    //Forms
    'name' => 'Nombre',
    'password' => 'Contraseña',
    'confirm_password' => 'Confirmar Contraseña',
    'email' => "Correo Electronico",
    // Forms Required
    'required_max_2' => 'Máximo 2 caracteres',
    'required_max_3' => 'Máximo 3 caracteres',
    'required_max_5' => 'Máximo 5 caracteres',
    'required_max_10' => 'Máximo 10 caracteres',
    'required_max_15' => 'Máximo 15 caracteres',
    'required_max_20' => 'Máximo 20 caracteres',
    'required_max_25' => 'Máximo 25 caracteres',
    'required_max_50' => 'Máximo 50 caracteres',
    'required_max_100' => 'Máximo 100 caracteres',
    'required_max_150' => 'Máximo 150 caracteres',
    'required_max_255' => 'Máximo 255 caracteres',
    'required_email' => 'Formato correo electronico',
    'required_file' => 'Suba archivo',
    'required_integer' => 'Número',
    'required_text_without_spaces' => 'Texto sin espacios',
    'required_ip_address' => 'Formato dirección ip',
    'required_mac_address' =>'Dirección Fisíca', 
    'required_min_password' => 'Mínimo 6 caracteres',
    'required_max_password' => 'Máximo 25 caracteres',
    'required_confirm_password' => 'Confirmar contraseña',
    'required_at_least_1_computer' => 'Seleccione al menos 1 computadora',
    'required_at_least_1_device' => 'Seleccione al menos 1 dispositivo',
    'required_at_least_1_cabin' => 'Seleccione al menos 1 cabina',
    'required_select_point_on_map' => 'De click sobre el mapa para dar la posición inicial',
    'required_stage' => 'Seleccione un Escenario',
    // Buttons
    'submit' => 'Enviar',
    'cancel' => 'Cancelar',
    'enable' => 'Activar',
    'hide_prompts' => 'Ocultar indicaciones',
    'login' => 'Iniciar sesión',
    // Errors
    'error_enrollment_duplicate' => 'Matrícula ya existe',
    'error_table_duplicate' => 'No se puede repetir números de mesa en el ejercicio',
    'error_user_duplicate' => 'No se puede repetir estudiantes en el ejercicio', 
    'error_delete_stage' => 'No se puede eliminar un escenario que se encuentre relacionado con algún ejercicio',
    'error_login' => 'Las credenciales de acceso no son validas'   
];