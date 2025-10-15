<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Alta Especialización en Oftalmología - La Luz Educa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
   
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
</head>

<body class="font-body bg-neutral">
    
<header class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300" id="header">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <div class="flex items-center">
            <a href="{{ url('/') }}" class="block transition-transform duration-300 hover:scale-105">
                <img src="{{ asset('images/logo-fellow1.png') }}" alt="Clínica La Luz" class="w-15 h-10">
            </a>
        </div>

        <!-- Navegación -->
        <nav class="hidden md:flex space-x-8 items-center">
            <a href="#inicio" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Inicio</a>
            <a href="#objetivos" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Objetivos</a>
            <a href="#areas-formacion" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Áreas de Formación</a>
            <a href="#plan-curricular" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Plan Curricular</a>
            <a href="#evaluacion" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Evaluación</a>
            <a href="#contacto" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Contacto</a>

            <!-- 🔹 Botón de Login -->
            <a href="/admin" 
               class="ml-4 bg-[#B11A1A] text-white px-5 py-2 rounded-lg font-semibold hover:bg-[#8B0000] transition-colors duration-300 shadow-sm">
                Iniciar Sesión
            </a>
        </nav>

        <!-- Botón móvil -->
        <button id="menu-toggle" class="md:hidden text-primary p-2 rounded-lg hover:bg-neutral transition-colors duration-300">
            <i class="fas fa-bars text-2xl"></i>
        </button>
    </div>

    <!-- Menú móvil -->
    <nav id="mobile-menu" class="hidden px-4 py-2 bg-white md:hidden">
        <div class="flex flex-col space-y-3">
            <a href="#inicio" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Inicio</a>
            <a href="#objetivos" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Objetivos</a>
            <a href="#areas-formacion" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Áreas de Formación</a>
            <a href="#plan-curricular" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Plan Curricular</a>
            <a href="#evaluacion" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Evaluación</a>
            <a href="#contacto" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Contacto</a>

            <!-- 🔹 Botón de Login en versión móvil -->
            <a href="/admin" 
               class="mt-3 bg-[#B11A1A] text-white px-4 py-2 text-center rounded-lg font-semibold hover:bg-[#8B0000] transition-colors duration-300 shadow-sm">
                Iniciar Sesión
            </a>
        </div>
    </nav>
