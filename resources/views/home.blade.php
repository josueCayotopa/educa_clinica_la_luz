<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Programa de Alta Especialización en Oftalmología - Formamos oftalmólogos y subespecialistas con los más altos estándares de ética y moral, acreditados por la Universidad César Vallejo y Clínica La Luz.">
    <meta name="keywords" content="oftalmología, especialización, fellowship, segmento anterior, glaucoma, retina, vítreo, clínica la luz, educación médica">
    <meta name="author" content="Clínica La Luz">

    <title>Programa de Alta Especialización en Oftalmología - La Luz Educa</title>

    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon_io/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon_io/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon_io/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon_io/site.webmanifest') }}">
    <link rel="shortcut icon" href="{{ asset('images/favicon_io/favicon.ico') }}">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* Estilos adicionales para las nuevas secciones */
        .video-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* Ratio 16:9 */
            height: 0;
            overflow: hidden;
        }

        .video-container iframe,
        .video-container video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 1rem;
        }

        .doctor-card {
            transition: all 0.3s ease;
        }

        .doctor-card:hover {
            transform: translateY(-10px);
        }

        .doctor-image {
            width: 100%;
            height: 280px;
            object-fit: cover;
            border-radius: 0.75rem 0.75rem 0 0;
        }

        /* Estilos para el dropdown */
        .dropdown {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: white;
            min-width: 280px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            border-radius: 0.75rem;
            margin-top: 0.5rem;
            z-index: 1000;
            overflow: hidden;
            border: 1px solid #e5e7eb;
        }

        .dropdown:hover .dropdown-content {
            display: block;
            animation: fadeInDown 0.3s ease-in-out;
        }

        /* Mantener el dropdown abierto cuando el mouse está sobre el contenido */
        .dropdown-content:hover {
            display: block;
        }

        .dropdown-content a {
            display: block;
            padding: 0.875rem 1.25rem;
            color: #1f2937;
            text-decoration: none;
            transition: all 0.3s ease;
            border-bottom: 1px solid #f3f4f6;
        }

        .dropdown-content a:last-child {
            border-bottom: none;
        }

        .dropdown-content a:hover {
            background-color: #FEF2F2;
            color: #B11A1A;
            padding-left: 1.5rem;
        }

        .dropdown-content a i {
            margin-right: 0.5rem;
            width: 20px;
            text-align: center;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Banner de cookies */
        #cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(135deg, #1f2937 0%, #374151 100%);
            color: white;
            padding: 1.5rem;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.2);
            z-index: 9999;
            transform: translateY(100%);
            transition: transform 0.4s ease-in-out;
        }

        #cookie-banner.show {
            transform: translateY(0);
        }

        .cookie-btn {
            padding: 0.625rem 1.5rem;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            font-size: 0.875rem;
        }

        .cookie-btn-accept {
            background-color: #B11A1A;
            color: white;
        }

        .cookie-btn-accept:hover {
            background-color: #8B0000;
            transform: scale(1.05);
        }

        .cookie-btn-reject {
            background-color: transparent;
            color: white;
            border: 2px solid white;
        }

        .cookie-btn-reject:hover {
            background-color: white;
            color: #1f2937;
        }

    </style>
</head>

<body class="font-body bg-neutral">


    @include('components.header')
    @include('components.hero')

    @include('components.objetivos')

    @include('components.areas-formacion')

       @include('components.segmento-anterior-video')

    <!-- ================================================== -->
    <!-- NUEVA SECCIÓN: MÉDICOS/PROFESORES SEGMENTO ANTERIOR -->
    <!-- ================================================== -->
   @include('components.segmento-anterior-medicos')


@include('components.segmento-anterior-plan-curricular')
@include('components.metas-segmento-anterior')


