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

    <header class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300" id="header">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="{{ url('/') }}" class="block transition-transform duration-300 hover:scale-105">
                    <img src="{{ asset('images/logo-fellow1.png') }}" alt="Clínica La Luz" class="w-15 h-10">
                </a>
            </div>

            <!-- Navegación -->
            <nav class="hidden md:flex space-x-6 items-center">
                <a href="#inicio" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Inicio</a>
                <a href="#objetivos" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Objetivos</a>
                <a href="/centros-quirurgicos" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Centros Quirúrgicos</a>

                <!-- Dropdown: Programa de Alta Especialización -->
                <div class="dropdown">
                    <button class="text-secondary hover:text-primary transition-colors duration-300 font-semibold flex items-center gap-2">
                        Programas
                        <i class="fas fa-chevron-down text-xs"></i>
                    </button>
                    <div class="dropdown-content">
                        <a href="#segmento-anterior-cornea">
                            <i class="fas fa-eye"></i>
                            Segmento Anterior, Córnea y Cirugía Refractiva
                        </a>
                        <a href="#cornea-refractiva-superficie">
                            <i class="fas fa-eye-low-vision"></i>
                            Córnea, Refractiva y Superficie Ocular
                        </a>
                        <a href="#glaucoma">
                            <i class="fas fa-eye-dropper"></i>
                            Glaucoma Clínico-Quirúrgico
                        </a>
                        <a href="#retina-vitreo">
                            <i class="fas fa-microscope"></i>
                            Retina y Vítreo Clínico-Quirúrgico
                        </a>
                    </div>
                </div>

                <a href="#plan-curricular" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Plan Curricular</a>
                <a href="#contacto" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Contacto</a>

                <!-- Botón de Login -->
                <a href="/admin" class="ml-4 bg-[#B11A1A] text-white px-5 py-2 rounded-lg font-semibold hover:bg-[#8B0000] transition-colors duration-300 shadow-sm">
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
                <a href="#testimonios" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Testimonios</a>

                <!-- Dropdown móvil -->
                <div class="border-b border-neutral">
                    <button id="mobile-dropdown-btn" class="flex justify-between items-center w-full text-secondary hover:text-primary transition py-2 font-semibold" onclick="toggleMobileDropdown()">
                        Programas de Especialización
                        <i class="fas fa-chevron-down" id="mobile-dropdown-icon"></i>
                    </button>
                    <div id="mobile-submenu" class="hidden pl-4 space-y-2 pb-2">
                        <a href="#segmento-anterior-cornea" class="block text-secondary hover:text-primary py-2">
                            <i class="fas fa-eye mr-2"></i>Segmento Anterior, Córnea y Cirugía Refractiva
                        </a>
                        <a href="#cornea-refractiva-superficie" class="block text-secondary hover:text-primary py-2">
                            <i class="fas fa-eye-low-vision mr-2"></i>Córnea, Refractiva y Superficie Ocular
                        </a>
                        <a href="#glaucoma" class="block text-secondary hover:text-primary py-2">
                            <i class="fas fa-eye-dropper mr-2"></i>Glaucoma Clínico-Quirúrgico
                        </a>
                        <a href="#retina-vitreo" class="block text-secondary hover:text-primary py-2">
                            <i class="fas fa-microscope mr-2"></i>Retina y Vítreo Clínico-Quirúrgico
                        </a>
                    </div>
                </div>

                <a href="#plan-curricular" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Plan Curricular</a>
                <a href="#contacto" class="text-secondary hover:text-primary transition py-2 border-b border-neutral">Contacto</a>

                <!-- Botón de Login en versión móvil -->
                <a href="/admin" class="mt-3 bg-[#B11A1A] text-white px-4 py-2 text-center rounded-lg font-semibold hover:bg-[#8B0000] transition-colors duration-300 shadow-sm">
                    Iniciar Sesión
                </a>
            </div>
        </nav>
    </header>


    <section id="inicio" class="relative overflow-hidden bg-secondary">

        <div class="carousel-container relative h-[650px] md:h-[750px]">

            <!-- Slide 1: Programa de Alta Especialización -->
            <div class="carousel-slide active absolute inset-0 transition-opacity duration-1000">
                <img src="{{ asset('images/banners de inicio/banner programa de alta especalizacion.jpg') }}" alt="Programa de Alta Especialización" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-transparent"></div>

                <div class="absolute inset-0 flex items-center">
                    <div class="container mx-auto px-4 md:px-10 relative z-10">
                        <div class="max-w-3xl">
                            <!-- Badge identificador -->
                            <div class="inline-flex items-center mb-4 bg-primary/20 backdrop-blur-sm px-5 py-2 rounded-full">
                                <i class="fas fa-graduation-cap text-white mr-2"></i>
                                <span class="text-sm md:text-base font-bold tracking-wide text-white">La Luz Educa</span>
                            </div>

                            <!-- Título principal -->
                            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 leading-tight text-white">
                                Programa de Alta
                                <span class="block text-primary relative inline-block mt-2">
                                    Especialización
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#B11A1A" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                                <span class="block mt-3">en Oftalmología Acreditado por la UCV</span>
                            </h1>

                            <p class="text-white/95 text-lg md:text-xl mb-8 max-w-2xl leading-relaxed">
                                Formación intensiva en subespecialidades oftalmológicas con los más altos
                                estándares académicos. Acreditado por la Universidad César Vallejo y Clínica La Luz.
                            </p>

                            <!-- Especialidades badge -->
                            <div class="flex flex-wrap gap-3 mb-8">
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-eye mr-2"></i>Segmento Anterior, Córnea Y Cirugía Refractiva
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-eye mr-2"></i>Córnea Refractiva Y Superficie Ocular
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-eye-dropper mr-2"></i>Glaucoma Clínico-Quirúrgico
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-microscope mr-2"></i>Retina y Vítreo Clínico-Quirúrgico
                                </span>
                            </div>

                            <!-- Botones CTA -->
                            <div class="flex flex-wrap gap-4">
                                <a href="#programas-especializacion" class="inline-flex items-center bg-primary text-white font-bold py-4 px-8 rounded-xl hover:bg-primary/90 hover:shadow-2xl hover:shadow-primary/30 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-book-open mr-3"></i>
                                    <span>Ver Programas</span>
                                    <i class="fas fa-arrow-right ml-3"></i>
                                </a>
                                <a href="#contacto" class="inline-flex items-center border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                                    <i class="fas fa-envelope mr-3"></i>
                                    <span>Más Información</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Residentado Médico -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                <img src="{{ asset('images/banners de inicio/banner residentado medico.jpg') }}" alt="Residentado Médico en Oftalmología" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-black/60 to-transparent"></div>

                <div class="absolute inset-0 flex items-center">
                    <div class="container mx-auto px-4 md:px-10 relative z-10">
                        <div class="max-w-3xl ml-auto text-right">
                            <!-- Badge identificador -->
                            <div class="inline-flex items-center mb-4 bg-accent/20 backdrop-blur-sm px-5 py-2 rounded-full">
                                <i class="fas fa-user-md text-white mr-2"></i>
                                <span class="text-sm md:text-base font-bold tracking-wide text-white">La Luz Educa</span>
                            </div>

                            <!-- Título principal -->
                            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-extrabold mb-4 leading-tight text-white">
                                Programa de
                                <span class="block text-white relative inline-block mt-2">
                                    <span class="block text-primary relative inline-block mt-2">
                                        Residentado Médico
                                        <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                            <path d="M0 4C50 1 150 1 200 4" stroke="#B11A1A" stroke-width="6" stroke-linecap="round" />
                                        </svg>
                                    </span>

                                    en Oftalmología con respaldo de la UNFV
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#D97706" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </h1>


                            <p class="text-white/95 text-lg md:text-xl mb-8 leading-relaxed">
                                Formación médica especializada con el respaldo académico de
                                <span class="relative inline-block font-bold text-[#FFD700]">
                                    Universidad Nacional Federico Villarreal
                                    <svg class="absolute -bottom-1 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#FFD700" stroke-width="4" stroke-linecap="round" />
                                    </svg>
                                </span>.
                                Este programa de tres años garantiza una preparación integral para médicos oftalmólogos, combinando una sólida base teórica con entrenamiento práctico intensivo, apoyado en tecnología de última generación.
                            </p>

                            <!-- Características badge -->
                            <div class="flex flex-wrap gap-3 mb-8 justify-end">
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-hospital mr-2"></i>Formación Clínica
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-procedures mr-2"></i>Entrenamiento práctico intensivo
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-certificate mr-2"></i>UNFV Acreditado
                                </span>
                            </div>

                            <!-- Botones CTA -->
                            <div class="flex flex-wrap gap-4 justify-end">
                                <a href="#residentado" class="inline-flex items-center bg-accent text-white font-bold py-4 px-8 rounded-xl hover:bg-accent/90 hover:shadow-2xl hover:shadow-accent/30 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-stethoscope mr-3"></i>
                                    <span>Ver Residentado</span>
                                    <i class="fas fa-arrow-right ml-3"></i>
                                </a>
                                <a href="#contacto" class="inline-flex items-center border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                                    <i class="fas fa-phone-alt mr-3"></i>
                                    <span>Contactar</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3 : Cirugía de catarata ambidiestra -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                <img src="{{ asset('images/banners de inicio/banner cirugía ambas manos.jpg') }}" alt="Residentado Médico en Oftalmología" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-l from-black/80 via-black/60 to-transparent"></div>

                <div class="absolute inset-0 flex items-center">
                    <div class="container mx-auto px-4 md:px-10 relative z-10">
                        <div class="max-w-3xl ml-auto text-right">

                            <!-- Badge -->
                            <div class="inline-flex items-center mb-4 bg-accent/20 backdrop-blur-sm px-5 py-2 rounded-full">
                                <i class="fas fa-user-md text-white mr-2"></i>
                                <span class="text-sm md:text-base font-bold tracking-wide text-white">La Luz Educa</span>
                            </div>

                            <!-- Título principal -->
                            <h1 class="font-heading text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight tracking-tight text-white mb-4">
                                <span class="block">
                                    Capacitamos a oftalmólogos para dominar la cirugía de catarata
                                </span>
                                <span class="block text-primary text-5xl md:text-6xl lg:text-7xl font-black mt-2 relative">
                                    con destreza ambidiestra.
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#B11A1A" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </h1>

                            <!-- Texto descriptivo -->
                            <p class="text-white/90 text-lg md:text-xl font-medium leading-relaxed max-w-2xl ml-auto">
                                Una habilidad quirúrgica única que potencia la precisión, versatilidad y seguridad del cirujano,
                                permitiéndole ejecutar procedimientos con igual destreza en ambos hemisferios quirúrgicos
                                y adaptarse con excelencia a cualquier escenario operatorio.
                            </p>

                            <!-- Botones CTA -->
                            <div class="flex flex-wrap gap-4 justify-end mt-6">
                                <a href="#residentado" class="inline-flex items-center bg-accent text-white font-bold py-4 px-8 rounded-xl hover:bg-accent/90 hover:shadow-2xl hover:shadow-accent/30 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-stethoscope mr-3"></i>
                                    <span>Conoce más sobre nuestra malla curricular</span>
                                    <i class="fas fa-arrow-right ml-3"></i>
                                </a>
                                <a href="#contacto" class="inline-flex items-center border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                                    <i class="fas fa-phone-alt mr-3"></i>
                                    <span>Contactar</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Controles del carrusel -->
            <button onclick="changeSlide(-1)" class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-4 rounded-full transition-all duration-300 z-20">
                <i class="fas fa-chevron-left text-xl"></i>
            </button>
            <button onclick="changeSlide(1)" class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 backdrop-blur-sm text-white p-4 rounded-full transition-all duration-300 z-20">
                <i class="fas fa-chevron-right text-xl"></i>
            </button>


        </div>
    </section>

    <section id="objetivos" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <div class="text-center mb-16">

                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Nuestros Objetivos</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            </div>
            <div class="video-container">
                <!-- Video de YouTube con testimonios compilados -->
                <div class="video-container">
                    <iframe width="1088" height="612" src="https://www.youtube.com/embed/gAWP0wb7-JQ" title="Dr. Fermín Silva presenta: Departamento de Capacitación, Docencia e Investigación de Clínica La Luz" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>

                </div>

                <!-- Badge flotante -->

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

                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Áreas de Formación para residentado medico y Fellowship</h2>
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
                <h3 class="font-heading text-2xl font-bold text-secondary mb-8 text-center">Descripción de las áreas de formación</h3>

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

    <!-- ========================================== -->
    <!-- NUEVA SECCIÓN: SEGMENTO ANTERIOR - VIDEO -->
    <!-- ========================================== -->
    <section id="segmento-anterior" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4 md:px-10">
            <!-- Título de la sección -->
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Programa de Especialización</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Segmento Anterior, Córnea y Cirugía Refractiva</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                    Descubre nuestro programa de alta especialización en cirugía de segmento anterior,
                    incluyendo técnicas avanzadas en facoemulsificación y cirugía de córnea.
                </p>
            </div>

            <!-- Video Principal - Grande y Responsivo -->
            <div class="max-w-6xl mx-auto mb-12">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="video-container">
                        <!-- Opción 1: Video de YouTube -->
                        <iframe width="1280" height="720" src="https://www.youtube.com/embed/ZqH8_omBycc" title="Experiencia en programa de alta especialización - Fellowship (Clínica La Luz)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                    </div>
                </div>

            </div>
    </section>

    <!-- ================================================== -->
    <!-- NUEVA SECCIÓN: MÉDICOS/PROFESORES SEGMENTO ANTERIOR -->
    <!-- ================================================== -->
    <section id="profesores-segmento-anterior" class="py-20 bg-white">
        <div class="container mx-auto px-4 md:px-10">
            <!-- Título de la sección -->
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Nuestro Equipo</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                    Profesores de Segmento Anterior, Córnea y Cirugía Refractiva
                </h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">
                    Conoce a nuestros destacados profesionales con amplia experiencia nacional e internacional
                    en cirugía de Segmento Anterior, Córnea y Cirugía Refractiva.
                </p>
            </div>
            <!-- FUNDADOR -->
            <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl shadow-soft overflow-hidden mb-12">
                <div class="grid md:grid-cols-2 gap-0 items-center">
                    <!-- Imagen del Dr. Fermín -->
                    <div class="relative">
                        <img src="{{ asset('images/doctor-fermin.jpg') }}" alt="Dr. Fermín Silva Cayatopa" class="w-full h-full object-cover md:rounded-l-2xl">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/40 to-transparent md:rounded-l-2xl"></div>
                        <div class="absolute bottom-4 left-4 bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-semibold shadow-md">
                            Fundador y Director General
                        </div>
                    </div>

                    <!-- Información -->
                    <div class="p-8 md:p-10">
                        <h3 class="text-3xl font-bold text-secondary mb-2">Dr. Fermín Silva Cayatopa</h3>
                        <p class="text-primary font-semibold mb-3 flex items-center">
                            <i class="fas fa-user-md mr-2"></i>
                            Especialista en Segmento Anterior, Córnea y Cirugía Refractiva
                        </p>
                        <p class="text-gray-700 text-base leading-relaxed mb-5">
                            Fundador del Departamento de Capacitación, Docencia e Investigación de la
                            <strong>Clínica La Luz</strong> (2012).
                            Cirujano oftalmólogo reconocido en cirugía de catarata, córnea y cirugía refractiva,
                            con amplia trayectoria docente y pionero en formación quirúrgica mediante Wet Lab
                            y trasplantes de córnea experimentales.
                        </p>

                        <div class="flex flex-wrap gap-2 mb-6">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Catarata</span>
                            <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Córnea</span>
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Refractiva</span>
                            <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Docencia</span>
                        </div>

                        <div class="flex gap-4">
                            <a href="https://www.instagram.com/ferminsilvaoficial" target="_blank" class="text-secondary hover:text-primary transition"><i class="fab fa-instagram text-2xl"></i></a>
                            <a href="https://www.youtube.com/@ferminsilvaoficial" target="_blank" class="text-secondary hover:text-primary transition"><i class="fab fa-youtube text-2xl"></i></a>
                            <a href="https://www.facebook.com/ferminsilvaoficial" target="_blank" class="text-secondary hover:text-primary transition"><i class="fab fa-facebook text-2xl"></i></a>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Grid de Médicos/Profesores -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">



                <!-- Doctor viaña  -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/doctores con fondo/dr victor viaña 2.jpg') }}" alt="Dra. María García" class="doctor-image">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Dr. Víctor Viaña Pongo</h3>
                        <p class="text-primary font-semibold mb-3">
                            <i class="fas fa-user-md mr-2"></i>
                            Jefe del Departamento Segmento Anterior, Córnea y Cirugía Refractiva
                        </p>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Subespecialista en Cirugía Refractiva y Catarata. Certificada por la Sociedad
                            Panamericana de Oftalmología. Pionera en técnicas de femtosegundo.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">LASIK</span>
                            <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">PRK</span>
                            <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Femtosegundo</span>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Doctor Dr. Edgar Gonzales Dávila  -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/doctores con fondo/dr edgar gonzales 2.jpg') }}" alt="Dr. Carlos Mendoza" class="doctor-image">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Dr. Edgar González Dávila </h3>
                        <p class="text-primary font-semibold mb-3">
                            <i class="fas fa-user-md mr-2"></i>
                            Subespecialista en cirugía de catarata, córnea y cirugía refractiva
                        </p>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Medico Oftalmologo egresado de la universidad San Martín de Porres (USMP), con subespecialidad en Cirugía de Catarata, Córnea y Cirugía Refractiva, Maestria Medico Oftalmologo egresado de la universidad San Martín de Porres (USMP), con subespecialidad en Cirugía de Catarata, Córnea y Cirugía Refractiva, Maestria en Medicina con mencion en oftalmologia. Docente de oftalmologia en pregrado y posgrado por la Universidad Nacional Federico Villareal (UNFV) y la USMP.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Cirugía de catarata </span>
                            <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Córnea</span>
                            <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Refractiva </span>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Doctor Alejandro Silva -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/doctores con fondo/dr alejandro silva 2.jpg') }}" alt="Dr. Juan Pérez" class="doctor-image">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2"> Dr. Alejandro Silva</h3>
                        <p class="text-primary font-semibold mb-3">
                            <i class="fas fa-user-md mr-2"></i>
                            Subespecialista en Segmento Anterior, Córnea y Cirugía Refractiva
                        </p>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Médico cirujano oftalmólogo empático y profesional, con
                            experiencia de pacientes por consulta externa, tópico de Calle
                            emergencia y medicina preventiva, mi objetivo es seguir Sol de la
                            desarrollando habilidades y adquiriendo experiencia, a fin La
                            de continuar creciendo como profesional. Un líder fuerte
                            que trabaja bien bajo presión y en equipo con otros
                            profesionales médicos y no médicos, comprometido a
                            brindar a los pacientes la mejor atención posible.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Catarata</span>
                            <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Córnea</span>
                            <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Refractiva</span>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                </div>
                <!--  Dra. Ana Luisa González Mendes -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/doctores con fondo/dra ana luisa gonzales 2.jpg') }}" alt="Dra. Ana Luisa González Mendes" class="doctor-image">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2"> Dra. Ana Luisa González Mendes</h3>
                        <p class="text-primary font-semibold mb-3">
                            <i class="fas fa-user-md mr-2"></i>
                            Especialista en Superficie Ocular
                        </p>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Fellowship en enfermedades de superficie ocular y ojo seco. Experta en
                            preparación preoperatoria y optimización de resultados quirúrgicos.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Ojo Seco</span>
                            <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Superficie</span>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                </div>
                <!--Dr. Jorge Vega Aquino -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/doctores con fondo/dr vega aquino jorge 2.jpg') }}" alt="Dr. Jorge Vega Aquino" class="doctor-image">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Dr. Jorge Vega Aquino</h3>
                        <p class="text-primary font-semibold mb-3">
                            <i class="fas fa-user-md mr-2"></i>
                            Especialista en Superficie Ocular
                        </p>
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            Fellowship en enfermedades de superficie ocular y ojo seco. Experta en
                            preparación preoperatoria y optimización de resultados quirúrgicos.
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Ojo Seco</span>
                            <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Superficie</span>
                        </div>
                        <div class="flex gap-3 text-gray-600">
                            <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                            <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>

    <!-- ============================================================================ -->
    <!-- SECCIÓN: PLAN CURRICULAR SEGMENTO ANTERIOR, CÓRNEA Y CIRUGÍA REFRACTIVA -->
    <!-- ============================================================================ -->
    <section id="plan-curricular-segmento-anterior" class="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div class="container mx-auto px-4 md:px-10">

            <!-- Encabezado Principal -->
            <div class="text-center mb-16">
                <!-- Badge destacado -->
                <div class="inline-flex items-center justify-center mb-6">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary/20 blur-xl rounded-full"></div>
                        <span class="relative bg-gradient-to-r from-primary to-secondary text-white font-bold text-base uppercase tracking-wider px-8 py-3 rounded-full shadow-lg inline-flex items-center gap-3">
                            <i class="fas fa-graduation-cap text-xl"></i>
                            Plan Curricular
                            <i class="fas fa-book-open text-xl"></i>
                        </span>
                    </div>
                </div>

                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-secondary mb-6 leading-tight">
                    Segmento Anterior, Córnea<br>
                    <span class="text-primary">y Cirugía Refractiva</span>
                </h2>

                <div class="flex items-center justify-center gap-2 mb-6">
                    <div class="w-12 h-1 bg-primary rounded-full"></div>
                    <div class="w-20 h-1.5 bg-primary rounded-full"></div>
                    <div class="w-12 h-1 bg-primary rounded-full"></div>
                </div>

                <p class="text-gray-600 max-w-4xl mx-auto text-lg md:text-xl leading-relaxed">
                    Programa integral de 52 módulos especializados que cubren desde fundamentos
                    hasta técnicas quirúrgicas avanzadas en segmento anterior, córnea y cirugía refractiva.
                </p>
            </div>

            <!-- Estadísticas del Programa -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto mb-16">
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-t-4 border-primary">
                    <div class="text-4xl font-bold text-primary mb-2">52</div>
                    <div class="text-gray-600 text-sm font-semibold">Módulos Especializados</div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-t-4 border-accent">
                    <div class="text-4xl font-bold text-secondary mb-2">12</div>
                    <div class="text-gray-600 text-sm font-semibold">Meses de Duración</div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-t-4 border-secondary">
                    <div class="text-4xl font-bold text-secondary mb-2">60</div>
                    <div class="text-gray-600 text-sm font-semibold">Créditos Académicos</div>
                </div>
                <div class="bg-white rounded-2xl shadow-lg p-6 text-center border-t-4 border-primary">
                    <div class="text-4xl font-bold text-primary mb-2">100%</div>
                    <div class="text-gray-600 text-sm font-semibold">Práctica Quirúrgica</div>
                </div>
            </div>

            <!-- Estructura Académica y Carga Horaria -->
            <div class="max-w-6xl mx-auto mb-16">
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-12 border-2 border-gray-100">
                    <h3 class="text-3xl font-bold text-secondary mb-3 text-center">
                        <i class="fas fa-calendar-alt text-primary mr-3"></i>
                        Estructura Académica y Carga Horaria
                    </h3>
                    <p class="text-center text-gray-600 mb-8 text-lg">
                        Sesiones académicas semanales con malla curricular cíclica que garantiza
                        cobertura del 100% de contenidos en 12 meses
                    </p>

                    <!-- Sesiones Académicas Semanales -->
                    <div class="mb-10">
                        <h4 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                            <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-3">
                                <i class="fas fa-clock text-primary"></i>
                            </div>
                            Sesiones Académicas Fijas (Todo el Año)
                        </h4>

                        <div class="grid md:grid-cols-3 gap-6">
                            <!-- Miércoles -->
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border-2 border-secondary-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-primary rounded-full flex items-center justify-center mr-4 shadow-md">
                                        <i class="fas fa-calendar-day text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-xl text-secondary-900">Miércoles</h5>
                                        <p class="text-primary-700 text-sm font-semibold">07:30 - 09:00</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 mb-3">
                                    <p class="text-gray-700 font-semibold mb-2">
                                        <i class="fas fa-eye text-primary mr-2"></i>
                                        Córnea, Superficie Ocular y refractiva
                                    </p>
                                    <p class="text-gray-600 text-sm">Enfermedad externa y patologías de superficie</p>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="bg-primary text-white px-3 py-1 rounded-full font-semibold">
                                        <i class="far fa-clock mr-1"></i>2 horas
                                    </span>
                                </div>
                            </div>

                            <!-- Jueves -->
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border-2 border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-primary rounded-full flex items-center justify-center mr-4 shadow-md">
                                        <i class="fas fa-calendar-day text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-xl text-secondary-900">Jueves</h5>
                                        <p class="text-secondary-700 text-sm font-semibold">07:30 - 09:00</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 mb-3">
                                    <p class="text-gray-700 font-semibold mb-2">
                                        <i class="fas fa-users text-primary mr-2"></i>
                                        Segmento anterior y superficie ocular
                                    </p>
                                    <p class="text-gray-600 text-sm mb-3">Dos temas (45 min c/u) en rotación:</p>
                                    <div class="flex flex-wrap gap-2">
                                        <span class="text-xs bg-primary-800 text-secondary-800 px-2 py-1 rounded-full">Segmento anterior</span>
                                        <span class="text-xs bg-primary-800 text-secondary-800 px-2 py-1 rounded-full">Córnea</span>
                                        <span class="text-xs bg-primary-800 text-secondary-800 px-2 py-1 rounded-full">Refractiva</span>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="bg-primary text-white px-3 py-1 rounded-full font-semibold">
                                        <i class="far fa-clock mr-1"></i> 2 horas
                                    </span>
                                </div>
                            </div>

                            <!-- Viernes -->
                            <div class="bg-gradient-to-br from-gray-50 to-gray-100 rounded-xl p-6 border-2 border-gray-200 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-center mb-4">
                                    <div class="w-14 h-14 bg-primary rounded-full flex items-center justify-center mr-4 shadow-md">
                                        <i class="fas fa-calendar-day text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <h5 class="font-bold text-xl text-secondary-900">Viernes</h5>
                                        <p class="text-secondary-700 text-sm font-semibold">07:30 - 09:00</p>
                                    </div>
                                </div>
                                <div class="bg-white rounded-lg p-4 mb-3">
                                    <p class="text-gray-700 font-semibold mb-2">
                                        <i class="fas fa-video text-primary  mr-2"></i>
                                        Retos Quirúrgicos
                                    </p>
                                    <ul class="text-gray-600 text-sm space-y-1">
                                        <li>• Videos quirúrgicos</li>

                                    </ul>
                                </div>
                                <div class="flex items-center justify-between text-sm">
                                    <span class="bg-primary text-white px-3 py-1 rounded-full font-semibold">
                                        <i class="far fa-clock mr-1"></i>2 horas
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Información de Ingresos -->
                    <div class="bg-gradient-to-r from-primary/5 to-accent/5 rounded-xl p-8 border-2 border-primary/20">
                        <div class="grid md:grid-cols-2 gap-8">
                            <!-- Ingresos Escalonados -->
                            <div>
                                <h4 class="text-xl font-bold text-secondary mb-4 flex items-center">
                                    <div class="w-10 h-10 bg-primary/10 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-user-plus text-primary"></i>
                                    </div>
                                    Ingresos Escalonados
                                </h4>
                                <div class="space-y-4">
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-secondary mb-1">Frecuencia</p>
                                            <p class="text-gray-600 text-sm">2 fellows cada ~3 meses</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-secondary mb-1">Capacidad Anual</p>
                                            <p class="text-gray-600 text-sm">Máximo 6 fellows por año</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 mt-1 flex-shrink-0">
                                            <i class="fas fa-check text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-secondary mb-1">Duración</p>
                                            <p class="text-gray-600 text-sm">12 meses de formación intensiva</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Malla Cíclica -->
                            <div>
                                <h4 class="text-xl font-bold text-secondary mb-4 flex items-center">
                                    <div class="w-10 h-10 bg-accent/10 rounded-lg flex items-center justify-center mr-3">
                                        <i class="fas fa-sync-alt text-accent"></i>
                                    </div>
                                    Malla Curricular Cíclica
                                </h4>
                                <div class="bg-white rounded-lg p-6 shadow-md border-2 border-accent/20">
                                    <div class="flex items-center justify-center mb-4">
                                        <div class="w-20 h-20 bg-gradient-to-br from-accent to-primary rounded-full flex items-center justify-center shadow-lg">
                                            <span class="text-white font-bold text-2xl">100%</span>
                                        </div>
                                    </div>
                                    <p class="text-center font-semibold text-secondary mb-2">
                                        Cobertura Total de Contenidos
                                    </p>
                                    <p class="text-center text-gray-600 text-sm leading-relaxed">
                                        La malla es cíclica: <strong>cualquier fellow cubre el 100% de los contenidos
                                            en 12 meses</strong>, independientemente de su fecha de ingreso
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Resumen Visual -->
                    <div class="mt-8 grid grid-cols-2 md:grid-cols-4 gap-4">
                        <div class="bg-gradient-to-br  to-secondary rounded-lg p-4 text-center border-2 border-secondary/20">
                            <div class="text-3xl font-bold text-primary mb-1">3</div>
                            <div class="text-xs text-primary font-semibold">Sesiones Semanales</div>
                        </div>
                        <div class="bg-gradient-to-br  to-secondary rounded-lg p-4 text-center border-2 border-secondary/20">
                            <div class="text-3xl font-bold text-purple-600 mb-1">195</div>
                            <div class="text-xs text-purple-800 font-semibold">Minutos por Semana</div>
                        </div>
                        <div class="bg-gradient-to-br  to-secondary rounded-lg p-4 text-center border-2 border-secondary/20">
                            <div class="text-3xl font-bold text-amber-600 mb-1">6</div>
                            <div class="text-xs text-amber-800 font-semibold">Fellows Máximo/Año</div>
                        </div>
                        <div class="bg-gradient-to-br  to-secondary rounded-lg p-4 text-center border-2 border-green-200">
                            <div class="text-3xl font-bold text-green-600 mb-1">52</div>
                            <div class="text-xs text-green-800 font-semibold">Módulos Totales</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Módulos del Programa - Tabs Actualizados -->
            <div class="max-w-7xl mx-auto">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-2 border-gray-100">

                    <!-- Tabs Navigation -->
                    <div class="bg-gradient-to-r from-secondary to-secondary-900 p-4">
                        <div class="flex flex-wrap justify-center gap-3">
                            <button onclick="showModuleCategory('superficie')" id="tab-superficie" class="module-tab active px-6 py-3 rounded-lg font-bold text-white bg-primary transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-eye mr-2"></i>
                                Superficie Ocular
                            </button>
                            <button onclick="showModuleCategory('rotacion')" id="tab-rotacion" class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-sync-alt mr-2"></i>
                                Temas Rotativos (52)
                            </button>
                            <button onclick="showModuleCategory('viernes')" id="tab-viernes" class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-video mr-2"></i>
                                Viernes (Retos & Magistrales)
                            </button>
                            <button onclick="showModuleCategory('wetlab')" id="tab-wetlab" class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300 hover:shadow-lg">
                                <i class="fas fa-hands mr-2"></i>
                                Wet Lab Diario
                            </button>
                        </div>
                    </div>

                    <!-- Tabs Content -->
                    <div class="p-8 md:p-12">

                        <!-- SUPERFICIE OCULAR (Miércoles) -->
                        <div id="content-superficie" class="module-content">
                            <div class="mb-8">
                                <h3 class="text-3xl font-bold text-secondary mb-3">
                                    <i class="fas fa-eye text-primary mr-3"></i>
                                    Superficie Ocular / Enfermedad Externa
                                </h3>
                                <p class="text-gray-600 text-lg mb-4">
                                    <strong>Miércoles 07:30-08:15</strong> (45 minutos) — Guía anual con 13 sesiones especializadas
                                </p>
                                <div class="bg-primary/10 border-l-4 border-primary p-4 rounded-r-lg">
                                    <p class="text-secondary text-sm">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        Sesiones fijas todos los miércoles del año enfocadas en patologías de superficie ocular y manejo avanzado
                                    </p>
                                </div>
                            </div>

                            <!-- Segmento anterior, córnea y cirugia refractiva -->

                            <div class="grid gap-4">

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">01</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Fisiología de Película Lagrimal
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                DEWS II y síntesis clínica de la película lagrimal
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">02</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Blefaritis y Disfunción de Meibomio (MGD)
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Diagnóstico y manejo de disfunción de glándulas de Meibomio
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">03</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Alergia Ocular
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Vernal/atópica (shield ulcer) y estrategias terapéuticas
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">04</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Conjuntivitis Viral/Bacteriana
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Manejo de brotes y control epidemiológico
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">05</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Queratopatía Neurotrófica
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Cenegermin y estrategias protectoras avanzadas
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">06</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                SJS/OCP (Stevens-Johnson/Penfigoide)
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Fases aguda y crónica; manejo multidisciplinario
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">07</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Tumores de Superficie (OSSN)
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Seguimiento con fotografía y citología de impresión
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">08</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Terapias Avanzadas para DED
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                IPL, térmicas, varenicline nasal, perfluorohexyloctane
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">09</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Lentes Esclerales
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Indicaciones en DED severo y queratopatías
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">10</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Exposición Corneal
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Parálisis facial y tarsorrafia temporal
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">11</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Injerto Amniótico
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Aplicación en defectos epiteliales persistentes
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">12</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Punciones/Plugs y Cirugía Lagrimal
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Cirugía básica orientada a superficie ocular
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">13</span>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-lg text-secondary mb-2">
                                                Cirugía de Pterigium
                                            </h4>
                                            <p class="text-gray-600 text-sm">
                                                Técnicas quirúrgicas y prevención de recurrencias
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- TEMAS ROTATIVOS (Jueves - 52 temas) -->
                        <div id="content-rotacion" class="module-content hidden">
                            <div class="mb-8">
                                <h3 class="text-3xl font-bold text-secondary mb-3">
                                    <i class="fas fa-sync-alt text-primary mr-3"></i>
                                    Temas Rotativos por Fellows
                                </h3>
                                <p class="text-gray-600 text-lg mb-4">
                                    <strong>Jueves 07:30-09:00</strong> (90 minutos) — 2 temas de 45 minutos expuestos por fellows
                                </p>
                                <div class="bg-primary/10 border-l-4 border-primary p-4 rounded-r-lg mb-6">
                                    <p class="text-secondary text-sm mb-2">
                                        <i class="fas fa-info-circle mr-2"></i>
                                        <strong>Distribución anual:</strong> 52 temas en rotación balanceada
                                    </p>
                                    <div class="flex flex-wrap gap-3 mt-3">
                                        <span class="bg-primary/20 text-secondary px-3 py-1 rounded-full text-sm font-semibold">
                                            40% Córnea (24 temas)
                                        </span>
                                        <span class="bg-primary/20 text-secondary px-3 py-1 rounded-full text-sm font-semibold">
                                            30% Catarata (16 temas)
                                        </span>
                                        <span class="bg-primary/20 text-secondary px-3 py-1 rounded-full text-sm font-semibold">
                                            30% Refractiva (12 temas)
                                        </span>
                                    </div>
                                </div>

                                <!-- Subtabs para Córnea, Catarata, Refractiva -->
                                <div class="flex flex-wrap gap-2 mb-6">
                                    <button onclick="showRotationSubtab('cornea-rot')" id="subtab-cornea-rot" class="rotation-subtab active-subtab px-4 py-2 rounded-lg font-semibold text-white bg-primary text-sm">
                                        Córnea (24)
                                    </button>
                                    <button onclick="showRotationSubtab('catarata-rot')" id="subtab-catarata-rot" class="rotation-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                        Catarata (16)
                                    </button>
                                    <button onclick="showRotationSubtab('refractiva-rot')" id="subtab-refractiva-rot" class="rotation-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                        Refractiva (12)
                                    </button>
                                </div>
                            </div>

                            <!-- Córnea (1-24) -->
                            <div id="content-cornea-rot" class="rotation-content">
                                <h4 class="text-xl font-bold text-primary mb-4">Módulos de Córnea (1-24)</h4>
                                <div class="grid gap-3">
                                    <!-- Aquí van los 24 temas de córnea que ya creaste anteriormente -->
                                    <!-- Módulo 1 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">01</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Anatomía Funcional de la Córnea</h5>
                                                <p class="text-gray-600 text-sm">Anatomía funcional, inervación y fisiología epitelial/endotelial</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 2 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">02</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Topografía/Tomografía</h5>
                                                <p class="text-gray-600 text-sm">Interpretación clínica para diagnóstico de ectasias</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 3 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">03</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">OCT de Segmento Anterior</h5>
                                                <p class="text-gray-600 text-sm">OCT y microscopía especular</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 4 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">04</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Queratitis Bacteriana</h5>
                                                <p class="text-gray-600 text-sm">Diagnóstico, cultivos y tratamiento antibiótico</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 5 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">05</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Queratitis Fúngica y Acanthamoeba</h5>
                                                <p class="text-gray-600 text-sm">Abordaje diagnóstico y terapias específicas</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 6 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">06</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Queratocono</h5>
                                                <p class="text-gray-600 text-sm">Diagnóstico temprano y estratificación de riesgo</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 7 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">07</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Cross-linking Corneal</h5>
                                                <p class="text-gray-600 text-sm">Estándar, acelerado y transepitelial</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 8 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">08</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Anillos Intracorneales</h5>
                                                <p class="text-gray-600 text-sm">Selección y análisis de resultados</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 9 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">09</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Distrofias Corneales</h5>
                                                <p class="text-gray-600 text-sm">Anterior, estromal y endotelial</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 10 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">10</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">PKP (Queratoplastia Penetrante)</h5>
                                                <p class="text-gray-600 text-sm">Técnica quirúrgica, indicaciones y complicaciones</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 11 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">11</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">BLT-PTK y SALK</h5>
                                                <p class="text-gray-600 text-sm">Queratectomía fototerapéutica y queratoplastia anterior superficial</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 12 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">12</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">DALK</h5>
                                                <p class="text-gray-600 text-sm">Queratoplastia Lamelar Anterior Profunda</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 13 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">13</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">DSEK y UT-DSEK</h5>
                                                <p class="text-gray-600 text-sm">Queratoplastia endotelial estándar y ultrafina</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 14 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">14</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">DMEK y PDEK</h5>
                                                <p class="text-gray-600 text-sm">Queratoplastia endotelial de membrana de Descemet y pre-descemética</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 15 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">15</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Cirugía Combinada</h5>
                                                <p class="text-gray-600 text-sm">Córnea y cristalino (triple procedimiento)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 16 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">16</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Astigmatismo Post-PKP</h5>
                                                <p class="text-gray-600 text-sm">Manejo y corrección</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 17 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">17</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Rechazo del Injerto</h5>
                                                <p class="text-gray-600 text-sm">Inmunología y profilaxis</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 18 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">18</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Trauma Corneal</h5>
                                                <p class="text-gray-600 text-sm">Laceraciones, perforaciones (cianoacrilato/AMT)</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 19 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">19</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Trasplante Límbico</h5>
                                                <p class="text-gray-600 text-sm">CLAU/KLAL y reconstrucción de superficie</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 20 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">20</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Queratoplastia vs Queratoprótesis</h5>
                                                <p class="text-gray-600 text-sm">Boston KPro: indicaciones y seguimiento</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 21 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">21</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Úlceras Recalcitrantes</h5>
                                                <p class="text-gray-600 text-sm">Manejo y queratomicosis profundas</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 22 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">22</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Complicaciones Post-Queratoplastia</h5>
                                                <p class="text-gray-600 text-sm">Desprendimiento y fallo endotelial</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 23 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">23</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Inmunomoduladores Sistémicos</h5>
                                                <p class="text-gray-600 text-sm">Manejo perioperatorio</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Módulo 24 -->
                                    <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-4 hover:shadow-lg transition-all duration-300">
                                        <div class="flex items-start gap-3">
                                            <div class="flex-shrink-0 w-12 h-12 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                                <span class="text-white font-bold">24</span>
                                            </div>
                                            <div class="flex-1">
                                                <h5 class="font-bold text-secondary mb-1">Interfase Córnea-Cristalino</h5>
                                                <p class="text-gray-600 text-sm">Decisiones combinadas (triple, secuencial)</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <!-- Catarata (25-40) - content similar pero más compacto -->
                            <div id="content-catarata-rot" class="rotation-content hidden">
                                <h4 class="text-xl font-bold text-accent mb-4">Módulos de Catarata (25-40)</h4>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">25</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Biometría e IOL</h5>
                                                <p class="text-xs text-gray-600">Fórmulas modernas y optimización</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">26</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Manejo del Astigmatismo</h5>
                                                <p class="text-xs text-gray-600">LIO tórica, LRIs y femto-arcuatas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">27</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Técnicas de Facoemulsificación</h5>
                                                <p class="text-xs text-gray-600">Divide & conquer, chop</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">28</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Complicaciones Intraoperatorias</h5>
                                                <p class="text-xs text-gray-600">Rotura capsular, pérdida vítrea</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">29</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Complicaciones Postoperatorias</h5>
                                                <p class="text-xs text-gray-600">Endoftalmitis, EMQ, PCO</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">30</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">LIOs Premium</h5>
                                                <p class="text-xs text-gray-600">EDOF, trifocales, monofocales mejoradas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">31</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Lentes Ajustables</h5>
                                                <p class="text-xs text-gray-600">Manejo de sorpresas refractivas</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">32</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Cálculo en Post-Refractiva</h5>
                                                <p class="text-xs text-gray-600">LASIK/PRK/RK previo</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">33</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Catarata + Glaucoma</h5>
                                                <p class="text-xs text-gray-600">MIGS/filtrantes</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">34</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Pupila Pequeña/IFIS</h5>
                                                <p class="text-xs text-gray-600">Debilidad zonular (CTR/CTRs)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">35</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Cataratas Secundarias</h5>
                                                <p class="text-xs text-gray-600">Exchange de LIO, fijación escleral</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">36</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Catarata Pediátrica/Traumática</h5>
                                                <p class="text-xs text-gray-600">Principios clave</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">37</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Gestión de Resultados</h5>
                                                <p class="text-xs text-gray-600">Auditoría de calidad</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">38</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Cirugía Refractiva del Cristalino</h5>
                                                <p class="text-xs text-gray-600">RLE estrategias</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">39</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Córneas Irregulares</h5>
                                                <p class="text-xs text-gray-600">Manejo en cicatrices</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-accent rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-accent rounded flex items-center justify-center text-white text-xs font-bold">40</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Ética y Consentimiento</h5>
                                                <p class="text-xs text-gray-600">Cirugía premium</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Refractiva (41-52) -->
                            <div id="content-refractiva-rot" class="rotation-content hidden">
                                <h4 class="text-xl font-bold text-secondary mb-4">Módulos de Cirugía Refractiva (41-52)</h4>
                                <div class="grid md:grid-cols-2 gap-3">
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">41</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Criterios de Selección</h5>
                                                <p class="text-xs text-gray-600">Consejería preoperatoria</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">42</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">LASIK</h5>
                                                <p class="text-xs text-gray-600">Plan, flap, complicaciones, retratamientos</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">43</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">PRK/TransPRK</h5>
                                                <p class="text-xs text-gray-600">Indicaciones, MMC, manejo de haze</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">44</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">SMILE</h5>
                                                <p class="text-xs text-gray-600">Indicaciones, técnica, complicaciones</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">45</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Topo/Wavefront-Guided</h5>
                                                <p class="text-xs text-gray-600">HOA y casos irregulares</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">46</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">ICL/Artisan</h5>
                                                <p class="text-xs text-gray-600">Selección (ACD, ECD), complicaciones</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">47</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Presbicia</h5>
                                                <p class="text-xs text-gray-600">Monovisión, PresbyLASIK, inlays</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">48</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Ectasia Post-Láser</h5>
                                                <p class="text-xs text-gray-600">Prevención y manejo (CXL)</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">49</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Ojo Seco Post-Refractiva</h5>
                                                <p class="text-xs text-gray-600">Prevención y tratamiento</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">50</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Casos Especiales</h5>
                                                <p class="text-xs text-gray-600">Alto miópe/hipermétrope, astigmatismo irregular</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">51</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">IA y Algoritmos Emergentes</h5>
                                                <p class="text-xs text-gray-600">Planificación y visión al futuro</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg-white border-l-4 border-secondary rounded-lg p-3 hover:shadow-md transition-all">
                                        <div class="flex items-center gap-2">
                                            <span class="flex-shrink-0 w-8 h-8 bg-secondary rounded flex items-center justify-center text-white text-xs font-bold">52</span>
                                            <div>
                                                <h5 class="font-semibold text-sm text-secondary">Paciente Insatisfecho</h5>
                                                <p class="text-xs text-gray-600">Manejo y calidad de vida</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- RETOS QUIRÚRGICOS Y CHARLAS MAGISTRALES (Viernes) -->
                        <div id="content-viernes" class="module-content hidden">
                            <div class="mb-8">
                                <h3 class="text-3xl font-bold text-primary mb-3 flex items-center">
                                    <i class="fas fa-video text-primary mr-3"></i>
                                    Retos Quirúrgicos y Charlas Magistrales
                                </h3>
                                <p class="text-gray-700 text-lg mb-4">
                                    <strong>Viernes 07:30-08:30</strong> (60 minutos) — Sesiones especializadas
                                </p>
                            </div>

                            <div class="grid md:grid-cols-2 gap-8">
                                <!-- Retos Quirúrgicos -->
                                <div class="bg-gradient-to-br from-neutral to-white rounded-2xl p-8 border-2 border-primary/20 shadow-soft">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mr-4 shadow-md">
                                            <i class="fas fa-procedures text-white text-2xl"></i>
                                        </div>
                                        <h4 class="text-2xl font-bold text-secondary">Retos Quirúrgicos</h4>
                                    </div>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <i class="fas fa-video text-primary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Videos Quirúrgicos</h5>
                                                <p class="text-sm text-gray-600">Análisis de casos complejos y técnicas avanzadas</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-heartbeat text-primary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Morbilidad y Mortalidad (M&M)</h5>
                                                <p class="text-sm text-gray-600">Discusión de complicaciones y lecciones aprendidas</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-microscope text-primary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Presentación de Casos Complejos</h5>
                                                <p class="text-sm text-gray-600">Resolución de problemas clínicos y quirúrgicos</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Charlas Magistrales -->
                                <div class="bg-gradient-to-br from-neutral to-white rounded-2xl p-8 border-2 border-primary/20 shadow-soft">
                                    <div class="flex items-center mb-6">
                                        <div class="w-16 h-16 bg-secondary rounded-full flex items-center justify-center mr-4 shadow-md">
                                            <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                                        </div>
                                        <h4 class="text-2xl font-bold text-secondary">Charlas Magistrales</h4>
                                    </div>
                                    <ul class="space-y-4">
                                        <li class="flex items-start">
                                            <i class="fas fa-user-tie text-secondary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Expertos Invitados</h5>
                                                <p class="text-sm text-gray-600">Conferencias con especialistas nacionales e internacionales</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-lightbulb text-secondary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Temas Complementarios</h5>
                                                <p class="text-sm text-gray-600">Actualización en tecnologías y tendencias emergentes</p>
                                            </div>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-flask text-secondary mt-1 mr-3"></i>
                                            <div>
                                                <h5 class="font-semibold text-secondary mb-1">Investigación y Evidencia</h5>
                                                <p class="text-sm text-gray-600">Últimos estudios y medicina basada en evidencia</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div class="mt-8 bg-gradient-to-r from-primary/10 to-secondary/10 rounded-xl p-6 border border-primary/30 text-center">
                                <p class="text-gray-700 font-semibold">
                                    <i class="fas fa-info-circle text-primary mr-2"></i>
                                    Estas sesiones complementan la formación teórica con experiencia práctica y conocimiento de vanguardia.
                                </p>
                            </div>
                        </div>





                        <!-- WET LAB DIARIO -->
                        <div id="content-wetlab" class="module-content hidden">
                            <div class="mb-8">
                                <h3 class="text-3xl font-bold text-primary mb-3 flex items-center">
                                    <i class="fas fa-hands text-primary mr-3"></i>
                                    Entrenamiento Práctico Diario (Wet Lab)
                                </h3>
                                <p class="text-gray-700 text-lg mb-4">
                                    <strong>De lunes a jueves desde las 17:00</strong> — Bloques de 2-3 horas de entrenamiento quirúrgico intensivo
                                </p>
                                <div class="bg-primary/10 border-l-4 border-primary p-4 rounded-r-lg">
                                    <p class="text-secondary text-sm">
                                        <i class="fas fa-star text-primary mr-2"></i>
                                        Cada mes se enfoca intensivamente en una técnica quirúrgica específica con evaluación continua.
                                    </p>
                                </div>
                            </div>

                            <!-- Características -->
                            <div class="grid md:grid-cols-3 gap-6 mb-8">
                                <div class="bg-neutral rounded-xl p-6 text-center border border-primary/20 shadow-soft">
                                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-calendar-check text-white text-3xl"></i>
                                    </div>
                                    <h4 class="font-bold text-xl text-secondary mb-2">Diario</h4>
                                    <p class="text-gray-600 text-sm">2-3 horas cada tarde</p>
                                </div>

                                <div class="bg-neutral rounded-xl p-6 text-center border border-primary/20 shadow-soft">
                                    <div class="w-20 h-20 bg-secondary rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-eye text-white text-3xl"></i>
                                    </div>
                                    <h4 class="font-bold text-xl text-secondary mb-2">50+ Ojos</h4>
                                    <p class="text-gray-600 text-sm">Mínimo por módulo mensual</p>
                                </div>

                                <div class="bg-neutral rounded-xl p-6 text-center border border-primary/20 shadow-soft">
                                    <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                                        <i class="fas fa-user-check text-white text-3xl"></i>
                                    </div>
                                    <h4 class="font-bold text-xl text-secondary mb-2">Tutorizado</h4>
                                    <p class="text-gray-600 text-sm">Supervisión y corrección continua</p>
                                </div>
                            </div>

                            <!-- Ciclo Mensual -->
                            <div class="bg-white rounded-2xl p-8 shadow-soft border border-primary/10 mb-8">
                                <h4 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                                    <i class="fas fa-calendar-alt text-primary mr-3"></i>
                                    Ciclo Mensual de Técnicas Quirúrgicas
                                </h4>

                                <div class="grid md:grid-cols-2 gap-4">
                                    <!-- Ítem genérico -->
                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">1</span>
                                            Cirugía intracapsular (ICC)
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">2</span>
                                            Cirugía extracapsular manual (Mininuc)
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">3</span>
                                            Facoemulsificación
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">4</span>
                                            Facoláser y LIOs especiales
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">5</span>
                                            Implante de LIO retropupilar
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">6</span>
                                            Implante de LIO con fijación escleral
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">7</span>
                                            Trasplante de córnea (PKP)
                                        </h5>
                                    </div>

                                    <div class="bg-neutral rounded-lg p-5 border-l-4 border-primary">
                                        <h5 class="font-bold text-secondary mb-2 flex items-center">
                                            <span class="bg-primary text-white rounded-full w-8 h-8 flex items-center justify-center mr-3 text-sm">8</span>
                                            Técnicas combinadas
                                        </h5>
                                    </div>
                                </div>
                            </div>

                            <!-- Evaluación -->
                            <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-8 border border-primary/30">
                                <h4 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                                    <i class="fas fa-clipboard-check text-primary mr-3"></i>
                                    Sistema de Evaluación Continua
                                </h4>

                                <div class="grid md:grid-cols-2 gap-6">
                                    <div class="bg-white rounded-xl p-6 shadow-soft">
                                        <h5 class="font-bold text-lg text-secondary mb-4 flex items-center">
                                            <i class="fas fa-calendar-week text-primary mr-2"></i>
                                            Evaluaciones Semanales
                                        </h5>
                                        <ul class="space-y-3 text-sm">
                                            <li class="flex items-start">
                                                <span class="bg-primary/10 text-primary rounded-full w-10 h-10 flex items-center justify-center mr-3 font-bold text-sm flex-shrink-0">S1-3</span>
                                                <div>
                                                    <p class="font-semibold text-secondary">Semanas 1-3</p>
                                                    <p class="text-gray-600 text-xs">Evaluación por Jefe de Fellows</p>
                                                </div>
                                            </li>
                                            <li class="flex items-start">
                                                <span class="bg-secondary/10 text-secondary rounded-full w-10 h-10 flex items-center justify-center mr-3 font-bold text-sm flex-shrink-0">S4</span>
                                                <div>
                                                    <p class="font-semibold text-secondary">Semana 4</p>
                                                    <p class="text-gray-600 text-xs">Evaluación por Docente Especialista</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="bg-white rounded-xl p-6 shadow-soft">
                                        <h5 class="font-bold text-lg text-secondary mb-4 flex items-center">
                                            <i class="fas fa-book text-primary mr-2"></i>
                                            Registro Quirúrgico
                                        </h5>
                                        <ul class="space-y-3 text-sm text-gray-700">
                                            <li class="flex items-start"><i class="fas fa-check-circle text-primary mr-2 mt-1"></i>Bitácora detallada de casos</li>
                                            <li class="flex items-start"><i class="fas fa-check-circle text-primary mr-2 mt-1"></i>Logbook de procedimientos realizados</li>
                                            <li class="flex items-start"><i class="fas fa-check-circle text-primary mr-2 mt-1"></i>Certificación progresiva de competencias</li>
                                            <li class="flex items-start"><i class="fas fa-check-circle text-primary mr-2 mt-1"></i>Cobertura total de objetivos anuales</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="mt-6 bg-white rounded-lg p-5 border border-primary/20">
                                    <p class="text-center text-gray-700">
                                        <i class="fas fa-trophy text-primary mr-2"></i>
                                        <strong>Objetivo:</strong> Certificar competencia progresiva en cada técnica antes de avanzar al siguiente módulo.
                                    </p>
                                </div>
                            </div>

                            <!-- Beneficios -->
                            <div class="mt-8 bg-gradient-to-r from-primary to-secondary rounded-2xl p-8 text-white">
                                <h4 class="text-2xl font-bold mb-4 flex items-center">
                                    <i class="fas fa-medal mr-3"></i>
                                    Beneficios Comprobados del Wet Lab
                                </h4>
                                <div class="grid md:grid-cols-3 gap-4 text-sm">
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <i class="fas fa-chart-line text-3xl mb-2"></i>
                                        <p><strong>Mejora significativa</strong> en destreza quirúrgica antes de operar en vivo.</p>
                                    </div>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <i class="fas fa-shield-alt text-3xl mb-2"></i>
                                        <p><strong>Entorno seguro</strong> para practicar sin riesgo para pacientes.</p>
                                    </div>
                                    <div class="bg-white/10 rounded-lg p-4 backdrop-blur-sm">
                                        <i class="fas fa-graduation-cap text-3xl mb-2"></i>
                                        <p><strong>Aprendizaje acelerado</strong> con retroalimentación inmediata del tutor.</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- Botones de Acción Final -->
            <div class="max-w-4xl mx-auto mt-16 text-center">
                <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-12 text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-4">¿Listo para Especializarte?</h3>
                    <p class="text-lg mb-8 opacity-90">
                        Descarga el plan curricular completo o contáctanos para más información sobre el proceso de admisión
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">

                        <!-- descafrgar 
                        <a href="#" class="inline-flex items-center bg-white text-primary font-bold py-4 px-8 rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                            <i class="fas fa-file-pdf mr-3 text-xl"></i>
                            <span>Descargar PDF Completo</span>
                        </a>
                        -->
                        <a href="#contacto" class="inline-flex items-center bg-white/20 backdrop-blur-md border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                            <i class="fas fa-envelope mr-3 text-xl"></i>
                            <span>Contactar</span>
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>








    <!-- ================================ -->
    <!-- NUEVA SECCIÓN: CÓRNEA  Y CIRUGIA REFRACTIVA -->
    <!-- ================================ -->

    <section id="profesores-segmento-anterior" class="py-20 bg-white">

        <div class="container mx-auto px-4 md:px-10">
            <!-- Título de la sección -->
            <div class="text-center mb-16">
                <span class="text-primary font-bold text-sm uppercase tracking-wide">Programa de Especialización</span>
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Córnea, Refractiva y Superficie Ocular</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                    Descubre nuestro programa de alta especialización en Córnea, Refractiva y Superficie Ocular.
                </p>
            </div>

            <!-- Video Principal - Grande y Responsivo -->
            <div class="max-w-6xl mx-auto mb-12">
                <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                    <div class="video-container">
                        <!-- Opción 1: Video de YouTube -->
                        <iframe width="1280" height="720" src="https://www.youtube.com/embed/ZqH8_omBycc" title="Experiencia en programa de alta especialización - Fellowship (Clínica La Luz)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>


                    </div>
                </div>

            </div>
            <div class="container mx-auto px-4 md:px-10">
                <!-- Título de la sección -->
                <div class="text-center mb-16">
                    <span class="text-primary font-bold text-sm uppercase tracking-wide">Nuestro Equipo</span>
                    <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">
                        Profesores de Córnea, Refractiva y Superficie Ocular
                    </h2>
                    <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                    <p class="text-gray-600 max-w-3xl mx-auto">
                        Conoce a nuestros destacados profesionales con amplia experiencia nacional e internacional
                        en cirugía de Córnea, Refractiva y Superficie Ocular.
                    </p>
                </div>

                <!-- Grid de Médicos/Profesores -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Doctor Fermin Silva -->
                    <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/doctores con fondo/dr fermín 2.jpg') }}" alt="Dr. Juan Pérez" class="doctor-image">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-2"> Dr. Fermín Silva Cayatopa</h3>
                            <p class="text-primary font-semibold mb-3">
                                <i class="fas fa-user-md mr-2"></i>
                                Especialista en Segmento Anterior
                            </p>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                Subespecialista de Segmento Anterior, Córnea y Cirugía Refractiva.
                                Fundador del departamento de capacitacion, docencia e investigacion de la Clinica La Luz en el 2012
                                Profesor de cirugía experimental de trasplantes de cornea totales y lamelares en ojos de cerdo
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Catarata</span>
                                <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Córnea</span>
                                <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Refractiva</span>
                            </div>
                            <div class="flex gap-3 text-gray-600">
                                <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                                <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Doctor Alejandro Silva -->
                    <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/doctores con fondo/dr alejandro silva 2.jpg') }}" alt="Dr. Juan Pérez" class="doctor-image">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-2"> Dr. Alejandro Silva</h3>
                            <p class="text-primary font-semibold mb-3">
                                <i class="fas fa-user-md mr-2"></i>
                                Subespecialista en Segmento Anterior, Córnea y Cirugía Refractiva
                            </p>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                Médico cirujano oftalmólogo empático y profesional, con
                                experiencia de pacientes por consulta externa, tópico de Calle
                                emergencia y medicina preventiva, mi objetivo es seguir Sol de la
                                desarrollando habilidades y adquiriendo experiencia, a fin La
                                de continuar creciendo como profesional. Un líder fuerte
                                que trabaja bien bajo presión y en equipo con otros
                                profesionales médicos y no médicos, comprometido a
                                brindar a los pacientes la mejor atención posible.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Catarata</span>
                                <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Córnea</span>
                                <span class="text-xs bg-secondary/10 text-secondary px-3 py-1 rounded-full">Refractiva</span>
                            </div>
                            <div class="flex gap-3 text-gray-600">
                                <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                                <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                            </div>
                        </div>
                    </div>
                    <!--  Dra. Ana Luisa González Mendes -->
                    <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                        <img src="{{ asset('images/doctores con fondo/dra ana luisa gonzales 2.jpg') }}" alt="Dra. Ana Luisa González Mendes" class="doctor-image">
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-secondary mb-2"> Dra. Ana Luisa González Mendes</h3>
                            <p class="text-primary font-semibold mb-3">
                                <i class="fas fa-user-md mr-2"></i>
                                Especialista en Superficie Ocular
                            </p>
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                Fellowship en enfermedades de superficie ocular y ojo seco. Experta en
                                preparación preoperatoria y optimización de resultados quirúrgicos.
                            </p>
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span class="text-xs bg-primary/10 text-primary px-3 py-1 rounded-full">Ojo Seco</span>
                                <span class="text-xs bg-accent/10 text-accent px-3 py-1 rounded-full">Superficie</span>
                            </div>
                            <div class="flex gap-3 text-gray-600">
                                <a href="#" class="hover:text-primary transition"><i class="fab fa-linkedin text-xl"></i></a>
                                <a href="#" class="hover:text-primary transition"><i class="fas fa-envelope text-xl"></i></a>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
    </section>