</header>


    
    <section id="inicio" class="relative overflow-hidden bg-secondary">

        <div class="carousel-container relative h-[600px] md:h-[700px]">
       
            <div class="carousel-slide active absolute inset-0 transition-opacity duration-1000">
                <img src="{{ asset('images/graduacion1.jpg') }}" alt="Graduación Fellows" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                <img src="{{ asset('images/cirugia1.jpg') }}" alt="Cirugía Oftalmológica" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                <img src="{{ asset('images/tecnologia1.jpg') }}" alt="Tecnología Avanzada" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black/50"></div>
            </div>

        
            <div class="absolute inset-0 flex items-center">
                <div class="container mx-auto px-4 md:px-10 relative z-10">
                    <div class="max-w-3xl">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center mr-3">
                                <i class="fas fa-graduation-cap text-white"></i>
                            </div>
                            <span class="text-sm md:text-base font-semibold tracking-wide text-white">La Luz Educa</span>
                        </div>

                        <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight text-white">
                      
                            <span class="text-primary relative inline-block">
                                Especialización
                                <svg class="absolute -bottom-2 left-0 w-full" height="6" viewBox="0 0 200 6" fill="none">
                                    <path d="M0 3C50 0.5 150 0.5 200 3" stroke="#B11A1A" stroke-width="5" stroke-linecap="round" />
                                </svg>
                            </span>
                            <span class="block mt-2">en Oftalmología</span>
                        </h1>

                        <p class="text-white/90 text-lg mb-8 max-w-2xl leading-relaxed">
                            Formamos oftalmólogos y subespecialistas con los más altos estándares de ética y moral, 
                            acreditados por la Universidad César Vallejo y Clínica La Luz.
                        </p>

                        <div class="flex flex-wrap gap-4">
                            <a href="#objetivos" class="inline-flex items-center bg-primary text-white font-bold py-3 px-8 rounded-xl hover:shadow-2xl hover:shadow-primary/30 transition-all duration-300 transform hover:scale-105">
                                <span>Conocer el Programa</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            <a href="#contacto" class="inline-flex items-center border-2 border-white text-white font-bold py-3 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                                <i class="fas fa-envelope mr-2"></i>
                                <span>Contactar</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-3 z-20">
                <button class="carousel-indicator active w-3 h-3 rounded-full bg-white transition-all duration-300" data-slide="0"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 transition-all duration-300" data-slide="1"></button>
                <button class="carousel-indicator w-3 h-3 rounded-full bg-white/50 transition-all duration-300" data-slide="2"></button>
            </div>
        </div>
    </section>

     
    <section id="objetivos" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">I. Objetivos</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Nuestros Objetivos</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                  
                <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-primary hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-bullseye text-white text-xl"></i>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-secondary">Objetivo General</h3>
                    </div>
                    <p class="text-gray-700 leading-relaxed">
                        Ser una sede docente competitiva para formar oftalmólogos y subespecialistas en 
                        <strong>Segmento Anterior, Córnea y Cirugía Refractiva</strong>; 
                        <strong>Córnea, Refractiva y Superficie Ocular</strong>; 
                        <strong>Glaucoma Clínico-Quirúrgico</strong>; 
                        <strong>Retina y Vítreo Clínico-Quirúrgico</strong> a nivel nacional e internacional 
                        con acreditación de la Universidad César Vallejo y Clínica La Luz, para que se conduzcan 
                        con los estándares más altos de ética y moral, tanto en su vida personal como profesional.
                    </p>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg border-l-4 border-secondary hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-list-check text-white text-xl"></i>
                        </div>
                        <h3 class="font-heading text-2xl font-bold text-secondary">Objetivos Específicos</h3>
                    </div>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Capacitar oftalmólogos y subespecialistas nacionales e internacionales en 6 áreas: 
                            Académica, Asistencial, Docente, Investigación Científica, Responsabilidad Social y Marketing en servicios de salud visual.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Estar actualizados con los avances del conocimiento, la ciencia y tecnología en oftalmología, 
                            acreditar y reportar nuestro trabajo asistencial con fines académicos, científicos y protocolizar nuestros servicios.</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3"></i>
                            <span class="text-gray-700">Lograr una formación teórica y práctica en procedimientos y cirugías oftalmológicas 
                            de todos los niveles de complejidad, con tutoría a través de clases, wetlab y cirugías.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

   
    <section id="areas-formacion" class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">II. Áreas de Formación</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Formación Integral en 6 Áreas</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Nuestro programa desarrolla competencias en múltiples dimensiones para formar profesionales completos
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
             
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-book-open text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Académica</h3>
                    <p class="text-gray-600">Formación teórica sólida con actualización constante en los últimos avances científicos y tecnológicos.</p>
                </div>

           
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-secondary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-user-md text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Asistencial</h3>
                    <p class="text-gray-600">Práctica clínica supervisada con exposición a casos de todos los niveles de complejidad.</p>
                </div>

          
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Docente</h3>
                    <p class="text-gray-600">Desarrollo de habilidades pedagógicas para la formación de futuras generaciones de oftalmólogos.</p>
                </div>

           
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-secondary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-microscope text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Investigación Científica</h3>
                    <p class="text-gray-600">Participación activa en proyectos de investigación y publicaciones científicas.</p>
                </div>

               
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-primary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-hands-helping text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Responsabilidad Social</h3>
                    <p class="text-gray-600">Compromiso con la comunidad a través de programas de salud visual y prevención.</p>
                </div>

            
                <div class="bg-white p-6 rounded-xl shadow-lg hover:shadow-xl hover:border-primary border-2 border-transparent transition-all duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-secondary rounded-lg flex items-center justify-center mb-4">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-secondary mb-3">Marketing en Salud Visual</h3>
                    <p class="text-gray-600">Gestión y promoción de servicios oftalmológicos con enfoque ético y profesional.</p>
                </div>
            </div>

            <div class="bg-white p-8 rounded-xl shadow-lg">
                <h3 class="font-heading text-2xl font-bold text-secondary mb-8 text-center">Roles y Responsabilidades por Área</h3>
                
                <div class="space-y-8">
                    
                    <div class="border-l-4 border-secondary pl-6">
                        <h4 class="font-heading text-xl font-bold text-secondary mb-4 flex items-center">
                            <i class="fas fa-stethoscope text-secondary mr-3"></i>
                            Actividades Asistenciales
                        </h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Atender consulta externa normal de acuerdo a la demanda, todos los días en cualquiera de las sedes de la Clínica La Luz, excepto los días quirúrgicos.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Satisfacer a nuestros pacientes, atendiendo con calidad y calidez, reconociendo que el paciente siempre es primero y que define si nuestro servicio crece o desaparece.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                                <span>La consulta externa es un acto médico que tiene la finalidad de prestar un servicio de calidad al paciente dando valor a la marca Clínica La Luz y a la marca de su nombre del médico.</span>
                            </li>
                        </ul>
                    </div>

                     
                    <div class="border-l-4 border-primary pl-6">
                        <h4 class="font-heading text-xl font-bold text-secondary mb-4 flex items-center">
                            <i class="fas fa-chalkboard-teacher text-primary mr-3"></i>
                            Actividades Docentes
                        </h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>El residente mayor apoyará en las charlas al residente menor y rotantes. El fellow mayor apoyará a todos los residentes, rotantes y fellows menores.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Hacer tutoría en el wetlab a los residentes, rotantes y fellows menores.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Hacer tutoría en las cirugías correspondientes de los residentes y fellows menores.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Capacitar al personal de todos los puntos de contacto de la cadena de producción de un servicio.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Participar en la organización de un curso anual para formar promotores de salud ocular dirigido a profesores y dirigentes comunales del programa LUZ PARA TUS OJOS.</span>
                            </li>
                        </ul>
                    </div>

                    
                    <div class="border-l-4 border-primary pl-6">
                        <h4 class="font-heading text-xl font-bold text-secondary mb-4 flex items-center">
                            <i class="fas fa-microscope text-primary mr-3"></i>
                            Actividades de Investigación Científica
                        </h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span><strong>Fellows:</strong> Deben hacer 2 trabajos de investigación por año. <strong>Residentes:</strong> 1 trabajo por año.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Todos los trabajos deberán ser publicados en revistas indexadas de alto impacto y/o presentados en congresos nacionales e internacionales.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Todos los trabajos de investigación deberán presentarse a nombre de la Clínica La Luz.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>El tutor principal de la sede y/o el cirujano principal del trabajo será el autor principal y el residente o Fellow será el coautor.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>La ejecución será por la Clínica La Luz y la publicación será por la gestión de la clínica y/o por los recursos de los investigadores.</span>
                            </li>
                        </ul>
                    </div>

                     
                    <div class="border-l-4 border-primary pl-6">
                        <h4 class="font-heading text-xl font-bold text-secondary mb-4 flex items-center">
                            <i class="fas fa-hands-helping text-primary mr-3"></i>
                            Actividades de Responsabilidad Social
                        </h4>
                        <ul class="space-y-2 text-gray-700">
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Participar en todas las campañas sociales y quirúrgicas del programa social LUZ PARA TUS OJOS.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Realizar charlas preventivo-promocionales de salud visual a los pacientes en cualquiera de las sedes y en atenciones extramurales.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Realizar consultas sociales en cualquiera de las sedes de la Clínica La Luz y en atenciones extramurales.</span>
                            </li>
                            <li class="flex items-start">
                                <i class="fas fa-check-circle text-secondary mt-1 mr-3 flex-shrink-0"></i>
                                <span>Realizar cursos de formación de promotores de salud ocular dirigidos a profesores, dirigentes comunales y promotores de salud integrales.</span>
                            </li>
                        </ul>
                    </div>

                    
                    <div class="border-l-4 border-secondary pl-6">
                        <h4 class="font-heading text-xl font-bold text-secondary mb-4 flex items-center">
                            <i class="fas fa-chart-line text-secondary mr-3"></i>
                            Actividades de Marketing en Servicios de Salud
                        </h4>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="bg-secondary-50 p-4 rounded-lg">
                                <p class="font-semibold text-gray-800 mb-2">Charlas Incluidas:</p>
                                <ul class="space-y-1 text-sm text-gray-700">
                                    <li>• Cómo generar un servicio de calidad con los puntos de contacto</li>
                                    <li>• Cómo hacer un equipo ganador</li>
                                    <li>• Gestión eficiente de una IPRESS de salud visual</li>
                                    <li>• Estrategias de venta</li>
                                    <li>• Cómo definir su personalidad financiera</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- III. Plan Curricular -->
    <section id="plan-curricular" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">III. Plan Curricular</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Programas de Alta Especialización</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            </div>

            <!-- Tabs Navigation -->
            <div class="flex flex-wrap justify-center gap-4 mb-12">
                <button onclick="showProgram('segmento-anterior')" class="program-tab active px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-primary text-white shadow-md">
                    Segmento Anterior
                </button>
                <button onclick="showProgram('glaucoma')" class="program-tab px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-neutral text-secondary shadow-md hover:bg-primary-light hover:text-white">
                    Glaucoma
                </button>
                <button onclick="showProgram('retina')" class="program-tab px-6 py-3 rounded-xl font-semibold transition-all duration-300 bg-neutral text-secondary shadow-md hover:bg-primary-light hover:text-white">
                    Retina y Vítreo
                </button>
            </div>

            <!-- Segmento Anterior Program -->
            <div id="segmento-anterior" class="program-content">
                <div class="bg-white p-8 rounded-xl shadow-lg mb-8 border-2 border-primary">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-eye text-primary mr-3"></i>
                        Segmento Anterior, Córnea y Cirugía Refractiva
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Áreas de Estudio</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Anatomía funcional, inervación y fisiología corneal</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Topografía/Tomografía y OCT de segmento anterior</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Queratitis bacteriana, fúngica y Acanthamoeba</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Queratocono: diagnóstico y tratamiento (Cross-linking, anillos)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Trasplantes corneales: PKP, DALK, DSEK, DMEK, PDEK</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Cirugía de catarata: facoemulsificación y LIOs premium</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Cirugía refractiva: LASIK, PRK, SMILE, ICL</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Plana Docente</h4>
                            <div class="space-y-3">
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Fermín Silva Cayatopa</p>
                                    <p class="text-sm text-gray-600">Director del Programa</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Víctor Viaña Pongo</p>
                                    <p class="text-sm text-gray-600">Jefe del Departamento</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Edgar Gonzales Dávila</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Marilda Macedo Rosas</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Fabiola Custodio Sheen</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-neutral p-6 rounded-lg shadow-md">
                        <h4 class="font-heading text-lg font-bold text-secondary mb-4">Contenido Curricular (52 Temas)</h4>
                        <div class="grid md:grid-cols-3 gap-4 text-sm text-gray-700">
                            <div>
                                <p class="font-bold text-primary mb-2">Córnea</p>
                                <ul class="space-y-1">
                                    <li>• Anatomía y fisiología</li>
                                    <li>• Topografía/Tomografía</li>
                                    <li>• OCT segmento anterior</li>
                                    <li>• Queratitis bacteriana</li>
                                    <li>• Queratitis fúngica</li>
                                    <li>• Queratocono</li>
                                    <li>• Cross-linking</li>
                                    <li>• Anillos intracorneales</li>
                                    <li>• Distrofias corneales</li>
                                    <li>• PKP, DALK, DSEK, DMEK</li>
                                </ul>
                            </div>
                            <div>
                                <p class="font-bold text-primary mb-2">Catarata</p>
                                <ul class="space-y-1">
                                    <li>• Biometría e IOL</li>
                                    <li>• Manejo del astigmatismo</li>
                                    <li>• Facoemulsificación</li>
                                    <li>• Complicaciones intra/post-op</li>
                                    <li>• LIOs premium (EDOF, trifocales)</li>
                                    <li>• Catarata + glaucoma</li>
                                    <li>• Pupila pequeña/IFIS</li>
                                    <li>• Catarata pediátrica</li>
                                </ul>
                            </div>
                            <div>
                                <p class="font-bold text-primary mb-2">Refractiva</p>
                                <ul class="space-y-1">
                                    <li>• Criterios de selección</li>
                                    <li>• LASIK</li>
                                    <li>• PRK/TransPRK</li>
                                    <li>• SMILE</li>
                                    <li>• Wavefront-guided</li>
                                    <li>• ICL/Artisan</li>
                                    <li>• Presbicia</li>
                                    <li>• Ectasia post-láser</li>
                                    <li>• Ojo seco post-refractiva</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Glaucoma Program -->
            <div id="glaucoma" class="program-content hidden">
                <div class="bg-white p-8 rounded-xl shadow-lg mb-8 border-2 border-secondary">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-low-vision text-secondary mr-3"></i>
                        Glaucoma Clínico-Quirúrgico
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Contenido del Programa</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Introducción y epidemiología del glaucoma</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Evaluación clínica del nervio óptico</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Dinámica del humor acuoso y tonometría</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Gonioscopía</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Pruebas funcionales y estructurales</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Glaucoma crónico de ángulo abierto</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Enfermedad por cierre angular primario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                                    <span>Tratamiento médico y quirúrgico (Trabeculectomía, MIGS, implantes)</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Plana Docente</h4>
                            <div class="space-y-3">
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Luisa Bastardo Guillén</p>
                                    <p class="text-sm text-gray-600">Jefa del Departamento</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Meida Espinoza</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Ana Villacorta</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Adolfo Calderón Fernández</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Yoaner Martín Perera</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-neutral p-6 rounded-lg shadow-md">
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Récord Quirúrgico Mínimo</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-center">
                                    <span class="bg-secondary-100 text-secondary font-bold px-3 py-1 rounded-full mr-3">50</span>
                                    <span>Cirugías como ayudante</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="bg-secondary-100 text-secondary font-bold px-3 py-1 rounded-full mr-3">30</span>
                                    <span>Cirugías realizadas tutoreadas</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="bg-secondary-100 text-secondary font-bold px-3 py-1 rounded-full mr-3">50</span>
                                    <span>Procedimientos con láser</span>
                                </li>
                                <li class="flex items-center">
                                    <span class="bg-secondary-100 text-secondary font-bold px-3 py-1 rounded-full mr-3">60</span>
                                    <span>Cirugías de catarata (MININUC/Faco)</span>
                                </li>
                            </ul>
                        </div>

                        <div class="bg-neutral p-6 rounded-lg shadow-md">
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Métodos Diagnósticos</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-microscope text-secondary mt-1 mr-2"></i>
                                    <span>OCT de nervio óptico y células ganglionares (Cirrus)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-microscope text-secondary mt-1 mr-2"></i>
                                    <span>Angio OCT (Cirrus 5000)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-microscope text-secondary mt-1 mr-2"></i>
                                    <span>Campos visuales (Humphrey)</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-microscope text-secondary mt-1 mr-2"></i>
                                    <span>Foto color del nervio óptico</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-microscope text-secondary mt-1 mr-2"></i>
                                    <span>Paquímetros, ecógrafo, UBM</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Retina y Vítreo Program -->
            <div id="retina" class="program-content hidden">
                <div class="bg-white p-8 rounded-xl shadow-lg mb-8 border-2 border-primary">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-6 flex items-center">
                        <i class="fas fa-glasses text-primary mr-3"></i>
                        Retina y Vítreo Clínico-Quirúrgico
                    </h3>
                    
                    <div class="grid md:grid-cols-2 gap-6 mb-8">
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Contenido del Programa</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Anatomía y fisiología de la retina</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Topografía y morfología retiniana</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Circulación retiniana y epitelio pigmentario</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Métodos de evaluación: Fluoresceína, ICG, OCT</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Retinopatía diabética: no proliferativa y proliferativa</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Edema macular diabético</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Oclusiones venosas de la retina</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-secondary mt-1 mr-2"></i>
                                    <span>Desprendimiento de retina: cerclajes y vitrectomía</span>
                                </li>
                            </ul>
                        </div>
                        
                        <div>
                            <h4 class="font-heading text-lg font-bold text-secondary mb-4">Plana Docente</h4>
                            <div class="space-y-3">
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dra. Ibet Mayata</p>
                                    <p class="text-sm text-gray-600">Jefa del Departamento</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Eduardo Zans</p>
                                    <p class="text-sm text-gray-600">CMP 58190 RNE 034997</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Sergio Sánchez</p>
                                    <p class="text-sm text-gray-600">CMP 56718</p>
                                </div>
                                <div class="bg-neutral p-4 rounded-lg shadow">
                                    <p class="font-bold text-secondary">Dr. Eugenio Moya</p>
                                    <p class="text-sm text-gray-600">CMP 59822 RNE 03141</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-neutral p-6 rounded-lg shadow-md">
                        <h4 class="font-heading text-lg font-bold text-secondary mb-4">Temas Principales del Currículo</h4>
                        <div class="grid md:grid-cols-3 gap-4 text-sm text-gray-700">
                            <div>
                                <p class="font-bold text-primary mb-2">Anatomía y Fisiología</p>
                                <ul class="space-y-1">
                                    <li>• Embriología</li>
                                    <li>• Topografía retiniana</li>
                                    <li>• Coroides</li>
                                    <li>• Circulación retiniana</li>
                                    <li>• Epitelio pigmentario</li>
                                    <li>• Bioquímica del vítreo</li>
                                </ul>
                            </div>
                            <div>
                                <p class="font-bold text-primary mb-2">Diagnóstico</p>
                                <ul class="space-y-1">
                                    <li>• Electrofisiología clínica</li>
                                    <li>• Ultrasonografía</li>
                                    <li>• Fluoresceína</li>
                                    <li>• Angiografía ICG</li>
                                    <li>• OCT</li>
                                    <li>• Láser: principios y tipos</li>
                                </ul>
                            </div>
                            <div>
                                <p class="font-bold text-primary mb-2">Patologías</p>
                                <ul class="space-y-1">
                                    <li>• Retinopatía diabética</li>
                                    <li>• Oclusiones venosas</li>
                                    <li>• Desprendimiento de retina</li>
                                    <li>• Retinopatía hipertensiva</li>
                                    <li>• Enfermedad de Coats</li>
                                    <li>• Retinopatía de prematuridad</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- IV. Metas Quirúrgicas Mínimas -->
     <!-- Replacing the Wetlab section with Surgical Goals section -->
    <section class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">IV. Metas Quirúrgicas Mínimas</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Récord Quirúrgico Requerido</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Metas quirúrgicas mínimas que deben cumplir los fellows en cada programa de alta especialización
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                 <!-- Segmento Anterior -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-eye text-white text-xl"></i>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-secondary">Segmento Anterior, Córnea y Cirugía Refractiva</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">MININUC</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">20</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">FACONUC</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">50</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">FACOEMULSIFICACIÓN</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">50</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">Cx con FEMTOSEGUNDO</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">10</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">LIO FÁQUICOS</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">10</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">EXCIMER LASER</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">20</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">FEMTOANILLOS</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">5</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">CROSSLINKING</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">10</span>
                        </div>
                    </div>
                </div>

                 <!-- Glaucoma -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-low-vision text-white text-xl"></i>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-secondary">Glaucoma Clínico-Quirúrgico</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">Cirugías como ayudante</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">50</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">Cirugías tutoreadas</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">30</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">Procedimientos con láser</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">50</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">MININUC/Faco</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">60</span>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-secondary-100 rounded-lg">
                        <p class="text-sm text-gray-700">
                            <strong>Nota:</strong> Incluye trabeculectomía, MIGS, implantes de válvulas y procedimientos combinados.
                        </p>
                    </div>
                </div>

                 <!-- Retina y Vítreo -->
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-glasses text-white text-xl"></i>
                        </div>
                        <h3 class="font-heading text-xl font-bold text-secondary">Retina y Vítreo Clínico-Quirúrgico</h3>
                    </div>
                    
                    <div class="space-y-4">
                        <div class="border-l-4 border-primary pl-4 mb-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Competencias Clínicas</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li>• Manejo de retinopatía diabética con láser fotocoagulador y láser amarillo</li>
                                <li>• Manejo de degeneración macular relacionada a la edad</li>
                                <li>• Manejo de membranas neovasculares y uso de antiangiogénicos</li>
                                <li>• Manejo del edema macular</li>
                                <li>• Manejo de coroidopatía serosa central y variantes</li>
                            </ul>
                        </div>

                        <div class="border-l-4 border-primary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Competencias Quirúrgicas</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li>• Examen exhaustivo de retina en polo posterior y periferia</li>
                                <li>• Tratamiento de lesiones predisponentes</li>
                                <li>• Manejo de pacientes pre y postoperatorios</li>
                                <li>• Manejo de patología variada en retina, vítreo y mácula</li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-6 p-4 bg-primary-100 rounded-lg">
                        <p class="text-sm text-gray-700">
                            <strong>Duración:</strong> Programa de 2 años con énfasis en técnicas avanzadas de vitrectomía y manejo médico-quirúrgico.
                        </p>
                    </div>
                </div>
            </div>

             <!-- Wetlab Training -->
            <div class="mt-12 bg-white p-8 rounded-xl shadow-lg">
                <div class="text-center mb-8">
                    <h3 class="font-heading text-2xl font-bold text-secondary mb-4">Entrenamiento en Wetlab y Cirugía Experimental</h3>
                    <p class="text-gray-600">Programa intensivo de entrenamiento quirúrgico con supervisión constante</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <div class="border-l-4 border-primary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Curso Intensivo Inicial</h4>
                            <p class="text-sm text-gray-700">Un mes antes de empezar, curso de cirugía experimental intensivo de lunes a sábado, 
                            tutoreado por diferentes profesores. Incluye wetlab de Alcon.</p>
                        </div>

                        <div class="border-l-4 border-secondary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Conjuntiva</h4>
                            <p class="text-sm text-gray-700">R1 practica perilimbotomía, puntos para plastia libre y recubrimiento conjuntival.</p>
                        </div>

                        <div class="border-l-4 border-primary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Esclera</h4>
                            <p class="text-sm text-gray-700">Fellows, R2 y R3 practican esclerotomías, flaps esclerales para TEC, válvulas, 
                            fijaciones esclerales e incisiones de MININUC.</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="border-l-4 border-secondary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Córnea</h4>
                            <p class="text-sm text-gray-700">Práctica de incisiones, pockets, túneles corneales para anillos (manual y femtosegundo), 
                            flaps de LASIK, puntos corneales. Fellows practican CLEAR, PKP y trasplantes lamelares.</p>
                        </div>

                        <div class="border-l-4 border-primary pl-4">
                            <h4 class="font-heading font-bold text-secondary mb-2">Cámara Anterior</h4>
                            <p class="text-sm text-gray-700">Primer mes: Capsulorexis, capsulotomía, hidrodisección, facoemulsificación en ojos artificiales. 
                            Segundo mes: Implante de LIO en bolsa, surco, Artisan, fijaciones esclerales, ICL, IPC.</p>
                        </div>

                        <div class="bg-gradient-to-r from-red-600 to-red-700 text-white p-4 rounded-lg">
                            <p class="text-sm font-bold">Requisito: Aprobar examen teórico-práctico de cirugía experimental para iniciar récord quirúrgico.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- V. Evaluación -->
    <section id="evaluacion" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">V. Evaluación</span>
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
                        VI. Duración y Alcance
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-primary-50 rounded-lg border-l-4 border-primary">
                            <span class="text-gray-700 font-medium">Segmento Anterior, Córnea y Cirugía Refractiva</span>
                            <span class="bg-primary text-white font-bold px-4 py-2 rounded-full">1 año</span>
                        </div>
                        <div class="flex items-center justify-between p-4 bg-secondary-50 rounded-lg border-l-4 border-secondary">
                            <span class="text-gray-700 font-medium">Córnea, Refractiva y Superficie Ocular</span>
                            <span class="bg-secondary text-white font-bold px-4 py-2 rounded-full">1 año</span>
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
                        VII. Financiamiento
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
                        VIII. Selección de Postulantes
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
                                <span>Córnea, Refractiva y Superficie Ocular</span>
                                <span class="bg-white text-primary font-bold px-4 py-2 rounded-full">1/año</span>
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
                <span class="text-primary font-bold text-sm uppercase tracking-wide">IX. Estrategia de Entrenamiento</span>
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
                    
                    <div class="grid md:grid-cols-3 gap-4 mb-8">
                        <div class="bg-primary-50 p-4 rounded-lg border-l-4 border-primary">
                            <h4 class="font-bold text-secondary mb-2">1. Exposiciones</h4>
                            <p class="text-sm text-gray-700">Presentaciones académicas y casos clínicos</p>
                        </div>
                        <div class="bg-secondary-50 p-4 rounded-lg border-l-4 border-secondary">
                            <h4 class="font-bold text-secondary mb-2">2. Consultas</h4>
                            <p class="text-sm text-gray-700">Atención clínica supervisada</p>
                        </div>
                        <div class="bg-primary-50 p-4 rounded-lg border-l-4 border-primary">
                            <h4 class="font-bold text-secondary mb-2">3. Investigación Científica</h4>
                            <p class="text-sm text-gray-700">Desarrollo y publicación de trabajos</p>
                        </div>
                        <div class="bg-secondary-50 p-4 rounded-lg border-l-4 border-secondary">
                            <h4 class="font-bold text-secondary mb-2">4. Docencia</h4>
                            <p class="text-sm text-gray-700">Enseñanza a residentes menores</p>
                        </div>
                        <div class="bg-primary-50 p-4 rounded-lg border-l-4 border-primary">
                            <h4 class="font-bold text-secondary mb-2">5. Responsabilidad Social</h4>
                            <p class="text-sm text-gray-700">Campañas y programas comunitarios</p>
                        </div>
                        <div class="bg-secondary-50 p-4 rounded-lg border-l-4 border-secondary">
                            <h4 class="font-bold text-secondary mb-2">6. Marketing en Salud Visual</h4>
                            <p class="text-sm text-gray-700">Gestión de servicios oftalmológicos</p>
                        </div>
                    </div>
                </div>

                <div class="bg-neutral p-6 rounded-xl shadow-md mb-8">
                    <h3 class="font-heading text-xl font-bold text-secondary mb-4">Matriz de Entrenamiento Progresivo</h3>
                    <div class="mb-4">
                        <img src="{{ asset('images/estrategia-ambidiestra.png') }}" alt="Estrategia de Entrenamiento Ambidiestro" class="w-full rounded-lg shadow-lg">
                    </div>
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
                        <p class="text-sm text-gray-600 mb-4">Meses 1-4</p>
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
                        <p class="text-sm text-gray-600 mb-4">Meses 5-8</p>
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
                        <p class="text-sm text-gray-600 mb-4">Meses 9-12</p>
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

     <!-- X. Perspectiva Laboral -->
     <!-- Moving Perspectiva Laboral to its own section after section IX -->
    <section class="py-20 bg-neutral">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-12">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">X. Perspectiva Laboral</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Oportunidades Profesionales</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-12">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-6">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-briefcase text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 class="font-heading text-xl font-bold text-secondary">Empleabilidad</h3>
                            <div class="flex items-center mt-2">
                                <span class="bg-primary-100 text-primary font-bold px-4 py-2 rounded-full text-2xl">100%</span>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-700 mb-4">
                        Nuestros graduados ocupan posiciones de liderazgo en instituciones prestigiosas a nivel nacional e internacional.
                    </p>
                    <ul class="space-y-2 text-gray-700">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                            <span>Clínicas y hospitales de alta complejidad</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                            <span>Práctica privada independiente</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                            <span>Docencia universitaria</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-3 flex-shrink-0"></i>
                            <span>Investigación clínica</span>
                        </li>
                    </ul>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <h3 class="font-heading text-xl font-bold text-secondary mb-6">Ventajas Competitivas</h3>
                    <div class="space-y-4">
                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-star text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-1">Formación Integral</h4>
                                <p class="text-sm text-gray-700">Capacitación en 6 áreas: académica, asistencial, docente, investigación, responsabilidad social y marketing</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-hands text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-1">Habilidades Ambidiestras</h4>
                                <p class="text-sm text-gray-700">Capacidad única de operar con ambas manos, aumentando versatilidad quirúrgica</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-microscope text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-1">Experiencia en Investigación</h4>
                                <p class="text-sm text-gray-700">Publicaciones en revistas indexadas y presentaciones en congresos internacionales</p>
                            </div>
                        </div>

                        <div class="flex items-start">
                            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-certificate text-white"></i>
                            </div>
                            <div>
                                <h4 class="font-bold text-secondary mb-1">Acreditación Reconocida</h4>
                                <p class="text-sm text-gray-700">Certificación por Universidad César Vallejo y Clínica La Luz</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Adding new subsection: Oportunidades en Clínica La Luz -->
            <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                <h3 class="font-heading text-2xl font-bold text-secondary mb-6 text-center">Oportunidades en Clínica La Luz</h3>
                <p class="text-gray-700 text-center mb-8">
                    La Clínica La Luz ofrece a nuestros egresados la posibilidad de trabajar en cualquiera de nuestras sedes 
                    de Lima o de provincias, y también ofrece la posibilidad de participar como asociado o socios en nuestros 
                    proyectos de expansión en el interior del país.
                </p>

                <div class="grid md:grid-cols-3 lg:grid-cols-6 gap-4">
                    <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-primary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">SMP</p>
                        <p class="text-xs text-gray-600">San Martín de Porres</p>
                    </div>
                    <div class="bg-secondary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-secondary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">Central</p>
                        <p class="text-xs text-gray-600">Sede Principal</p>
                    </div>
                    <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-primary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">Breña</p>
                        <p class="text-xs text-gray-600">Lima</p>
                    </div>
                    <div class="bg-secondary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-secondary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">Comas</p>
                        <p class="text-xs text-gray-600">Lima Norte</p>
                    </div>
                    <div class="bg-primary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-primary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">SJL</p>
                        <p class="text-xs text-gray-600">San Juan de Lurigancho</p>
                    </div>
                    <div class="bg-secondary-50 p-4 rounded-lg shadow text-center">
                        <i class="fas fa-hospital text-secondary text-3xl mb-2"></i>
                        <p class="font-bold text-secondary">Tacna</p>
                        <p class="text-xs text-gray-600">Provincia</p>
                    </div>
                </div>

                <div class="mt-6 bg-gradient-to-r from-primary to-secondary text-white p-6 rounded-xl shadow-lg">
                    <div class="flex items-center justify-center">
                        <i class="fas fa-map-marked-alt text-4xl mr-4"></i>
                        <div>
                            <h4 class="font-bold text-lg mb-1">Chiclayo - Próximamente</h4>
                            <p class="text-sm">Nuevas oportunidades de expansión en el norte del país</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adding new section: Testimonios de Egresados -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Testimonios</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Lo Que Dicen Nuestros Egresados</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Historias de éxito de profesionales que han completado nuestros programas de alta especialización
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary">Dr. Juan Pérez</h4>
                            <p class="text-sm text-gray-600">Fellow 2022 - Segmento Anterior</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-quote-left text-secondary text-2xl"></i>
                    </div>
                    <p class="text-gray-700 italic mb-4">
                        "El programa de La Luz Educa transformó mi carrera. La formación ambidiestra y el acceso a tecnología 
                        de punta me han permitido destacar en mi práctica profesional."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary">Dra. María González</h4>
                            <p class="text-sm text-gray-600">Fellow 2021 - Glaucoma</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-quote-left text-primary text-2xl"></i>
                    </div>
                    <p class="text-gray-700 italic mb-4">
                        "La experiencia en investigación y la publication de mis trabajos me abrieron puertas a nivel internacional. 
                        Hoy trabajo en una clínica de prestigio y sigo colaborando con La Luz."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
                    <div class="flex items-center mb-4">
                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mr-4">
                            <i class="fas fa-user-md text-white text-2xl"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-secondary">Dr. Carlos Rodríguez</h4>
                            <p class="text-sm text-gray-600">Fellow 2020 - Retina y Vítreo</p>
                        </div>
                    </div>
                    <div class="mb-4">
                        <i class="fas fa-quote-left text-secondary text-2xl"></i>
                    </div>
                    <p class="text-gray-700 italic mb-4">
                        "El programa de 2 años en retina me dio la confianza y habilidades para manejar casos complejos. 
                        La formación integral en las 6 áreas me convirtió en un profesional completo."
                    </p>
                    <div class="flex text-yellow-400">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

            <div class="bg-gradient-to-r from-primary to-secondary text-white p-8 rounded-xl shadow-lg">
                <div class="grid md:grid-cols-3 gap-6 text-center">
                    <div>
                        <div class="text-4xl font-bold mb-2">7+</div>
                        <p class="text-sm">Sedes en Perú</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">50+</div>
                        <p class="text-sm">Profesores Especialistas</p>
                    </div>
                    <div>
                        <div class="text-4xl font-bold mb-2">100+</div>
                        <p class="text-sm">Fellows Graduados</p>
                    </div>
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
                <h3 class="font-heading text-2xl font-bold text-secondary mb-6 text-center">Estándares Internacionales</h3>
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-600 text-2xl mr-4 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-bold text-secondary mb-2">International Council of Ophthalmology (ICO)</h4>
                            <p class="text-sm text-gray-700">Nuestros programas siguen los estándares académicos y quirúrgicos establecidos por el ICO</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <i class="fas fa-check-circle text-green-600 text-2xl mr-4 flex-shrink-0"></i>
                        <div>
                            <h4 class="font-bold text-secondary mb-2">American Academy of Ophthalmology (AAO)</h4>
                            <p class="text-sm text-gray-700">Cumplimos con las exigencias académicas y quirúrgicas de la AAO para formación de subespecialistas</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Adding new section: Calendario Académico -->
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
    </section>

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
                                <input type="text" id="name" name="name" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="email" class="block text-secondary font-bold mb-2">Email</label>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="phone" class="block text-secondary font-bold mb-2">Teléfono</label>
                                <input type="tel" id="phone" name="phone"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                            </div>
                            <div>
                                <label for="specialty" class="block text-secondary font-bold mb-2">Especialidad de Interés</label>
                                <select id="specialty" name="specialty" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300">
                                    <option value="">Seleccionar...</option>
                                    <option value="segmento-anterior">Segmento Anterior, Córnea y Cirugía Refractiva</option>
                                    <option value="glaucoma">Glaucoma Clínico-Quirúrgico</option>
                                    <option value="retina">Retina y Vítreo Clínico-Quirúrgico</option>
                                </select>
                            </div>
                            <div>
                                <label for="message" class="block text-secondary font-bold mb-2">Mensaje</label>
                                <textarea id="message" name="message" rows="4"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary transition-all duration-300"></textarea>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-primary-dark transition-all duration-300 shadow-lg hover:shadow-xl">
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
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4 md:px-10">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">La Luz Educa</h3>
                    <p class="text-gray-400">Formando a los mejores especialistas en oftalmología con excelencia académica y ética profesional.</p>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#objetivos" class="text-gray-400 hover:text-white transition">Objetivos</a></li>
                        <li><a href="#areas-formacion" class="text-gray-400 hover:text-white transition">Áreas de Formación</a></li>
                        <li><a href="#plan-curricular" class="text-gray-400 hover:text-white transition">Plan Curricular</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="font-bold mb-4">Especialidades</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Segmento Anterior</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Glaucoma</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Retina y Vítreo</a></li>
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

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                    
                    if (!mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Program tabs
        function showProgram(programId) {
            document.querySelectorAll('.program-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            document.querySelectorAll('.program-tab').forEach(tab => {
                tab.classList.remove('active', 'bg-primary', 'text-white');
                tab.classList.add('bg-neutral', 'text-secondary');
            });
            
            document.getElementById(programId).classList.remove('hidden');
            
            event.target.classList.add('active', 'bg-primary', 'text-white');
            event.target.classList.remove('bg-neutral', 'text-secondary');
        }

        function toggleFAQ(button) {
            const answer = button.nextElementSibling;
            const icon = button.querySelector('i');
            
            answer.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

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
                if (i === index) {
                    indicator.classList.add('active', 'bg-white');
                    indicator.classList.remove('bg-white/50');
                } else {
                    indicator.classList.remove('active', 'bg-white');
                    indicator.classList.add('bg-white/50');
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        function startCarousel() {
            // Changed interval to 7000ms (7 seconds) as per the update
            carouselInterval = setInterval(nextSlide, 7000); // 7 seconds between slides
        }

        function stopCarousel() {
            clearInterval(carouselInterval);
        }

        indicators.forEach((indicator, i) => {
            indicator.addEventListener('click', () => {
                currentSlide = i;
                showSlide(currentSlide);
                stopCarousel();
                startCarousel(); // Restart the interval
            });
        });

        // Start carousel on page load
        startCarousel();

        // Pause carousel on hover
        const carouselContainer = document.querySelector('.carousel-container');
        carouselContainer.addEventListener('mouseenter', stopCarousel);
        carouselContainer.addEventListener('mouseleave', startCarousel);

    </script>
</body>
</html>