@include('components.glaucoma-clinico-quirurgico-video')
  


    <!-- ================================ -->
    <!-- NUEVA SECCIÓN: RETINA Y VÍTREO -->
    <!-- ================================ -->
    @include('components.retina-clinico-quirurgico')


    @include('components.metas-retina')
    <!-- V. Evaluación -->
    <section id="evaluacion" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Sistema de Evaluación Mensual</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Evaluación integral y continua en todas las áreas de formación
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg mb-8 border-2 border-primary">
                <h3 class="font-heading text-2xl font-bold text-secondary mb-6 text-center">Áreas de Evaluación y Responsables</h3>
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="bg-primary text-white">
                                <th class="px-6 py-4 text-left rounded-tl-lg">Área de Evaluación</th>
                                <th class="px-6 py-4 text-left rounded-tr-lg">Profesor/Responsable</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-user-md text-secondary mr-3"></i>
                                        <span class="font-bold text-secondary">Asistencial</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Tutor</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-presentation text-primary mr-3"></i>
                                        <span class="font-bold text-secondary">Académica: Exposiciones</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Jefa de Enseñanza</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-flask text-secondary mr-3"></i>
                                        <span class="font-bold text-secondary">Wetlab</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Jefe de Cirugía Experimental</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-procedures text-primary mr-3"></i>
                                        <span class="font-bold text-secondary">Cirugía</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Tutor</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-chalkboard-teacher text-secondary mr-3"></i>
                                        <span class="font-bold text-secondary">Docencia</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Tutor</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-microscope text-primary mr-3"></i>
                                        <span class="font-bold text-secondary">Investigación Científica</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Dirección de Investigación</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-hands-helping text-secondary mr-3"></i>
                                        <span class="font-bold text-secondary">Responsabilidad Social</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Administrador</td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <i class="fas fa-chart-line text-primary mr-3"></i>
                                        <span class="font-bold text-secondary">Marketing en Servicios de Salud Visual</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-gray-700">Administrador</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-secondary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-book-reader text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Evaluación Teórica</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Exámenes periódicos por módulo</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Presentaciones de casos clínicos</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Revisión bibliográfica</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Evaluación Práctica</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Desempeño en wetlab</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Habilidades quirúrgicas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Manejo de complicaciones</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="w-16 h-16 bg-secondary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-microscope text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Investigación</h3>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Trabajo de investigación obligatorio</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Presentación oral y escrita</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                            <span>Entrega 2 meses antes de finalizar</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- VI. Duración y Alcance -->
    <!-- VII. Financiamiento -->
    <!-- VIII. Selección de Postulantes -->
    <!-- Expanding sections VI, VII, and VIII with detailed information -->
    <section class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid md:grid-cols-2 gap-8">
                <!-- VI. Duración y Alcance -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-calendar-check text-primary mr-3"></i>
                       Duración y Alcance
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">Segmento Anterior, Córnea y Cirugía Refractiva</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">1 año</span>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">Glaucoma Clínico-Quirúrgico</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">1 año</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">Retina y Vítreo Clínico-Quirúrgico</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">2 años</span>
                        </div>
                    </div>
                    <div class="mt-6 p-4 bg-neutral-100 rounded-lg">
                        <p class="text-gray-700 text-sm">
                            <strong>Alcance:</strong> Nuestros programas de alta especialización (fellowship) están dirigidos a oftalmólogos nacionales e internacionales.
                        </p>
                    </div>
                </div>

                <!-- VII. Financiamiento -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-dollar-sign text-primary mr-3"></i>
                        Financiamiento
                    </h3>
                    <div class="space-y-4">
                        <div class="bg-primary-50 p-4 rounded-lg border-l-4 border-primary">
                            <h4 class="font-bold text-secondary mb-2">Costo del Programa</h4>
                            <p class="text-gray-700">Los oftalmólogos que hacen cualquiera de los programas de alta especialización (fellowship) en la Clínica La Luz <strong>no pagarán por su capacitación</strong> y estarán a dedicación exclusiva ad honorem.</p>
                        </div>

                        <div class="bg-secondary-50 p-4 rounded-lg border-l-4 border-secondary">
                            <h4 class="font-bold text-secondary mb-2">Instrumental y Materiales</h4>
                            <p class="text-gray-700">Los fellows de todos los programas tienen la <strong>obligación de tener su instrumental quirúrgico</strong> para poder operar, de igual manera deben tener sus insumos para realizar su cirugía experimental.</p>
                        </div>

                        <div class="bg-primary-50 p-4 rounded-lg border-l-4 border-primary">
                            <h4 class="font-bold text-secondary mb-2">Beneficios por Investigación</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li>• <strong>Residentes:</strong> 1 trabajo de investigación por año publicado en revistas indexadas = pasaje a congreso en América Latina</li>
                                <li>• <strong>Fellows:</strong> 1 trabajo sobre resultados visuales + 1 trabajo sobre mejora continua publicados = pasaje a congreso internacional en AL</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- VIII. Selección de Postulantes -->
                <div class="bg-white p-8 rounded-xl shadow-lg md:col-span-2 hover:shadow-xl transition-all duration-300">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-user-check text-primary mr-3"></i>
                      Selección de Postulantes
                    </h3>

                    <div class="grid md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Perfil del Aspirante</h4>
                            <div class="space-y-3">
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Médico oftalmólogo nacional o internacional acreditado o en proceso de serlo</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Académicamente sobresaliente, que valora el conocimiento científico basado en evidencias</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Comprometido con la labor social de la clínica con deseos de tener un impacto positivo en la vida de las personas que menos tienen</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Motivado, dinámico, creativo, proactivo, comprometido a la superación personal</span>
                                </div>
                                <div class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                    <span class="text-gray-700">Persona con valores, socialmente responsable y que se conduce con los estándares más altos de ética</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Proceso de Selección</h4>
                            <div class="space-y-3">
                                <div class="bg-primary-50 p-4 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-primary text-white font-bold w-8 h-8 rounded-full flex items-center justify-center mr-3">1</span>
                                        <span class="font-bold text-secondary">Solicitud de Vacante</span>
                                    </div>
                                    <p class="text-sm text-gray-700 ml-11">Enviar solicitud al email: <strong>jefaturadeposgrado@clinicalaluz.com.pe</strong></p>
                                    <p class="text-sm text-gray-600 ml-11">Contacto: Sra. Magda Arcaya, Secretaria de Posgrado</p>
                                </div>

                                <div class="bg-primary-50 p-4 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-primary text-white font-bold w-8 h-8 rounded-full flex items-center justify-center mr-3">2</span>
                                        <span class="font-bold text-secondary">Evaluación Curricular</span>
                                    </div>
                                    <p class="text-sm text-gray-700 ml-11">Revisión de expediente académico y profesional</p>
                                </div>

                                <div class="bg-primary-50 p-4 rounded-lg">
                                    <div class="flex items-center mb-2">
                                        <span class="bg-primary text-white font-bold w-8 h-8 rounded-full flex items-center justify-center mr-3">3</span>
                                        <span class="font-bold text-secondary">Entrevista y Evaluación Psicométrica</span>
                                    </div>
                                    <p class="text-sm text-gray-700 ml-11">Realizada por el Comité de Capacitación y Docencia de la Clínica</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-primary to-secondary text-white p-6 rounded-xl">
                        <h4 class="font-bold text-xl mb-4">Vacantes Disponibles por Programa</h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-center justify-between">
                                <span>Segmento Anterior, Córnea y Cirugía Refractiva</span>
                                <span class="bg-white text-primary font-bold px-4 py-2 rounded-full">5/año</span>
                            </div>

                            <div class="flex items-center justify-between">
                                <span>Glaucoma Clínico-Quirúrgico</span>
                                <span class="bg-white text-primary font-bold px-4 py-2 rounded-full">2/año</span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span>Retina Clínica-Quirúrgico</span>
                                <span class="bg-white text-primary font-bold px-4 py-2 rounded-full">2/2 años</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- IX. Estrategia para Enseñar a Operar Cataratas Ambidiestramente -->
    <!-- Adding new section IX with the ambidextrous cataract surgery training strategy -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide"> Estrategia de Entrenamiento</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Estrategia Segura para Enseñar a Operar Cataratas Ambidiestramente</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Programa estructurado en 6 ejes y 3 etapas para desarrollar habilidades quirúrgicas ambidiestras sin complicaciones
                </p>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <div class="mb-8">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-4">Estructura del Programa</h3>
                    <p class="text-gray-700 mb-6">
                        El programa se desarrolla en <strong>12 meses</strong>, dividido en <strong>3 etapas progresivas (E1, E2, E3)</strong>,
                        integrando <strong>6 ejes fundamentales</strong> de formación:
                    </p>


                </div>

                <div class="bg-neutral p-6 rounded-xl shadow-md mb-8">
                    <h3 class="font-heading text-xl font-bold text-secondary mb-4">Matriz de Entrenamiento Progresivo</h3>
                    <!--
                    <div class="mb-4">
                        <img src="{{ asset('images/estrategia.png') }}" alt="Estrategia de Entrenamiento Ambidiestro" class="w-full rounded-lg shadow-lg">
                    </div>
                    -->
                    <p class="text-sm text-gray-600 italic">
                        Matriz detallada del programa de entrenamiento en cirugía de catarata ambidiestra, mostrando la progresión de habilidades a través de las 3 etapas.
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-6">
                    <!-- Etapa 1 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <span class="bg-primary text-white font-bold text-2xl w-12 h-12 rounded-full flex items-center justify-center mr-3">E1</span>
                            <h4 class="font-heading text-xl font-bold text-secondary">Etapa 1</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Meses 1-3</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Protocolos de investigación</li>
                            <li>• Wetlab 24x7</li>
                            <li>• Examen de fluídica y facodinamia</li>
                            <li>• Evaluación pre, trans y post quirúrgica</li>
                            <li>• Manejo de equipos y microscopios</li>
                            <li>• Crosslinking</li>
                            <li>• Aprender a instrumentar</li>
                            <li>• Exámenes auxiliares y uso de IA</li>
                            <li>• Presentar 25% de trabajo de investigación</li>
                        </ul>
                        <div class="mt-4 p-3 bg-primary-100 rounded-lg">
                            <p class="text-xs font-bold text-primary">Evaluación: ETP (Examen Teórico-Práctico)</p>
                        </div>
                    </div>

                    <!-- Etapa 2 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <span class="bg-secondary text-white font-bold text-2xl w-12 h-12 rounded-full flex items-center justify-center mr-3">E2</span>
                            <h4 class="font-heading text-xl font-bold text-secondary">Etapa 2</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Meses 4-7</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Manejo de núcleo con diferentes técnicas</li>
                            <li>• STOP AND CHOP</li>
                            <li>• CHOP HORIZONTAL Y VERTICAL</li>
                            <li>• DOBLE PRECHOPER</li>
                            <li>• Wetlab PKP y lamelares</li>
                            <li>• VVAA Central x PP</li>
                            <li>• Presentar 25% de trabajo de investigación</li>
                        </ul>
                        <div class="mt-4 p-3 bg-secondary-100 rounded-lg">
                            <p class="text-xs font-bold text-secondary">Evaluación: ETP (Examen Teórico-Práctico)</p>
                        </div>
                    </div>

                    <!-- Etapa 3 -->
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <span class="bg-primary text-white font-bold text-2xl w-12 h-12 rounded-full flex items-center justify-center mr-3">E3</span>
                            <h4 class="font-heading text-xl font-bold text-secondary">Etapa 3</h4>
                        </div>
                        <p class="text-sm text-gray-600 mb-4">Meses 8-12</p>
                        <ul class="space-y-2 text-sm text-gray-700">
                            <li>• Facoemulsificación y FLACS</li>
                            <li>• Cirugía de catarata compleja (MN)</li>
                            <li>• LIO Fáquicos</li>
                            <li>• LIO Premium</li>
                            <li>• Manejo de la Afaquia (FE y RP)</li>
                            <li>• Manejo de Queratocono</li>
                            <li>• Ojo pequeño con VVAa</li>
                            <li>• Excimer laser</li>
                            <li>• Wetlab PKP y lamelares</li>
                            <li>• PKP previo examen</li>
                            <li>• Presentar 50% de trabajo</li>
                        </ul>
                        <div class="mt-4 p-3 bg-primary-100 rounded-lg">
                            <p class="text-xs font-bold text-primary">Evaluación: EDG (Examen de Grado)</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 bg-gradient-to-r from-primary to-secondary text-white p-6 rounded-xl shadow-lg">
                    <h4 class="font-bold text-xl mb-3">Evaluación Final</h4>
                    <p class="text-sm mb-4">
                        Al final de cada etapa: <strong>Examen teórico-práctico</strong> por Dr. F. Silva, Dr. E. Gonzales y presentar trabajo de investigación a Dra. LG (entregables).
                    </p>
                    <p class="text-sm">
                        <strong>Requisito adicional:</strong> FACONUC y MININUC con anestesia peribulbar. E1 + E2 + E3 con anestesia PB o tópica asistida.
                    </p>
                </div>
            </div>

            <div class="bg-secondary-50 p-6 rounded-xl mt-12 shadow-lg">
                <h4 class="font-heading text-lg font-bold text-secondary mb-3 flex items-center">
                    <i class="fas fa-lightbulb text-secondary mr-3"></i>
                    Requisitos Previos
                </h4>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>2 protocolos de investigación (córnea y escleral)</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>Wetlab 24x7 (disponibilidad completa)</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>Examen de fluídica y facodinamia aprobado</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>Firma de acta de cumplimiento de reglamento</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>Hacer todo con la mano no dominante</span>
                    </li>
                    <li class="flex items-start">
                        <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                        <span>Presentar su instrumental quirúrgico</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    @include('components.respectiva-laboral')
    <!-- ========================================== -->
    <!-- SECCIÓN: TESTIMONIOS DE FELLOWS -->
    <!-- ========================================== -->
    @include('components.testimonios-fellows')


    <!-- Adding new section: Preguntas Frecuentes (FAQ) -->
    <section class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">FAQ</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Preguntas Frecuentes</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Respuestas a las preguntas más comunes sobre nuestros programas de fellowship
                </p>
            </div>

            <div class="max-w-4xl mx-auto space-y-4">
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Cuál es el costo del programa de fellowship?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Los oftalmólogos que realizan cualquiera de los programas de alta especialización (fellowship) en la Clínica La Luz <strong>no pagan por su capacitación</strong>. El programa es ad honorem con dedicación exclusiva. Sin embargo, los fellows deben contar con su propio instrumental quirúrgico e insumos para cirugía experimental.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Puedo aplicar si soy oftalmólogo extranjero?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Sí, nuestros programas están dirigidos tanto a oftalmólogos nacionales como internacionales. Para fellows extranjeros, la Clínica La Luz apoyará en la gestión de la visa de estudiante. Además, deben contar con un seguro médico activo durante el tiempo que dure el fellowship y un seguro de repatriación de restos en caso de fatalidad.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Cuántas cirugías realizaré durante el programa?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Las metas quirúrgicas varían según el programa. Por ejemplo, en Segmento Anterior: 20 MININUC, 50 FACONUC, 50 facoemulsificaciones, 10 cirugías con femtosegundo, 10 LIO fáquicos, 20 excimer laser, entre otros. En Glaucoma: 50 cirugías como ayudante, 30 cirugías tutoreadas, 50 procedimientos con láser, y 60 cirugías de catarata.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Qué requisitos de investigación debo cumplir?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Los fellows deben realizar <strong>2 trabajos de investigación por año</strong>: uno sobre resultados visuales y complicaciones de sus pacientes, y otro sobre temas que impacten positivamente en la mejora continua de los servicios. Ambos deben ser publicados en revistas indexadas. El cumplimiento de este requisito otorga el derecho a un pasaje para un congreso internacional en América Latina.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Cómo es el proceso de selección?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>El proceso incluye: 1) Solicitud de vacante al email jefaturadeposgrado@clinicalaluz.com.pe (contacto: Sra. Magda Arcaya), 2) Evaluación curricular, 3) Entrevista y evaluación psicométrica por el Comité de Capacitación y Docencia de la Clínica. Buscamos profesionales académicamente sobresalientes, con valores éticos sólidos y compromiso con la responsabilidad social.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Qué es la estrategia de entrenamiento ambidiestro?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Es un programa estructurado en 3 etapas (E1, E2, E3) a lo largo de 12 meses, que integra 6 ejes de formación. El objetivo es desarrollar habilidades quirúrgicas con ambas manos, permitiendo mayor versatilidad y seguridad en cirugías de catarata. Incluye wetlab intensivo, evaluaciones teórico-prácticas y progresión desde técnicas básicas hasta procedimientos complejos como FLACS y manejo de cataratas complejas.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Cuántas vacantes hay disponibles por programa?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>Las vacantes son limitadas: Segmento Anterior, Córnea y Cirugía Refractiva (5 por año), Córnea, Refractiva y Superficie Ocular (1 por año), Glaucoma Clínico-Quirúrgico (2 por año), y Retina Clínica-Quirúrgico (2 cada 2 años). Recomendamos aplicar con anticipación.</p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
                    <button class="faq-question w-full text-left p-6 flex justify-between items-center hover:bg-gray-50 transition" onclick="toggleFAQ(this)">
                        <span class="font-bold text-secondary">¿Qué oportunidades laborales tendré al graduarme?</span>
                        <i class="fas fa-chevron-down text-primary transition-transform duration-300"></i>
                    </button>
                    <div class="faq-answer hidden p-6 pt-0 text-gray-700">
                        <p>La Clínica La Luz ofrece a los egresados la posibilidad de trabajar en cualquiera de nuestras sedes (SMP, Central, Breña, Comas, SJL, Tacna, Chiclayo) y la oportunidad de participar como asociado o socio en proyectos de expansión en el interior del país. Nuestros graduados tienen una empleabilidad del 100% y ocupan posiciones de liderazgo en instituciones prestigiosas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adding new section: Galería y Recursos -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Instalaciones</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Nuestras Instalaciones y Tecnología</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Contamos con tecnología de punta y espacios diseñados para la excelencia en formación oftalmológica
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-microscope text-white text-3xl"></i>
                    </div>
                    <h4 class="font-heading text-xl font-bold text-secondary mb-2">Wetlab Avanzado</h4>
                    <p class="text-sm text-gray-700">Laboratorio de cirugía experimental disponible 24/7 con equipos de última generación</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-procedures text-white text-3xl"></i>
                    </div>
                    <h4 class="font-heading text-xl font-bold text-secondary mb-2">Salas de Cirugía</h4>
                    <p class="text-sm text-gray-700">Quirófanos equipados con tecnología femtosegundo, FLACS y sistemas de facoemulsificación</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-laptop-medical text-white text-3xl"></i>
                    </div>
                    <h4 class="font-heading text-xl font-bold text-secondary mb-2">Diagnóstico Avanzado</h4>
                    <p class="text-sm text-gray-700">OCT Cirrus 5000, Angio-OCT, campos visuales Humphrey, topógrafos y tomógrafos</p>
                </div>

                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300 text-center">
                    <div class="w-20 h-20 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-book-reader text-white text-3xl"></i>
                    </div>
                    <h4 class="font-heading text-xl font-bold text-secondary mb-2">Biblioteca Digital</h4>
                    <p class="text-sm text-gray-700">Acceso a revistas indexadas, bases de datos científicas y material académico actualizado</p>
                </div>
            </div>


        </div>
    </section>

    <!-- Adding new section: Acreditación y Reconocimientos -->
    <section class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Acreditación</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Reconocimientos y Certificaciones</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Nuestros programas cuentan con el respaldo de instituciones académicas de prestigio
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-university text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Universidad César Vallejo</h3>
                            <p class="text-sm text-gray-600">Acreditación Académica</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        Nuestros programas de fellowship están acreditados por la Universidad César Vallejo (UCV),
                        una de las instituciones educativas más prestigiosas del Perú, garantizando la calidad académica
                        y el reconocimiento nacional e internacional de nuestros certificados.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-hospital text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Clínica La Luz</h3>
                            <p class="text-sm text-gray-600">Certificación Institucional</p>
                        </div>
                    </div>
                    <p class="text-gray-700">
                        La Clínica La Luz es una institución líder en oftalmología en Perú, con más de 7 sedes y un equipo
                        de más de 50 especialistas. Nuestro compromiso con la excelencia médica y la formación de profesionales
                        de alto nivel nos posiciona como referente en educación oftalmológica.
                    </p>
                </div>
            </div>

            <div class="mt-12 bg-white p-8 rounded-xl shadow-lg max-w-4xl mx-auto hover:shadow-xl transition-all duration-300">
                <h3 class="font-heading text-2xl font-bold text-secondary mb-6 text-center">Universidad Federico Villarreal</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-600 text-2xl mr-4 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-bold text-secondary mb-2"></h4>
                            <p class="text-sm text-gray-700"></p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Adding new section: Calendario Académico 
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Calendario</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Calendario Académico</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Fechas importantes y actividades programadas para el año académico
                </p>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-calendar-check text-white text-xl"></i>
                            </div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Convocatoria</h3>
                        </div>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span><strong>Enero - Febrero:</strong> Apertura de convocatoria para nuevos fellows</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span><strong>Marzo:</strong> Entrevistas y evaluaciones psicométricas</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span><strong>Abril:</strong> Publicación de resultados y matrícula</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-graduation-cap text-white text-xl"></i>
                            </div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Inicio de Programa</h3>
                        </div>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-secondary text-xs mt-2 mr-3"></i>
                                <span><strong>Mayo:</strong> Inicio del programa académico y curso intensivo de wetlab</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-secondary text-xs mt-2 mr-3"></i>
                                <span><strong>Junio:</strong> Inicio de actividades clínicas y quirúrgicas</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-users-class text-white text-xl"></i>
                            </div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Eventos Académicos</h3>
                        </div>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span><strong>Agosto (cada 2 años):</strong> Curso Internacional de Segmento Anterior, Córnea y Refractiva</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-primary text-xs mt-2 mr-3"></i>
                                <span><strong>Durante el año:</strong> Participación en congresos nacionales e internacionales</span>
                            </li>
                        </ul>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-4">
                            <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                                <i class="fas fa-award text-white text-xl"></i>
                            </div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Graduación</h3>
                        </div>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-circle text-secondary text-xs mt-2 mr-3"></i>
                                <span><strong>Marzo - Abril:</strong> Presentación de trabajos de investigación</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-circle text-secondary text-xs mt-2 mr-3"></i>
                                <span><strong>Mayo:</strong> Ceremonia de graduación</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="mt-8 bg-gradient-to-r from-primary to-secondary text-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-info-circle text-3xl mr-4"></i>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Nota Importante</h4>
                            <p class="text-sm">Las fechas pueden variar según el programa específico. Consulta con la Secretaría de Posgrado para información actualizada.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-8">
    </section>
    -->


    <!-- Adding CTA section before contact -->
    <section class="py-20 bg-gradient-to-br from-primary to-secondary text-white">
        <div class="container mx-auto px-4 text-center">
            <h2 class="font-heading text-3xl md:text-5xl font-bold mb-6">¿Listo para Transformar tu Carrera?</h2>
            <p class="text-xl mb-8 max-w-3xl mx-auto opacity-90">
                Únete a la próxima generación de oftalmólogos líderes. Aplica ahora a nuestros programas de alta especialización.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="#contacto" class="inline-flex items-center bg-white text-primary font-bold py-4 px-8 rounded-xl hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    <i class="fas fa-paper-plane mr-3"></i>
                    <span>Solicitar Información</span>
                </a>
                <a href="mailto:jefaturadeposgrado@clinicalaluz.com.pe" class="inline-flex items-center border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-primary transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                    <i class="fas fa-envelope mr-3"></i>
                    <span>Contactar Directamente</span>
                </a>
            </div>
            <div class="mt-8 flex items-center justify-center text-sm opacity-75">
                <i class="fas fa-clock mr-2"></i>
                <span>Vacantes limitadas - Aplica antes del 28 de febrero</span>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-12">
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mb-4">Contáctanos</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    ¿Interesado en nuestro programa? Completa el formulario y nos pondremos en contacto contigo
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                <div class="bg-neutral p-8 rounded-xl shadow-lg">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-secondary font-bold mb-2">Nombre Completo</label>
                                <input type="text" id="name" name="name" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="email" class="block text-secondary font-bold mb-2">Email</label>
                                <input type="email" id="email" name="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="phone" class="block text-secondary font-bold mb-2">Teléfono</label>
                                <input type="tel" id="phone" name="phone" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="specialty" class="block text-secondary font-bold mb-2">Especialidad de Interés</label>
                                <select id="specialty" name="specialty" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                                    <option value="">Seleccionar...</option>
                                    <option value="segmento-anterior">Segmento Anterior, Córnea y Cirugía Refractiva</option>
                                    <option value="glaucoma">Glaucoma Clínico-Quirúrgico</option>
                                    <option value="retina">Retina y Vítreo Clínico-Quirúrgico</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block text-secondary font-bold mb-2">Mensaje</label>
                                <textarea id="message" name="message" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-primary-dark transition-all duration-300 shadow-lg hover:shadow-xl">
                                Enviar Solicitud
                            </button>
                        </div>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Dirección</h4>
                                <p class="text-gray-700">Clínica La Luz<br>Lima, Perú</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Email</h4>
                                <p class="text-gray-700">fellows@clinicalaluz.com.pe</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-2">Teléfono</h4>
                                <p class="text-gray-700">+51 XXX XXX XXX</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                        <h4 class="font-bold text-secondary mb-4">Síguenos</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-primary-dark transition">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="bg-secondary text-white py-12">
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid md:grid-cols-4 gap-8 mb-8">
                <div>
                    <img src="{{ asset('images/logo-fellow1.png') }}" alt="Logo" class="h-10 mb-4 filter brightness-0 invert">
                    <p class="text-gray-400">Formando los mejores especialistas en oftalmología del Perú</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#objetivos" class="text-gray-400 hover:text-white transition">Objetivos</a></li>
                        <li><a href="#testimonios" class="text-gray-400 hover:text-white transition">Testimonios</a></li>
                        <li><a href="#segmento-anterior" class="text-gray-400 hover:text-white transition">Segmento Anterior</a></li>
                        <li><a href="#plan-curricular" class="text-gray-400 hover:text-white transition">Plan Curricular</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Especialidades</h4>
                    <ul class="space-y-2">
                        <li><a href="#segmento-anterior" class="text-gray-400 hover:text-white transition">Segmento Anterior</a></li>
                        <li><a href="#glaucoma" class="text-gray-400 hover:text-white transition">Glaucoma</a></li>
                        <li><a href="#retina-vitreo" class="text-gray-400 hover:text-white transition">Retina y Vítreo</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Acreditación</h4>
                    <p class="text-gray-400 mb-2">Universidad César Vallejo</p>
                    <p class="text-gray-400">Clínica La Luz</p>
                </div>
            </div>
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Clínica La Luz. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Banner de Cookies -->
    <div id="cookie-banner">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="flex-1">
                    <div class="flex items-center gap-3 mb-2">
                        <i class="fas fa-cookie-bite text-3xl text-amber-400"></i>
                        <h3 class="text-lg font-bold">🍪 Uso de Cookies</h3>
                    </div>
                    <p class="text-sm text-gray-200">
                        Utilizamos cookies propias y de terceros para mejorar tu experiencia de navegación,
                        analizar el tráfico del sitio y personalizar el contenido. Al hacer clic en "Aceptar",
                        consientes el uso de todas las cookies.
                        <a href="#" class="underline hover:text-primary transition">Política de Privacidad</a>
                    </p>
                </div>
                <div class="flex gap-3 flex-shrink-0">
                    <button onclick="rejectCookies()" class="cookie-btn cookie-btn-reject">
                        Rechazar
                    </button>
                    <button onclick="acceptCookies()" class="cookie-btn cookie-btn-accept">
                        <i class="fas fa-check mr-2"></i>Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Mobile dropdown toggle
        function toggleMobileDropdown() {
            const submenu = document.getElementById('mobile-submenu');
            const icon = document.getElementById('mobile-dropdown-icon');
            submenu.classList.toggle('hidden');
            icon.classList.toggle('fa-chevron-down');
            icon.classList.toggle('fa-chevron-up');
        }

        // Smooth scrolling mejorado para todos los enlaces anchor
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Si el href es solo "#", no hacer nada
                if (href === '#') {
                    e.preventDefault();
                    return;
                }

                e.preventDefault();
                const targetId = href;
                const targetElement = document.querySelector(targetId);

                if (targetElement) {
                    // Calcular la posición considerando el header fijo
                    const headerHeight = document.getElementById('header').offsetHeight;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;

                    window.scrollTo({
                        top: targetPosition
                        , behavior: 'smooth'
                    });

                    // Cerrar el menú móvil si está abierto
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-lg');
                header.classList.add('border-b', 'border-gray-200');
            } else {
                header.classList.remove('shadow-lg');
                header.classList.remove('border-b', 'border-gray-200');
            }
        });

        // Carousel con 2 slides
        const slides = document.querySelectorAll('.carousel-slide');
        const indicators = document.querySelectorAll('.carousel-indicator');
        let currentSlide = 0;
        let carouselInterval;

        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.classList.remove('opacity-0');
                    slide.classList.add('active');
                } else {
                    slide.classList.add('opacity-0');
                    slide.classList.remove('active');
                }
            });

            indicators.forEach((indicator, i) => {
                const dot = indicator.querySelector('div > div');
                const text = indicator.querySelector('span');

                if (i === index) {
                    indicator.classList.add('active');
                    if (dot) dot.classList.remove('bg-white/50');
                    if (dot) dot.classList.add('bg-white');
                    if (text) text.classList.remove('text-white/70');
                    if (text) text.classList.add('text-white');
                } else {
                    indicator.classList.remove('active');
                    if (dot) dot.classList.remove('bg-white');
                    if (dot) dot.classList.add('bg-white/50');
                    if (text) text.classList.remove('text-white');
                    if (text) text.classList.add('text-white/70');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function previousSlide() {
            currentSlide = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(currentSlide);
        }

        function changeSlide(direction) {
            stopCarousel();
            if (direction > 0) {
                nextSlide();
            } else {
                previousSlide();
            }
            startCarousel();
        }

        function startCarousel() {
            carouselInterval = setInterval(nextSlide, 8000); // 8 segundos por slide
        }

        function stopCarousel() {
            clearInterval(carouselInterval);
        }

        indicators.forEach((indicator, i) => {
            indicator.addEventListener('click', () => {
                currentSlide = i;
                showSlide(currentSlide);
                stopCarousel();
                startCarousel();
            });
        });

        startCarousel();

        const carouselContainer = document.querySelector('.carousel-container');
        if (carouselContainer) {
            carouselContainer.addEventListener('mouseenter', stopCarousel);
            carouselContainer.addEventListener('mouseleave', startCarousel);
        }

        // ===================================
        // COOKIES FUNCTIONS
        // ===================================

        // Mostrar banner de cookies si no se ha respondido
        window.addEventListener('load', function() {
            const cookieConsent = localStorage.getItem('cookieConsent');
            if (!cookieConsent) {
                setTimeout(() => {
                    document.getElementById('cookie-banner').classList.add('show');
                }, 1000);
            }
        });

        // Aceptar cookies
        function acceptCookies() {
            localStorage.setItem('cookieConsent', 'accepted');
            document.getElementById('cookie-banner').classList.remove('show');

            // Aquí puedes agregar el código para activar Google Analytics u otras herramientas
            console.log('Cookies aceptadas');

            // Ejemplo: Activar Google Analytics (si lo tienes configurado)
            // if (typeof gtag === 'function') {
            //     gtag('consent', 'update', {
            //         'analytics_storage': 'granted'
            //     });
            // }
        }

        // Rechazar cookies
        function rejectCookies() {
            localStorage.setItem('cookieConsent', 'rejected');
            document.getElementById('cookie-banner').classList.remove('show');
            console.log('Cookies rechazadas');
        }

    </script>



    <!-- JavaScript para los Tabs -->
    <script>
        // Función principal para cambiar tabs
        function showModuleCategory(category) {
            // Ocultar todos los contenidos
            document.querySelectorAll('.module-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Remover clase active de todos los tabs
            document.querySelectorAll('.module-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-primary');
                tab.classList.add('bg-secondary-700');
            });

            // Mostrar el contenido seleccionado
            document.getElementById('content-' + category).classList.remove('hidden');

            // Activar el tab seleccionado
            document.getElementById('tab-' + category).classList.add('active', 'bg-primary');
            document.getElementById('tab-' + category).classList.remove('bg-secondary-700');

            // Scroll suave al inicio del contenido
            document.getElementById('content-' + category).scrollIntoView({
                behavior: 'smooth'
                , block: 'nearest'
            });
        }

        // Función para los subtabs de rotación (Córnea, Catarata, Refractiva dentro de Jueves)
        function showRotationSubtab(subtab) {
            // Ocultar todos los contenidos de rotación
            document.querySelectorAll('.rotation-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Remover clase active de todos los subtabs
            document.querySelectorAll('.rotation-subtab').forEach(tab => {
                tab.classList.remove('active-subtab', 'bg-primary', 'text-white');
                tab.classList.add('bg-gray-100', 'text-secondary');
            });

            // Mostrar el contenido seleccionado
            document.getElementById('content-' + subtab).classList.remove('hidden');

            // Activar el subtab seleccionado
            document.getElementById('subtab-' + subtab).classList.add('active-subtab', 'bg-primary', 'text-white');
            document.getElementById('subtab-' + subtab).classList.remove('bg-gray-100', 'text-secondary');
        }

    </script>





    <script>
        // Función principal para cambiar tabs principales
        function showModuleCategory(category) {
            // Ocultar todos los contenidos
            document.querySelectorAll('.module-content').forEach(content => {
                content.classList.add('hidden');
            });

            // Remover clase active de todos los tabs
            document.querySelectorAll('.module-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-primary');
                tab.classList.add('bg-secondary-700');
            });

            // Mostrar el contenido seleccionado
            document.getElementById('content-' + category).classList.remove('hidden');

            // Activar el tab seleccionado
            const activeTab = document.getElementById('tab-' + category);
            activeTab.classList.add('active', 'bg-primary');
            activeTab.classList.remove('bg-secondary-700');
        }

        // Función para subtabs de Tipos de Glaucoma
        function showGlaucomaSubtab(subtab) {
            document.querySelectorAll('.glaucoma-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.glaucoma-subtab').forEach(tab => {
                tab.classList.remove('active-subtab', 'bg-primary', 'text-white');
                tab.classList.add('bg-gray-100', 'text-secondary');
            });

            document.getElementById('content-' + subtab).classList.remove('hidden');

            const activeSubtab = document.getElementById('subtab-' + subtab);
            activeSubtab.classList.add('active-subtab', 'bg-primary', 'text-white');
            activeSubtab.classList.remove('bg-gray-100', 'text-secondary');
        }

        // Función para subtabs de Cirugía
        function showCirugiaSubtab(subtab) {
            document.querySelectorAll('.cirugia-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.cirugia-subtab').forEach(tab => {
                tab.classList.remove('active-subtab', 'bg-primary', 'text-white');
                tab.classList.add('bg-gray-100', 'text-secondary');
            });

            document.getElementById('content-' + subtab).classList.remove('hidden');

            const activeSubtab = document.getElementById('subtab-' + subtab);
            activeSubtab.classList.add('active-subtab', 'bg-primary', 'text-white');
            activeSubtab.classList.remove('bg-gray-100', 'text-secondary');
        }

    </script>



    <script>
        // Tabs principales
        function showModuleCategory(category) {
            document.querySelectorAll('.module-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.module-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-primary');
                tab.classList.add('bg-secondary-700');
            });

            document.getElementById('content-' + category).classList.remove('hidden');

            const activeTab = document.getElementById('tab-' + category);
            activeTab.classList.add('active', 'bg-primary');
            activeTab.classList.remove('bg-secondary-700');
        }

        // Subtabs Vascular
        function showVascularSubtab(subtab) {
            document.querySelectorAll('.vascular-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.vascular-subtab').forEach(tab => {
                tab.classList.remove('active-subtab', 'bg-primary', 'text-white');
                tab.classList.add('bg-gray-100', 'text-secondary');
            });

            document.getElementById('content-' + subtab).classList.remove('hidden');

            const activeSubtab = document.getElementById('subtab-' + subtab);
            activeSubtab.classList.add('active-subtab', 'bg-primary', 'text-white');
            activeSubtab.classList.remove('bg-gray-100', 'text-secondary');
        }

        // Subtabs Desprendimiento
        function showDesprendimientoSubtab(subtab) {
            document.querySelectorAll('.desprendimiento-content').forEach(content => {
                content.classList.add('hidden');
            });

            document.querySelectorAll('.desprendimiento-subtab').forEach(tab => {
                tab.classList.remove('active-subtab', 'bg-primary', 'text-white');
                tab.classList.add('bg-gray-100', 'text-secondary');
            });

            document.getElementById('content-' + subtab).classList.remove('hidden');

            const activeSubtab = document.getElementById('subtab-' + subtab);
            activeSubtab.classList.add('active-subtab', 'bg-primary', 'text-white');
            activeSubtab.classList.remove('bg-gray-100', 'text-secondary');
        }

    </script>
















</body>
</html>