<!-- ================================ -->
<!-- SECCIÓN: GLAUCOMA -->
<!-- ================================ -->
<section id="glaucoma" class="py-20 bg-gray-50">
    <div class="container mx-auto px-4 md:px-10">
        
        <!-- Título de la sección -->
        <div class="text-center mb-16">
            <span class="text-primary font-bold text-sm uppercase tracking-wide">Programa de Especialización</span>
            <h2 class="font-heading text-3xl md:text-4xl font-bold text-secondary mt-2 mb-4">Glaucoma</h2>
            <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto text-lg">
                Programa integral de formación en diagnóstico, tratamiento médico y quirúrgico del glaucoma
                con tecnología de vanguardia.
            </p>
        </div>

        <!-- Video de Glaucoma -->
        <div class="max-w-5xl mx-auto mb-16">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="video-container">
                    <!-- Video de YouTube para Glaucoma -->
                    <iframe src="https://www.youtube.com/embed/TU_VIDEO_GLAUCOMA_ID_AQUI" 
                            title="Video Programa Glaucoma" 
                            frameborder="0" 
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                            allowfullscreen>
                    </iframe>
                </div>

                <div class="p-6 md:p-8">
                    <h3 class="text-2xl font-bold text-secondary mb-3">
                        <i class="fas fa-eye-dropper text-primary mr-2"></i>
                        Fellowship en Glaucoma
                    </h3>
                    <p class="text-gray-700 leading-relaxed mb-4">
                        Formación especializada en el manejo integral del glaucoma, desde el diagnóstico precoz
                        hasta técnicas quirúrgicas avanzadas incluyendo MIGS, trabeculectomía y dispositivos
                        de drenaje.
                    </p>
                    <div class="flex flex-wrap gap-3">
                        <span class="inline-flex items-center bg-primary/10 text-primary px-4 py-2 rounded-lg">
                            <i class="fas fa-clock mr-2"></i>
                            Duración: 12 meses
                        </span>
                        <span class="inline-flex items-center bg-accent/10 text-accent px-4 py-2 rounded-lg">
                            <i class="fas fa-microscope mr-2"></i>
                            Tecnología OCT de última generación
                        </span>
                        <span class="inline-flex items-center bg-secondary/10 text-secondary px-4 py-2 rounded-lg">
                            <i class="fas fa-graduation-cap mr-2"></i>
                            40 Semanas Teóricas + Práctica Clínica
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Profesores de Glaucoma -->
        <div class="mb-16">
            <h3 class="text-2xl font-bold text-secondary text-center mb-8">
                Profesores de Glaucoma Clínico-Quirúrgico
            </h3>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">

                <!-- Dra. Meida Espinoza -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/dra-espinoza-1.jpg') }}" 
                         alt="Dra. Meida Espinoza" 
                         class="doctor-image">
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-secondary mb-2">Dra. Meida Espinoza</h4>
                        <p class="text-primary font-semibold text-sm mb-2">
                            <i class="fas fa-stethoscope mr-1"></i>
                            Especialista en Diagnóstico y Tratamiento de Glaucoma
                        </p>
                        <p class="text-gray-600 text-sm mb-3">
                            Experta en diagnóstico temprano, tratamiento médico y quirúrgico del glaucoma. 
                            Reconocida especialista con formación de alto nivel y constante actualización en técnicas de vanguardia.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">Glaucoma</span>
                            <span class="text-xs bg-accent/10 text-accent px-2 py-1 rounded-full">Diagnóstico</span>
                        </div>
                    </div>
                </div>

                <!-- Dra. Ana Villacorta -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/dra-ana-villacorta.jpg') }}" 
                         alt="Dra. Ana Villacorta" 
                         class="doctor-image">
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-secondary mb-2">Dra. Ana Villacorta</h4>
                        <p class="text-primary font-semibold text-sm mb-2">
                            <i class="fas fa-stethoscope mr-1"></i>
                            Especialista en Trabeculectomía
                        </p>
                        <p class="text-gray-600 text-sm mb-3">
                            Experta en cirugía filtrante y manejo de glaucoma refractario.
                            Más de 20 años de experiencia en procedimientos complejos.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">Trabeculectomía</span>
                            <span class="text-xs bg-accent/10 text-accent px-2 py-1 rounded-full">Esclerectomía</span>
                        </div>
                    </div>
                </div>

                <!-- Dr. Yoaner Martín Perera -->
                <div class="doctor-card bg-white rounded-xl shadow-lg overflow-hidden">
                    <img src="{{ asset('images/Dr Yoanner Martin.jpeg') }}" 
                         alt="Dr. Yoaner Martín Perera" 
                         class="doctor-image">
                    <div class="p-5">
                        <h4 class="text-lg font-bold text-secondary mb-2">Dr. Yoaner Martín Perera</h4>
                        <p class="text-primary font-semibold text-sm mb-2">
                            <i class="fas fa-stethoscope mr-1"></i>
                            Especialista en Diagnóstico por Imágenes
                        </p>
                        <p class="text-gray-600 text-sm mb-3">
                            Experto en imagenología: OCT, Campimetría y Paquimetría.
                            Diagnóstico precoz del glaucoma.
                        </p>
                        <div class="flex flex-wrap gap-2">
                            <span class="text-xs bg-primary/10 text-primary px-2 py-1 rounded-full">OCT</span>
                            <span class="text-xs bg-accent/10 text-accent px-2 py-1 rounded-full">Campimetría</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Características del programa -->
        <div class="grid md:grid-cols-3 gap-8 mb-16">
            <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-primary">
                <i class="fas fa-user-md text-primary text-4xl mb-4"></i>
                <h4 class="font-bold text-xl text-secondary mb-2">Entrenamiento Personalizado</h4>
                <p class="text-gray-600">Acompañamiento directo de especialistas con amplia experiencia clínica y quirúrgica</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-primary">
                <i class="fas fa-microscope text-primary text-4xl mb-4"></i>
                <h4 class="font-bold text-xl text-secondary mb-2">Tecnología Avanzada</h4>
                <p class="text-gray-600">OCT, campímetros y equipos láser de última generación para diagnóstico y tratamiento</p>
            </div>
            <div class="bg-white rounded-xl p-6 shadow-lg border-l-4 border-primary">
                <i class="fas fa-procedures text-primary text-4xl mb-4"></i>
                <h4 class="font-bold text-xl text-secondary mb-2">Alto Volumen Quirúrgico</h4>
                <p class="text-gray-600">Participación activa en cirugías de glaucoma, MIGS y procedimientos combinados</p>
            </div>
        </div>

        <!-- PLAN CURRICULAR -->
        <div class="max-w-7xl mx-auto" id="plan-curricular-glaucoma">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden border-2 border-gray-100">
                
                <!-- Header del Plan Curricular -->
                <div class="bg-gradient-to-r from-secondary to-secondary-900 p-8 text-white text-center">
                    <h3 class="text-3xl font-bold mb-2">
                        <i class="fas fa-graduation-cap mr-3"></i>
                        Plan Curricular - Fellowship en Glaucoma
                    </h3>
                    <p class="text-lg opacity-90">
                        40 Semanas de Conferencias + Actividades Complementarias Durante Todo el Año
                    </p>
                </div>

                <!-- Tabs Navigation -->
                <div class="bg-gradient-to-r from-secondary to-secondary-900 p-4">
                    <div class="flex flex-wrap justify-center gap-3">
                        <button onclick="showModuleCategory('fundamentos')" 
                                id="tab-fundamentos"
                                class="module-tab active px-6 py-3 rounded-lg font-bold text-white bg-primary transition-all duration-300">
                            <i class="fas fa-book mr-2"></i>
                            Fundamentos (4)
                        </button>
                        <button onclick="showModuleCategory('diagnostico')" 
                                id="tab-diagnostico"
                                class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300">
                            <i class="fas fa-eye mr-2"></i>
                            Diagnóstico por Imágenes (4)
                        </button>
                        <button onclick="showModuleCategory('tipos')" 
                                id="tab-tipos"
                                class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300">
                            <i class="fas fa-clipboard-list mr-2"></i>
                            Tipos de Glaucoma (17)
                        </button>
                        <button onclick="showModuleCategory('tratamiento')" 
                                id="tab-tratamiento"
                                class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300">
                            <i class="fas fa-syringe mr-2"></i>
                            Tratamiento (2)
                        </button>
                        <button onclick="showModuleCategory('cirugia')" 
                                id="tab-cirugia"
                                class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300">
                            <i class="fas fa-scalpel mr-2"></i>
                            Cirugía (9)
                        </button>
                        <button onclick="showModuleCategory('investigacion')" 
                                id="tab-investigacion"
                                class="module-tab px-6 py-3 rounded-lg font-bold text-white bg-secondary-700 hover:bg-primary transition-all duration-300">
                            <i class="fas fa-flask mr-2"></i>
                            Investigación & Actividades (4)
                        </button>
                    </div>
                </div>

                <!-- Tabs Content -->
                <div class="p-8 md:p-12">
                    
                    <!-- FUNDAMENTOS (Semanas 1-4) -->
                    <div id="content-fundamentos" class="module-content">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-book text-primary mr-3"></i>
                                Introducción y Fundamentos
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 1-4</strong> — Base teórica esencial para el entendimiento del glaucoma
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">01</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Anatomía y Embriología del Nervio Óptico
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Fisiología del humor acuoso y bases anatómicas del glaucoma
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">02</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Anatomía y Embriología del Ángulo Camerular
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Gonioscopia: técnica e interpretación clínica
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">03</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Presión Intraocular y Tonometría
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Métodos de medición y factores que afectan la PIO
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">04</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Epidemiología y Clasificación del Glaucoma
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Prevalencia, incidencia y factores de riesgo a nivel mundial
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- DIAGNÓSTICO POR IMÁGENES (Semanas 5-8) -->
                    <div id="content-diagnostico" class="module-content hidden">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-eye text-primary mr-3"></i>
                                Diagnóstico por Imágenes en Glaucoma
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 5-8</strong> — Tecnología diagnóstica avanzada
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">05</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            OCT: Interpretación
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Tomografía de coherencia óptica del nervio óptico y capa de fibras nerviosas
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">06</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Campo Visual
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Campimetría automatizada: interpretación de patrones y seguimiento
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">07</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            UBM y Paquimetría en Glaucoma
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            Biomicroscopía ultrasónica y grosor corneal central
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-5 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">08</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-2">
                                            Electrofisiología en Glaucoma
                                        </h4>
                                        <p class="text-gray-600 text-sm">
                                            ERG y PEV: aplicaciones diagnósticas en glaucoma
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TIPOS DE GLAUCOMA (Semanas 9-25) -->
                    <div id="content-tipos" class="module-content hidden">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-clipboard-list text-primary mr-3"></i>
                                Tipos de Glaucoma
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 9-26</strong> — Clasificación y manejo específico
                            </p>
                        </div>

                        <!-- Subtabs -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button onclick="showGlaucomaSubtab('primario')" 
                                    id="subtab-primario"
                                    class="glaucoma-subtab active-subtab px-4 py-2 rounded-lg font-semibold text-white bg-primary text-sm">
                                Primario (4)
                            </button>
                            <button onclick="showGlaucomaSubtab('secundario')" 
                                    id="subtab-secundario"
                                    class="glaucoma-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                Secundario (11)
                            </button>
                            <button onclick="showGlaucomaSubtab('congenito')" 
                                    id="subtab-congenito"
                                    class="glaucoma-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                Congénito e Infantil (1)
                            </button>
                        </div>

                        <!-- Primario -->
                        <div id="content-primario" class="glaucoma-content">
                            <h4 class="text-xl font-bold text-primary mb-4">Glaucoma Primario</h4>
                            <div class="grid gap-3">
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S09</strong>
                                    <span class="ml-2 font-semibold text-secondary">Test Provocativos y Curva de Tensión Ocular</span>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S10</strong>
                                    <span class="ml-2 font-semibold text-secondary">Sospecha de Glaucoma e Hipertensión Ocular</span>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S11</strong>
                                    <span class="ml-2 font-semibold text-secondary">Glaucoma Primario de Ángulo Abierto (GPAA)</span>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S12</strong>
                                    <span class="ml-2 font-semibold text-secondary">Glaucoma de Tensión Normal</span>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S13</strong>
                                    <span class="ml-2 font-semibold text-secondary">PACS, PAC y GPAC - Iris Plateau</span>
                                    <p class="text-sm text-gray-600 ml-8 mt-1">Cierre angular primario y glaucoma por cierre angular</p>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-4">
                                    <strong class="text-primary">S14</strong>
                                    <span class="ml-2 font-semibold text-secondary">Estudio EAGLE y Extracción de Cristalino</span>
                                </div>
                            </div>
                        </div>

                        <!-- Secundario -->
                        <div id="content-secundario" class="glaucoma-content hidden">
                            <h4 class="text-xl font-bold text-accent mb-4">Glaucoma Secundario</h4>
                            <div class="grid md:grid-cols-2 gap-3">
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S15</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Pigmentario y Pseudoexfoliativo</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S16</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Neovascular</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S17</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Asociado a Inflamaciones Intraoculares</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S18</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Trauma Ocular y Hemorragia</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S19</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Alteraciones del Cristalino</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S20</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Inducido por Esteroides</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S21</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Desórdenes del Endotelio Corneal</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S22</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Elevación Presión Venosa Episcleral</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S23</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Tumores Intraoculares</p>
                                </div>
                                <div class="bg-white border-l-4 border-accent rounded-lg p-3">
                                    <strong class="text-accent text-sm">S25</strong>
                                    <p class="ml-2 font-semibold text-secondary text-sm">Post-Cirugía y Glaucoma Maligno</p>
                                </div>
                            </div>
                        </div>

                        <!-- Congénito -->
                        <div id="content-congenito" class="glaucoma-content hidden">
                            <h4 class="text-xl font-bold text-secondary mb-4">Glaucoma Congénito e Infantil</h4>
                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-secondary rounded-lg p-6">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-secondary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">26</span>
                                    </div>
                                    <div class="flex-1">
                                        <h5 class="font-bold text-lg text-secondary mb-2">
                                            Glaucoma Congénito e Infantil
                                        </h5>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Diagnóstico y clasificación</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Etiología y factores de riesgo</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Tratamiento médico y quirúrgico</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Consideraciones anestésicas</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Seguimiento a largo plazo</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TRATAMIENTO MÉDICO (Semanas 27-28) -->
                    <div id="content-tratamiento" class="module-content hidden">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-syringe text-primary mr-3"></i>
                                Tratamiento Médico del Glaucoma
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 27-28</strong> — Farmacología y nuevas líneas de investigación
                            </p>
                        </div>

                        <div class="grid gap-4">
                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">27</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-3">
                                            Fármacos Hipotensores
                                        </h4>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Mecanismo de acción de cada familia farmacológica</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Indicaciones y contraindicaciones específicas</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Efectos adversos sistémicos y oculares</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Cumplimiento terapéutico y adherencia</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Manejo de intolerancia o alergia medicamentosa</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6 hover:shadow-lg transition-all duration-300">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">28</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-3">
                                            Neuroprotección y Nuevas Líneas de Investigación
                                        </h4>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Estrategias neuroprotectoras actuales</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Terapias génicas en desarrollo</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Nuevos fármacos en investigación</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Medicina regenerativa aplicada al glaucoma</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CIRUGÍA (Semanas 29-38) -->
                    <div id="content-cirugia" class="module-content hidden">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-scalpel text-primary mr-3"></i>
                                Tratamiento Quirúrgico del Glaucoma
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 29-38</strong> — Láser, cirugía filtrante y MIGS
                            </p>
                        </div>

                        <!-- Subtabs cirugía -->
                        <div class="flex flex-wrap gap-2 mb-6">
                            <button onclick="showCirugiaSubtab('laser')" 
                                    id="subtab-laser"
                                    class="cirugia-subtab active-subtab px-4 py-2 rounded-lg font-semibold text-white bg-primary text-sm">
                                Láser (3)
                            </button>
                            <button onclick="showCirugiaSubtab('filtrante')" 
                                    id="subtab-filtrante"
                                    class="cirugia-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                Cirugía Filtrante (2)
                            </button>
                            <button onclick="showCirugiaSubtab('valvulas')" 
                                    id="subtab-valvulas"
                                    class="cirugia-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                Válvulas (2)
                            </button>
                            <button onclick="showCirugiaSubtab('migs')" 
                                    id="subtab-migs"
                                    class="cirugia-subtab px-4 py-2 rounded-lg font-semibold text-secondary bg-gray-100 text-sm hover:bg-gray-200">
                                MIGS (2)
                            </button>
                        </div>

                        <!-- Láser -->
                        <div id="content-laser" class="cirugia-content">
                            <h4 class="text-xl font-bold text-primary mb-4">Láser en Glaucoma</h4>
                            <div class="grid gap-4">
                                <div class="bg-white border-l-4 border-primary rounded-lg p-5">
                                    <strong class="text-primary text-lg">S29</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">Iridotomía e Iridoplastia</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Técnica láser YAG para cierre angular y configuración del iris</p>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-5">
                                    <strong class="text-primary text-lg">S30</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">Trabeculoplastia Selectiva (SLT)</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Indicaciones, técnica y resultados a largo plazo</p>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-5">
                                    <strong class="text-primary text-lg">S31</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">Ciclofotocoagulación</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Tratamiento de glaucomas refractarios y control de PIO</p>
                                </div>
                            </div>
                        </div>

                        <!-- Cirugía Filtrante -->
                        <div id="content-filtrante" class="cirugia-content hidden">
                            <h4 class="text-xl font-bold text-accent mb-4">Cirugía Filtrante Clásica</h4>
                            <div class="grid gap-4">
                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-accent rounded-lg p-6">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-accent rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">32</span>
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-bold text-lg text-secondary mb-3">Trabeculectomía</h5>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Indicaciones y contraindicaciones</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Técnica quirúrgica paso a paso</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Antimetabolitos: MMC y 5-FU</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Manejo postoperatorio</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-accent rounded-lg p-6">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-accent rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">33</span>
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-bold text-lg text-secondary mb-3">Complicaciones y Reintervenciones</h5>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Complicaciones tempranas y tardías</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Manejo de la ampolla filtrante</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Revisión con aguja (needling)</li>
                                                <li><i class="fas fa-check-circle text-accent mr-2"></i>Reintervenciones quirúrgicas</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Válvulas -->
                        <div id="content-valvulas" class="cirugia-content hidden">
                            <h4 class="text-xl font-bold text-secondary mb-4">Válvulas y Dispositivos de Drenaje</h4>
                            <div class="grid gap-4">
                                <div class="bg-white border-l-4 border-secondary rounded-lg p-5">
                                    <strong class="text-secondary text-lg">S34</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">Dispositivos de Drenaje</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Indicaciones, contraindicaciones y técnica quirúrgica</p>
                                </div>
                                <div class="bg-white border-l-4 border-secondary rounded-lg p-5">
                                    <strong class="text-secondary text-lg">S35</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">Comparación y Manejo de Complicaciones</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Seguimiento y manejo de complicaciones más frecuentes</p>
                                </div>
                            </div>
                        </div>

                        <!-- MIGS -->
                        <div id="content-migs" class="cirugia-content hidden">
                            <h4 class="text-xl font-bold text-primary mb-4">Cirugía Mínimamente Invasiva (MIGS)</h4>
                            <div class="grid gap-4">
                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">36</span>
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-bold text-lg text-secondary mb-3">MIGS con Dispositivos</h5>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>iStent: indicaciones y técnica</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Hydrus: ventajas y limitaciones</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>XEN Gel Stent</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>PreserFlo MicroShunt</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Evidencia clínica actual</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6">
                                    <div class="flex items-start gap-4">
                                        <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                            <span class="text-white font-bold text-lg">37</span>
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="font-bold text-lg text-secondary mb-3">MIGS sin Dispositivos</h5>
                                            <ul class="space-y-2 text-sm text-gray-600">
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>GATT (Gonioscopy-Assisted Transluminal Trabeculotomy)</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Kahook Dual Blade</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Trabectome</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Trabeculostomía con láser excímer (Plataforma Oertli)</li>
                                                <li><i class="fas fa-check-circle text-primary mr-2"></i>Canaloplastia Ab Interno con iTrack</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-white border-l-4 border-primary rounded-lg p-5">
                                    <strong class="text-primary text-lg">S38</strong>
                                    <span class="ml-2 font-semibold text-secondary text-lg">EPNP y Cirugías Combinadas</span>
                                    <p class="text-sm text-gray-600 ml-10 mt-2">Esclerectomía profunda no perforante y FacoMIGS</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- INVESTIGACIÓN Y ACTIVIDADES (Semanas 39-40 + Actividades) -->
                    <div id="content-investigacion" class="module-content hidden">
                        <div class="mb-8">
                            <h3 class="text-3xl font-bold text-secondary mb-3">
                                <i class="fas fa-flask text-primary mr-3"></i>
                                Investigación y Actualización en Glaucoma
                            </h3>
                            <p class="text-gray-600 text-lg mb-4">
                                <strong>Semanas 39-40</strong> — Estudios clínicos y tecnología emergente
                            </p>
                        </div>

                        <div class="grid gap-4 mb-8">
                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">39</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-3">
                                            Estudios Clínicos Multicéntricos
                                        </h4>
                                        <div class="grid md:grid-cols-2 gap-2 text-sm text-gray-600">
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>OHTS (Ocular Hypertension Treatment Study)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>EMGT (Early Manifest Glaucoma Trial)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>AGIS (Advanced Glaucoma Intervention Study)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>CIGTS (Collaborative Initial Glaucoma Treatment Study)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>EAGLE (Effectiveness in Angle-Closure Glaucoma of Lens Extraction)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>TVT (Tube Versus Trabeculectomy Study)</span>
                                            <span><i class="fas fa-check-circle text-primary mr-2"></i>ZAP (Zeaxanthin and Antioxidants in Progression)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-gradient-to-r from-gray-50 to-white border-l-4 border-primary rounded-lg p-6">
                                <div class="flex items-start gap-4">
                                    <div class="flex-shrink-0 w-14 h-14 bg-primary rounded-lg flex items-center justify-center shadow-md">
                                        <span class="text-white font-bold text-lg">40</span>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="font-bold text-lg text-secondary mb-3">
                                            Biomarcadores, IA y Algoritmos Diagnósticos
                                        </h4>
                                        <ul class="space-y-2 text-sm text-gray-600">
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>GLAUGEN: marcadores genéticos</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>NEIGHBOR: factores de riesgo</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Inteligencia artificial en diagnóstico</li>
                                            <li><i class="fas fa-check-circle text-primary mr-2"></i>Machine learning en predicción de progresión</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Actividades Complementarias -->
                        <div class="bg-gradient-to-r from-primary/10 to-secondary/10 rounded-2xl p-8 border-2 border-primary/30">
                            <h4 class="text-2xl font-bold text-secondary mb-6 flex items-center">
                                <i class="fas fa-calendar-alt text-primary mr-3"></i>
                                Actividades Complementarias Durante el Año
                            </h4>

                            <div class="grid md:grid-cols-2 gap-6">
                                
                                <!-- Actividades Académicas -->
                                <div class="bg-white rounded-xl p-6 shadow-md">
                                    <h5 class="font-bold text-lg text-secondary mb-4 flex items-center">
                                        <i class="fas fa-book-reader text-primary mr-2"></i>
                                        Actividades Académicas
                                    </h5>
                                    <ul class="space-y-3 text-sm text-gray-700">
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Publicaciones:</strong> 2 trabajos investigativos en un año</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Discusión de casos:</strong> Pacientes complejos diariamente en consulta</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Actividades Clínicas -->
                                <div class="bg-white rounded-xl p-6 shadow-md">
                                    <h5 class="font-bold text-lg text-secondary mb-4 flex items-center">
                                        <i class="fas fa-user-md text-primary mr-2"></i>
                                        Actividades Clínicas
                                    </h5>
                                    <ul class="space-y-3 text-sm text-gray-700">
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Consulta con tutor:</strong> Diario de lunes a sábado</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Jornadas quirúrgicas:</strong> 2 frecuencias semanales de glaucoma y catarata</span>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Actividades Prácticas -->
                                <div class="bg-white rounded-xl p-6 shadow-md md:col-span-2">
                                    <h5 class="font-bold text-lg text-secondary mb-4 flex items-center">
                                        <i class="fas fa-hands text-primary mr-2"></i>
                                        Taller de Cirugía Experimental
                                    </h5>
                                    <ul class="space-y-3 text-sm text-gray-700">
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Inducción intensiva:</strong> 1 mes completo de entrenamiento experimental</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Práctica continua:</strong> Jornadas planificadas durante todo el diplomado</span>
                                        </li>
                                        <li class="flex items-start">
                                            <i class="fas fa-check-circle text-primary mr-2 mt-1"></i>
                                            <span><strong>Material:</strong> Ojos de cerdo y simuladores de última generación</span>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="mt-6 bg-white rounded-lg p-5 border-2 border-primary/20">
                                <p class="text-center text-gray-700">
                                    <i class="fas fa-trophy text-primary mr-2"></i>
                                    <strong>Objetivo:</strong> Formación integral con balance entre teoría, práctica clínica, investigación y entrenamiento quirúrgico.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>

        <!-- Botones de Acción Final -->
        <div class="max-w-4xl mx-auto mt-16 text-center">
            <div class="bg-gradient-to-r from-primary to-secondary rounded-2xl p-12 text-white shadow-2xl">
                <h3 class="text-3xl font-bold mb-4">¿Listo para Especializarte en Glaucoma?</h3>
                <p class="text-lg mb-8 opacity-90">
                    Contáctanos para más información sobre el proceso de admisión y requisitos
                </p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="#contacto" class="inline-flex items-center bg-white text-primary font-bold py-4 px-8 rounded-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105">
                        <i class="fas fa-envelope mr-3 text-xl"></i>
                        <span>Contactar</span>
                    </a>
                    <a href="{{ route('centros.index') }}" class="inline-flex items-center bg-white/20 backdrop-blur-md border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                        <i class="fas fa-hospital-alt mr-3 text-xl"></i>
                        <span>Ver Centros Quirúrgicos</span>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>


    <!-- ================================ -->
    <!-- NUEVA SECCIÓN: RETINA Y VÍTREO -->
    <!-- ================================ -->
 @include('components.retina-clinico-quirurgico')


    <!-- ========================================== -->
    <!-- SECCIÓN: TESTIMONIOS DE FELLOWS -->
    <!-- ========================================== -->
    <section id="testimonios" class="py-24 bg-gradient-to-br from-secondary relative overflow-hidden">
        <!-- Fondo decorativo -->
        <div class="absolute inset-0 opacity-5">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-primary rounded-full blur-3xl"></div>
        </div>

        <div class="container mx-auto px-4 md:px-10 relative z-10">
            <!-- Título destacado -->
            <div class="text-center mb-16">
                <div class="inline-block mb-4">
                    <span class="bg-primary/20 text-white font-bold text-sm uppercase tracking-wider px-6 py-2 rounded-full">
                        <i class="fas fa-star mr-2"></i>Experiencias Reales
                    </span>
                </div>
                <h2 class="font-heading text-4xl md:text-5xl lg:text-6xl font-bold text-white mt-4 mb-6">
                    Lo Que Dicen Nuestros Fellows
                </h2>
                <div class="w-24 h-1.5 bg-primary mx-auto mb-6"></div>
                <p class="text-white/90 text-lg md:text-xl max-w-3xl mx-auto leading-relaxed">
                    Conoce las experiencias transformadoras de nuestros fellows que se han formado en
                    los mejores programas de especialización en oftalmología del país.
                </p>
            </div>

            <!-- Video Principal de Testimonios -->
            <div class="max-w-6xl mx-auto mb-16">
                <div class="bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden shadow-2xl border border-white/20">
                    <!-- Video Container -->
                    <div class="relative">
                        <div class="video-container">
                            <!-- Video de YouTube con testimonios compilados -->
                            <div class="video-container">
                                <iframe src="https://www.youtube.com/embed/ZqH8_omBycc" title="Experiencia en programa de alta especialización - Fellowship (Clínica La Luz)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin">
                                </iframe>
                            </div>

                            <!-- Badge flotante -->
                            <div class="absolute top-6 left-6 bg-primary text-white px-4 py-2 rounded-lg shadow-lg flex items-center gap-2 animate-pulse">
                                <i class="fas fa-video"></i>
                                <span class="font-bold text-sm">TESTIMONIOS EN VIVO</span>
                            </div>
                        </div>

                        <!-- Información debajo del video -->
                        <div class="bg-white p-8 md:p-10">
                            <div class="flex items-center justify-between flex-wrap gap-4 mb-6">
                                <div>
                                    <h3 class="text-2xl md:text-3xl font-bold text-secondary mb-2">
                                        <i class="fas fa-users text-primary mr-3"></i>
                                        Historias de Éxito
                                    </h3>
                                    <p class="text-gray-600">Fellows compartiendo su experiencia en La Luz Educa</p>
                                </div>
                                <div class="flex items-center gap-2 text-amber-500">
                                    <i class="fas fa-star text-2xl"></i>
                                    <i class="fas fa-star text-2xl"></i>
                                    <i class="fas fa-star text-2xl"></i>
                                    <i class="fas fa-star text-2xl"></i>
                                    <i class="fas fa-star text-2xl"></i>
                                    <span class="text-secondary font-bold text-xl ml-2">5.0</span>
                                </div>
                            </div>

                            <p class="text-gray-700 leading-relaxed text-lg mb-6">
                                En este video especial, varios de nuestros fellows graduados comparten sus experiencias,
                                aprendizajes y cómo el programa de especialización de Clínica La Luz transformó sus
                                carreras profesionales. Desde el primer día de formación hasta convertirse en
                                especialistas reconocidos internacionalmente.
                            </p>

                            <!-- Estadísticas destacadas -->
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 p-6 bg-gradient-to-r from-primary/5 to-accent/5 rounded-xl">
                                <div class="text-center">
                                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">32+</div>
                                    <div class="text-sm text-gray-600">Fellows Graduados</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">98%</div>
                                    <div class="text-sm text-gray-600">Satisfacción</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">10+</div>
                                    <div class="text-sm text-gray-600">Países de Origen</div>
                                </div>
                                <div class="text-center">
                                    <div class="text-3xl md:text-4xl font-bold text-primary mb-1">100%</div>
                                    <div class="text-sm text-gray-600">Empleabilidad</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Citas destacadas de testimonios -->
            <div class="grid md:grid-cols-3 gap-10 max-w-6xl mx-auto">

                <!-- Testimonio 1 -->
                <div class="relative bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/20 hover:scale-[1.03] hover:bg-white/15 transition-all duration-500 shadow-xl">
                    <!-- Imagen destacada -->
                    <div class="relative h-72 w-full overflow-hidden">
                        <img src="{{ asset('images/MEDICOS-PROFESORES/DOCTOR_VEGA.png') }}" alt="Dr. Jorge Vega" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="text-xl font-bold">Dr. Jorge Vega</h4>
                            <p class="text-sm text-gray-200">Fellow 2023 - Colombia</p>
                        </div>
                    </div>

                    <!-- Contenido del testimonio -->
                    <div class="p-8">
                        <p class="text-white/90 leading-relaxed italic mb-6">
                            “La experiencia en Clínica La Luz superó todas mis expectativas. La calidad de los docentes
                            y el volumen de cirugías me permitieron alcanzar un nivel que nunca imaginé.”
                        </p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 2 -->
                <div class="relative bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/20 hover:scale-[1.03] hover:bg-white/15 transition-all duration-500 shadow-xl">
                    <div class="relative h-72 w-full overflow-hidden">
                        <img src="{{ asset('images/Dra Ana Luisa Gonzalez.png') }}" alt="Dra. Luisa Gonzales" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="text-xl font-bold">Dra. Luisa Gonzales</h4>
                            <p class="text-sm text-gray-200">Fellow 2022 - México</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-white/90 leading-relaxed italic mb-6">
                            “El programa de Glaucoma me dio las herramientas y confianza para manejar casos complejos.
                            Hoy dirijo mi propia clínica especializada gracias a esta formación.”
                        </p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- Testimonio 3 -->
                <div class="relative bg-white/10 backdrop-blur-sm rounded-3xl overflow-hidden border border-white/20 hover:scale-[1.03] hover:bg-white/15 transition-all duration-500 shadow-xl">
                    <div class="relative h-72 w-full overflow-hidden">
                        <img src="{{ asset('images/evelin.png') }}" alt="Dra. Evelyn Eneque" class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h4 class="text-xl font-bold">Dra. Evelyn Eneque</h4>
                            <p class="text-sm text-gray-200">Fellow 2024 - Perú</p>
                        </div>
                    </div>
                    <div class="p-8">
                        <p class="text-white/90 leading-relaxed italic mb-6">
                            “La tecnología de punta y el ambiente académico excepcional hacen de este programa
                            una experiencia única. Fue la mejor decisión de mi carrera profesional.”
                        </p>
                        <div class="flex text-amber-400">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Call to Action -->
            <div class="text-center mt-16">
                <p class="text-white/90 text-xl mb-6">¿Quieres ser parte de la próxima generación de especialistas?</p>
                <a href="#contacto" class="inline-flex items-center bg-white text-secondary font-bold py-4 px-10 rounded-xl hover:shadow-2xl hover:bg-primary hover:text-white transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-rocket mr-3"></i>
                    <span>Únete a Nuestro Programa</span>
                    <i class="fas fa-arrow-right ml-3"></i>
                </a>
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




</body>
</html>
