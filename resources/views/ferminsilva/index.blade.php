<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Fellows - Clínica la Luz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B11A1A',
                        secondary: '#0D3049',
                        accent: '#669BBB',
                        light: '#669BBB',
                    },
                    animation: {
                        'float': 'float 3s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': {
                                transform: 'translateY(0)'
                            },
                            '50%': {
                                transform: 'translateY(-10px)'
                            },
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans bg-white">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50 transition-all duration-300" id="header">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
                <div class="flex items-center">
                    <div>
                        <!-- Logo with subtle hover animation -->
                        <a href="#" class="block transition-transform duration-300 hover:scale-105">
                            <img src="{{ asset('images/logo-fellow1.png') }}" alt="Clínica la Luz" class="w-15 h-10">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Desktop Navigation with animated underline effect -->
            <nav class="hidden md:flex space-x-8">
                <a href="#inicio"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Inicio</a>
                <a href="#programa"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Programa
                    Fellows</a>
                <a href="#especialidades"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Especialidades</a>
                <a href="#logros"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Logros</a>
                <a href="#contacto"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Contacto</a>
                <a href="#blog"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Blog</a>
                    <a href="/evaluaciones"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Evaluaciones </a>
                     <a href="/calculadora"
                    class="text-secondary hover:text-primary transition-colors duration-300 nav-link font-medium">Calculadora</a>
            </nav>

            <!-- Login Button (Desktop) with hover effect -->
            <a href="/admin"
                class="hidden md:flex items-center bg-primary text-white font-bold py-2 px-5 rounded-lg hover:bg-opacity-90 transition-all duration-300 hover:shadow-lg group">
                <span>Iniciar Sesión</span>
                <i class="fas fa-sign-in-alt ml-2 transition-transform duration-300 group-hover:translate-x-1"></i>
            </a>

            <!-- Mobile menu button with animation -->
            <button id="menu-toggle"
                class="md:hidden text-primary p-2 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="hidden px-4 py-2 bg-white md:hidden">
            <div class="flex flex-col space-y-3">
                <a href="#inicio"
                    class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Inicio</a>
                <a href="#programa"
                    class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Programa
                    Fellows</a>
                <a href="#especialidades"
                    class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Especialidades</a>
                <a href="#logros"
                    class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Logros</a>
                <a href="#contacto"
                    class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Contacto</a>
                <a href="#blog" class="text-secondary hover:text-primary transition py-2">Blog</a>
                <a href="/admin"
                    class="bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-90 transition text-center mt-2">
                    Iniciar Sesión
                </a>
            </div>
        </nav>
    </header>
    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-gradient-to-br from-white to-gray-50">
        <!-- Background Elements -->
        <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/5 clip-path-slant-left"></div>
        <div
            class="absolute bottom-0 left-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2">
        </div>
        <div class="absolute top-20 right-20 w-20 h-20 border-2 border-primary/20 rounded-full"></div>
        <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-secondary/10 rounded-full"></div>

        <div class="container mx-auto px-4 py-16 md:py-24">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <!-- Left Content Column -->
                <div class="relative z-10 fade-in-up">
                    <div class="flex items-center mb-4 text-accent">
                        <div class="w-10 h-10 rounded-full bg-accent/10 flex items-center justify-center mr-3">
                            <i class="fas fa-graduation-cap text-accent"></i>
                        </div>
                        <span class="text-sm md:text-base font-medium tracking-wide">Programa de Excelencia en
                            Oftalmología</span>
                    </div>

                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        <span class="text-secondary">Formamos a los </span>
                        <span class="text-primary relative">
                            Mejores Especialistas
                            <svg class="absolute -bottom-2 left-0 w-full" height="6" viewBox="0 0 200 6"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 3C50 0.5 150 0.5 200 3" stroke="#B11A1A" stroke-width="5"
                                    stroke-linecap="round" />
                            </svg>
                        </span>
                    </h1>

                    <p class="text-gray-600 text-lg mb-8 max-w-xl">
                        Nuestro programa de fellows en oftalmología ofrece una formación integral con los más altos
                        estándares de calidad y tecnología de vanguardia para desarrollar a los líderes del futuro en
                        salud visual.
                    </p>

                    <!-- Stats Cards -->
                    <div class="grid grid-cols-3 gap-4 mb-8">
                        <div class="stat-card group">
                            <div class="stat-value">15</div>
                            <div class="stat-label">Años de Experiencia</div>
                            <div class="stat-icon"><i class="fas fa-calendar-alt"></i></div>
                        </div>

                        <div class="stat-card group">
                            <div class="stat-value">501<span class="text-primary">+</span></div>
                            <div class="stat-label">Fellows Graduados</div>
                            <div class="stat-icon"><i class="fas fa-user-graduate"></i></div>
                        </div>

                        <div class="stat-card group">
                            <div class="stat-value">100<span class="text-primary">%</span></div>
                            <div class="stat-label">Tasa de Éxito</div>
                            <div class="stat-icon"><i class="fas fa-award"></i></div>
                        </div>
                    </div>

                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <a href="#contacto" class="cta-button primary">
                            <span>Solicitar Información</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>

                        <a href="#testimonios" class="cta-button secondary">
                            <i class="fas fa-users"></i>
                            <span>Ver Testimonios</span>
                        </a>
                    </div>
                </div>

                <!-- Right Image Column -->
                <div class="relative z-10">
                    <div class="relative hero-image-container">
                        <!-- Main Image -->
                        <div class="relative overflow-hidden rounded-lg shadow-2xl">
                            <img src="{{ asset('images/graduacion1.jpg') }}" alt="Fellows de Oftalmología"
                                class="w-full h-full object-cover">

                            <!-- Overlay with Gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-secondary/50 via-transparent to-transparent opacity-60">
                            </div>

                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45"
                                style="transform: translateX(-100%); animation: shine 5s infinite;"></div>
                        </div>

                        <!-- Floating Info Card -->
                        <div
                            class="absolute -bottom-6 -left-6 md:bottom-8 md:left-8 bg-white p-4 rounded-lg shadow-xl max-w-xs transform rotate-0 hover:rotate-1 transition-transform duration-300">
                            <div class="flex items-center mb-2">
                                <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center mr-2">
                                    <i class="fas fa-microscope text-white text-xs"></i>
                                </div>
                                <h3 class="font-bold text-secondary">Entrenamiento Clínico Avanzado</h3>
                            </div>
                            <p class="text-gray-600 text-sm">Formación práctica con tecnología de vanguardia y casos
                                clínicos complejos.</p>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute -top-4 -right-4 w-16 h-16 bg-primary rounded-full opacity-80 shadow-lg">
                        </div>
                        <div class="absolute -top-8 -right-8 w-16 h-16 border-2 border-primary rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section id="logros" class="py-16 md:py-24 bg-gradient-to-br from-primary/5 via-white to-accent/5 relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-0 right-0 w-96 h-96 bg-gradient-to-bl from-primary/10 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-gradient-to-tr from-accent/10 to-transparent rounded-full blur-3xl"></div>
        <div class="absolute top-1/4 left-1/4 w-4 h-4 bg-primary rounded-full opacity-20"></div>
        <div class="absolute top-1/3 right-1/3 w-6 h-6 border-2 border-accent rounded-full opacity-30"></div>
        <div class="absolute bottom-1/4 right-1/4 w-8 h-8 bg-secondary/20 rounded-full"></div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Section Header -->
            <div class="text-center mb-16">
                
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6 leading-tight">
                    <span class="text-secondary">Celebramos el Éxito del</span>
                    <span class="text-primary block mt-2">Dr. Fermín Silva Cayatopa</span>
                </h2>
                
                <div class="w-24 h-1 bg-gradient-to-r from-primary to-accent mx-auto mb-8"></div>
            </div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-2 gap-12 items-center mb-16">
                <!-- Left Content -->
                <div class="space-y-8">
                    <!-- Achievement Badge -->
                    <div class="inline-flex items-center bg-gradient-to-r from-primary to-primary/90 text-white px-6 py-3 rounded-full shadow-lg">
                        <i class="fas fa-trophy mr-3 text-yellow-300"></i>
                        <span class="font-semibold">MBA - Universidad del Pacífico Business School</span>
                    </div>

                    <!-- Main Text -->
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-700 text-lg leading-relaxed mb-6">
                            Con gran emoción y orgullo, compartimos un nuevo capítulo en la historia de crecimiento y liderazgo del 
                            <strong class="text-secondary">Dr. Fermín Silva Cayatopa</strong>, Fundador y CEO del Grupo Empresarial La Luz, 
                            y uno de los oftalmólogos más reconocidos del país.
                        </p>
                        
                        <p class="text-gray-700 text-lg leading-relaxed mb-6">
                            Hoy celebramos su reciente graduación del <strong class="text-primary">MBA en la prestigiosa Universidad del Pacífico – Business School</strong>, 
                            una meta que refleja su constante compromiso por seguir aprendiendo, innovando y brindando lo mejor a miles de peruanos.
                        </p>
                        
                        <p class="text-gray-700 text-lg leading-relaxed">
                            Este logro no solo suma a su trayectoria profesional, sino que reafirma su visión de seguir construyendo 
                            <strong class="text-accent">una salud más humana, accesible y de calidad para todos</strong>.
                        </p>
                    </div>

                    <!-- Achievement Stats -->
                    <div class="grid grid-cols-2 gap-6">
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-primary to-primary/80 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-building text-white"></i>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-secondary">20+</div>
                                    <div class="text-sm text-gray-600">Años de Liderazgo</div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 hover:shadow-xl transition-all duration-300">
                            <div class="flex items-center mb-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-accent to-accent/80 rounded-lg flex items-center justify-center mr-3">
                                    <i class="fas fa-users text-white"></i>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-secondary">1000+</div>
                                    <div class="text-sm text-gray-600">Vidas Transformadas</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Congratulations Message -->
                    <div class="bg-gradient-to-r from-accent/10 to-primary/10 p-6 rounded-xl border-l-4 border-primary">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-heart text-white"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-bold text-secondary mb-2">¡Felicitaciones, Doctor!</h4>
                                <p class="text-gray-700 italic">
                                    "Su ejemplo nos inspira a seguir creciendo con pasión y propósito." 
                                    <span class="text-2xl">👏🎓</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Image -->
                <div class="relative">
                    <div class="relative group">
                        <!-- Main Image Container -->
                        <div class="relative overflow-hidden rounded-2xl shadow-2xl">
                            <img src="{{ asset('images/fermin-mba.png') }}" 
                                 alt="Dr. Fermín Silva Cayatopa en su graduación del MBA - Universidad del Pacífico" 
                                 class="w-full h-auto object-cover transition-transform duration-500 group-hover:scale-105">
                            
                            <!-- Image Overlay -->
                            <div class="absolute inset-0 bg-gradient-to-t from-secondary/30 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                        </div>

                        <!-- Floating University Badge -->
                        <div class="absolute -top-6 -right-6 bg-white p-4 rounded-xl shadow-xl border border-gray-100 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                            <div class="text-center">
                                <div class="w-12 h-12 bg-gradient-to-br from-secondary to-secondary/80 rounded-full flex items-center justify-center mx-auto mb-2">
                                    <i class="fas fa-university text-white"></i>
                                </div>
                                <div class="text-xs font-bold text-secondary">Universidad</div>
                                <div class="text-xs text-gray-600">del Pacífico</div>
                            </div>
                        </div>

                        <!-- Floating MBA Badge -->
                        <div class="absolute -bottom-4 -left-4 bg-gradient-to-r from-primary to-primary/90 text-white p-4 rounded-xl shadow-xl transform -rotate-2 hover:rotate-0 transition-transform duration-300">
                            <div class="flex items-center">
                                <i class="fas fa-medal text-yellow-300 text-xl mr-2"></i>
                                <div>
                                    <div class="font-bold text-sm">MBA</div>
                                    <div class="text-xs opacity-90">Business School</div>
                                </div>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute top-4 left-4 w-8 h-8 border-2 border-accent rounded-full opacity-30"></div>
                        <div class="absolute bottom-8 right-8 w-6 h-6 bg-primary rounded-full opacity-40"></div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center">
                <div class="bg-gradient-to-r from-secondary to-secondary/90 rounded-2xl p-8 md:p-12 text-white relative overflow-hidden">
                    <!-- Background Pattern -->
                    <div class="absolute inset-0 opacity-10">
                        <div class="absolute top-6 left-6 w-12 h-12 border-2 border-white rounded-full"></div>
                        <div class="absolute top-12 right-12 w-8 h-8 bg-white rounded-full"></div>
                        <div class="absolute bottom-8 left-1/4 w-6 h-6 border border-white rounded-full"></div>
                        <div class="absolute bottom-6 right-1/3 w-14 h-14 border-2 border-white rounded-full"></div>
                    </div>
                    
                    <div class="relative z-10">
                        <h3 class="text-2xl md:text-3xl font-bold mb-4">
                            Liderazgo que Inspira, Excelencia que Transforma
                        </h3>
                        <p class="text-lg mb-8 opacity-90 max-w-3xl mx-auto">
                            El compromiso del Dr. Silva con la formación continua refleja nuestros valores institucionales 
                            de excelencia, innovación y servicio a la comunidad.
                        </p>
                        
                        <div class="flex flex-wrap gap-4 justify-center">
                            <a href="#contacto" class="bg-primary text-white px-8 py-3 rounded-lg font-semibold hover:bg-primary/90 transition-all duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center">
                                <span>Conoce Nuestros Servicios</span>
                                <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                            
                            <a href="#programa" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-secondary transition-all duration-300 hover:shadow-lg hover:-translate-y-1 inline-flex items-center">
                                <i class="fas fa-graduation-cap mr-2"></i>
                                <span>Programa Fellows</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section id="fotos_felows" class="relative bg-white py-12 md:py-20 overflow-hidden hero-pattern">


        <!-- Fellows Showcase Section -->
        <div class="mt-16 text-center fade-in">
            <h3 class="text-2xl font-bold text-secondary mb-2">Nuestros Fellows Destacados</h3>
            <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
            <p class="text-gray-500 mb-10 max-w-2xl mx-auto">Conoce a los especialistas que se han formado en nuestro
                programa y ahora son referentes en sus áreas de especialización.</p>

            <!-- Fellows Slider -->
            <div class="fellows-slider-container relative max-w-6xl mx-auto px-4 py-10">
                <!-- Illumination Effects -->
                <div
                    class="absolute top-1/2 left-1/4 w-64 h-64 bg-primary opacity-10 rounded-full blur-3xl transform -translate-y-1/2">
                </div>
                <div
                    class="absolute top-1/2 right-1/4 w-64 h-64 bg-accent opacity-10 rounded-full blur-3xl transform -translate-y-1/2">
                </div>

                <!-- Main Slider -->
                <div class="swiper fellowsSwiper">
                    <div class="swiper-wrapper">
                        <!-- Fellow 1 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/amy-perez.jpg') }}"
                                            alt="Dr. Juan Pérez"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dr. Juan Pérez</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Córnea y Cirugía Refractiva</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2018-2020. Actualmente
                                    Director de la Unidad de Córnea en Hospital Universitario.</p>
                            </div>
                        </div>

                        <!-- Fellow 2 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/niurka.jpg') }}"
                                            alt="Dra. María Rodríguez"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dra. María Rodríguez</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Retina y Vítreo</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2019-2021. Investigadora
                                    principal en el Instituto Nacional de Oftalmología.</p>
                            </div>
                        </div>

                        <!-- Fellow 3 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/pedro-tinoco.png') }}"
                                            alt="Dr. Carlos Gómez"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dr. Carlos Gómez</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Glaucoma</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2017-2019. Director de la
                                    Clínica de Glaucoma en Centro Médico Nacional.</p>
                            </div>
                        </div>

                        <!-- Fellow 4 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}"
                                            alt="Dra. Ana García"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dra. Ana García</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Oftalmología Pediátrica</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2020-2022. Jefa del
                                    Departamento de Oftalmología Pediátrica en Hospital Infantil.</p>
                            </div>
                        </div>

                        <!-- Fellow 5 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}"
                                            alt="Dr. Roberto Sánchez"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dr. Roberto Sánchez</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Neuro-oftalmología</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2018-2020. Investigador
                                    asociado en el Centro de Neurociencias.</p>
                            </div>
                        </div>

                        <!-- Fellow 6 -->
                        <div class="swiper-slide">
                            <div class="fellow-card group">
                                <div
                                    class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                                    <!-- Overlay gradient on hover -->
                                    <div
                                        class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10">
                                    </div>

                                    <!-- Image with subtle border -->
                                    <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}"
                                            alt="Dra. Laura Martínez"
                                            class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                                    </div>

                                    <!-- Shine Effect -->
                                    <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                        style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                                </div>
                                <h4
                                    class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">
                                    Dra. Laura Martínez</h4>
                                <p class="text-accent font-medium mb-3">Especialista en Oculoplastia</p>
                                <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2019-2021. Directora de la
                                    Unidad de Cirugía Oculoplástica en Clínica Internacional.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Navigation Elements -->
                    <div class="swiper-pagination mt-8"></div>

                    <!-- Navigation Arrows -->
                    <div
                        class="swiper-button-prev after:content-[''] w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-primary transition-all duration-300 hover:bg-primary hover:text-white">
                        <i class="fas fa-chevron-left"></i>
                    </div>
                    <div
                        class="swiper-button-next after:content-[''] w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-primary transition-all duration-300 hover:bg-primary hover:text-white">
                        <i class="fas fa-chevron-right"></i>
                    </div>
                </div>
            </div>


        </div>
        </div>
    </section>

    <!-- About Fellows Program -->
    <section id="programa" class="py-20  relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-20 right-10 w-64 h-64 bg-primary opacity-5 rounded-full blur-3xl"></div>
        <div class="absolute bottom-20 left-10 w-80 h-80 bg-accent opacity-5 rounded-full blur-3xl"></div>
        <div
            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full h-full max-w-6xl mx-auto">
            <div
                class="absolute top-0 left-0 w-20 h-20 border-t-2 border-l-2 border-primary/20 -translate-x-10 -translate-y-10">
            </div>
            <div
                class="absolute bottom-0 right-0 w-20 h-20 border-b-2 border-r-2 border-primary/20 translate-x-10 translate-y-10">
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-secondary mb-2 fade-in">Programa de Fellows</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Nuestro programa de formación especializada en oftalmología
                    está diseñado para desarrollar profesionales de excelencia con habilidades clínicas y quirúrgicas
                    avanzadas.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Image Column with Effects -->
                <div class="relative group">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-primary/20 to-secondary/20 rounded-lg transform rotate-3 scale-105 opacity-0 group-hover:opacity-100 transition-all duration-500">
                    </div>

                    <div class="relative overflow-hidden rounded-lg shadow-2xl">
                        <!-- Image Container -->
                        <div class="relative overflow-hidden">
                            <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos/foto1.jpeg') }}"
                                alt="Programa de Fellows"
                                class="w-full transform transition-transform duration-700 group-hover:scale-105">

                            <!-- Overlay Gradient -->
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-secondary/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20"
                                style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>

                        <!-- Caption -->
                        <div
                            class="absolute bottom-0 left-0 right-0 p-6 transform translate-y-2 opacity-0 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                            <div class="text-white text-sm md:text-base">
                                <span class="bg-primary/90 px-3 py-1 rounded-full text-sm">Formación Integral</span>
                            </div>
                        </div>
                    </div>

                    <!-- Floating Elements -->
                    <div
                        class="absolute -top-4 -right-4 w-12 h-12 bg-primary rounded-full opacity-80 shadow-lg transform rotate-0 group-hover:rotate-45 transition-transform duration-500">
                    </div>
                    <div
                        class="absolute -bottom-4 -left-4 w-8 h-8 bg-secondary rounded-full opacity-80 shadow-lg transform rotate-0 group-hover:rotate-45 transition-transform duration-500">
                    </div>
                </div>

                <!-- Content Column with Animations -->
                <div class="slide-in-right">
                    <div class="bg-white p-8 rounded-lg shadow-lg border-t-4 border-primary">
                        <h3 class="text-2xl font-bold text-primary mb-6 flex items-center">
                            <span class="relative">
                                Formación de Excelencia
                                <span
                                    class="absolute bottom-0 left-0 w-full h-1 bg-accent transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 origin-left"></span>
                            </span>
                            <div class="ml-3 w-8 h-8 bg-primary/10 rounded-full flex items-center justify-center">
                                <i class="fas fa-graduation-cap text-primary"></i>
                            </div>
                        </h3>

                        <p class="text-gray-700 mb-6">El programa de fellows de la Clínica la Luz ofrece una
                            experiencia educativa integral con:</p>

                        <ul class="space-y-4">
                            <li
                                class="flex items-start transform hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 shadow-md">
                                    <i class="fas fa-clinic-medical text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary">Rotaciones Clínicas</h4>
                                    <p class="text-gray-600 text-sm">En todas las subespecialidades oftalmológicas</p>
                                </div>
                            </li>

                            <li
                                class="flex items-start transform hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 shadow-md">
                                    <i class="fas fa-user-md text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary">Entrenamiento Quirúrgico</h4>
                                    <p class="text-gray-600 text-sm">Supervisado por especialistas reconocidos</p>
                                </div>
                            </li>

                            <li
                                class="flex items-start transform hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 shadow-md">
                                    <i class="fas fa-microscope text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary">Investigación</h4>
                                    <p class="text-gray-600 text-sm">Participación en investigaciones y publicaciones
                                        científicas</p>
                                </div>
                            </li>

                            <li
                                class="flex items-start transform hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 shadow-md">
                                    <i class="fas fa-laptop-medical text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary">Tecnología de Vanguardia</h4>
                                    <p class="text-gray-600 text-sm">Acceso a equipamiento moderno y técnicas avanzadas
                                    </p>
                                </div>
                            </li>

                            <li
                                class="flex items-start transform hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="flex-shrink-0 w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-3 shadow-md">
                                    <i class="fas fa-chalkboard-teacher text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-secondary">Sesiones Académicas</h4>
                                    <p class="text-gray-600 text-sm">Conferencias con expertos internacionales</p>
                                </div>
                            </li>
                        </ul>

                        <div class="mt-8 flex flex-wrap gap-4">
                            <a href="#contacto"
                                class="inline-flex items-center bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition shadow-md hover:shadow-lg transform hover:-translate-y-1 group">
                                <span>Solicitar Información</span>
                                <i
                                    class="fas fa-arrow-right ml-2 transform group-hover:translate-x-1 transition-transform duration-300"></i>
                            </a>

                            <a href="#especialidades"
                                class="inline-flex items-center bg-white text-secondary border-2 border-secondary font-bold py-3 px-6 rounded-lg hover:bg-secondary hover:text-white transition shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <i class="fas fa-eye mr-2"></i>
                                <span>Ver Especialidades</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statistics Section -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center transform hover:-translate-y-2 transition-transform duration-300 border-t-2 border-primary">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-calendar-alt text-primary text-2xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold text-primary">2</h4>
                    <p class="text-gray-600 text-sm">Años de Duración</p>
                </div>

                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center transform hover:-translate-y-2 transition-transform duration-300 border-t-2 border-secondary">
                    <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-user-graduate text-secondary text-2xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold text-secondary">6</h4>
                    <p class="text-gray-600 text-sm">Especialidades</p>
                </div>

                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center transform hover:-translate-y-2 transition-transform duration-300 border-t-2 border-accent">
                    <div class="w-16 h-16 bg-accent/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-hospital-user text-accent text-2xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold text-accent">+500</h4>
                    <p class="text-gray-600 text-sm">Pacientes Atendidos</p>
                </div>

                <div
                    class="bg-white p-6 rounded-lg shadow-md text-center transform hover:-translate-y-2 transition-transform duration-300 border-t-2 border-primary">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-certificate text-primary text-2xl"></i>
                    </div>
                    <h4 class="text-3xl font-bold text-primary">100%</h4>
                    <p class="text-gray-600 text-sm">Tasa de Empleabilidad</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Specialties Section -->
    <section id="especialidades" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary mb-2">Nuestras Especialidades</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Ofrecemos formación especializada en todas las áreas de la
                    oftalmología moderna, con tecnología de vanguardia y profesionales de primer nivel.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Specialty 1 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <i class="fas fa-eye text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Córnea y Cirugía Refractiva</h3>
                        <p class="text-gray-600 mb-4">Especialización en trasplantes de córnea, cirugía refractiva
                            láser y tratamientos avanzados para enfermedades corneales.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 2 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-secondary flex items-center justify-center">
                        <i class="fas fa-glasses text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Retina y Vítreo</h3>
                        <p class="text-gray-600 mb-4">Diagnóstico y tratamiento de enfermedades retinianas, incluyendo
                            degeneración macular, retinopatía diabética y desprendimiento de retina.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 3 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-accent flex items-center justify-center">
                        <i class="fas fa-low-vision text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Glaucoma</h3>
                        <p class="text-gray-600 mb-4">Manejo integral del glaucoma con técnicas diagnósticas avanzadas
                            y procedimientos quirúrgicos mínimamente invasivos.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 4 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-accent flex items-center justify-center">
                        <i class="fas fa-child text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Oftalmología Pediátrica</h3>
                        <p class="text-gray-600 mb-4">Atención especializada para niños con problemas visuales,
                            estrabismo y otras patologías oculares infantiles.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 5 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <i class="fas fa-brain text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Neuro-oftalmología</h3>
                        <p class="text-gray-600 mb-4">Diagnóstico y tratamiento de trastornos visuales relacionados con
                            el sistema nervioso y enfermedades neurológicas.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 6 -->
                <div
                    class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-secondary flex items-center justify-center">
                        <i class="fas fa-microscope text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Oculoplastia</h3>
                        <p class="text-gray-600 mb-4">Cirugía reconstructiva y estética de párpados, órbita y vías
                            lagrimales con técnicas mínimamente invasivas.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Achievements Section -->
    <section id="logros" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary mb-2">Nuestros Logros</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">A lo largo de nuestra trayectoria, hemos alcanzado
                    importantes hitos que nos posicionan como un centro de referencia en oftalmología.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-primary mb-6">Reconocimientos</h3>
                    <div class="space-y-6">
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-award text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Centro de Excelencia en Cirugía
                                    Refractiva</h4>
                                <p class="text-gray-600">Reconocimiento internacional por nuestros resultados en
                                    cirugía refractiva y trasplantes de córnea.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-star text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Acreditación Internacional</h4>
                                <p class="text-gray-600">Programa acreditado por las principales sociedades
                                    oftalmológicas internacionales.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-certificate text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Premio a la Innovación Médica
                                </h4>
                                <p class="text-gray-600">Por el desarrollo de nuevas técnicas quirúrgicas y protocolos
                                    de tratamiento.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-primary mb-6">Estadísticas</h3>
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-4xl font-bold text-primary mb-2">+500</div>
                            <p class="text-gray-700">Fellows graduados</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-primary mb-2">98%</div>
                            <p class="text-gray-700">Tasa de éxito quirúrgico</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-primary mb-2">+200</div>
                            <p class="text-gray-700">Publicaciones científicas</p>
                        </div>
                        <div class="text-center">
                            <div class="text-4xl font-bold text-primary mb-2">+50</div>
                            <p class="text-gray-700">Países representados</p>
                        </div>
                    </div>
                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-secondary mb-3">Nuestros Fellows en el mundo</h4>
                        <div class="h-4 bg-gray-200 rounded-full overflow-hidden">
                            <div class="h-full bg-primary rounded-full" style="width: 85%"></div>
                        </div>
                        <div class="flex justify-between mt-2 text-sm text-gray-600">
                            <span>Posiciones de liderazgo</span>
                            <span>85%</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-secondary text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-2">Testimonios de Nuestros Fellows</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="max-w-3xl mx-auto">Conoce las experiencias de quienes han formado parte de nuestro programa
                    de especialización.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Testimonial 1 -->
                <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">MR</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Dra. María Rodríguez</h4>
                            <p class="text-sm opacity-80">Fellow 2019-2021</p>
                        </div>
                    </div>
                    <p class="italic">"Mi experiencia como fellow en la Clínica la Luz transformó mi carrera. El nivel
                        de formación, la exposición a casos complejos y el apoyo de los profesores fueron
                        excepcionales."</p>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">JL</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Dr. Juan López</h4>
                            <p class="text-sm opacity-80">Fellow 2018-2020</p>
                        </div>
                    </div>
                    <p class="italic">"La formación quirúrgica que recibí fue incomparable. Ahora dirijo mi propia
                        clínica y aplico diariamente las técnicas y conocimientos adquiridos durante mi fellowship."</p>
                </div>

                <!-- Testimonial 3 -->
                <div class="bg-white bg-opacity-10 p-6 rounded-lg backdrop-blur-sm">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-bold">AG</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Dra. Ana García</h4>
                            <p class="text-sm opacity-80">Fellow 2020-2022</p>
                        </div>
                    </div>
                    <p class="italic">"Lo que más valoro de mi tiempo como fellow fue la combinación perfecta entre
                        práctica clínica, investigación y docencia. Una experiencia integral que me preparó para los
                        desafíos de la oftalmología moderna."</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contacto" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary mb-2">Contáctanos</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">¿Interesado en nuestro programa de fellows? Completa el
                    formulario y nuestro equipo se pondrá en contacto contigo.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-primary mb-6">Envíanos un mensaje</h3>
                    <form>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                                <input type="text" id="name"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 mb-2">Asunto</label>
                            <input type="text" id="subject"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 mb-2">Mensaje</label>
                            <textarea id="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                        <button type="submit"
                            class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition w-full">Enviar
                            Mensaje</button>
                    </form>
                </div>

                <div>
                    <h3 class="text-2xl font-bold text-primary mb-6">Información de Contacto</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Dirección</h4>
                                <p class="text-gray-600">Av. Principal 123, Ciudad Médica<br>CP 12345, País</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Teléfono</h4>
                                <p class="text-gray-600">+123 456 7890</p>
                                <p class="text-gray-600">+123 456 7891</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Email</h4>
                                <p class="text-gray-600">fellows@clinicalaluz.com</p>
                                <p class="text-gray-600">info@clinicalaluz.com</p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h4 class="text-lg font-semibold text-secondary mb-4">Síguenos</h4>
                        <div class="flex space-x-4">
                            <a href="#"
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#"
                                class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
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
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-eye-dropper text-primary text-3xl mr-2"></i>
                        <div>
                            <h1 class="text-xl font-bold text-primary">Clínica la Luz</h1>
                            <p class="text-xs text-white opacity-80">Excelencia en Oftalmología</p>
                        </div>
                    </div>
                    <p class="text-gray-400 mb-4">Formando a los mejores especialistas en oftalmología con los más
                        altos estándares de calidad y tecnología de vanguardia.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-primary transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-primary transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2">
                        <li><a href="#inicio" class="text-gray-400 hover:text-primary transition">Inicio</a></li>
                        <li><a href="#programa" class="text-gray-400 hover:text-primary transition">Programa
                                Fellows</a></li>
                        <li><a href="#especialidades"
                                class="text-gray-400 hover:text-primary transition">Especialidades</a></li>
                        <li><a href="#logros" class="text-gray-400 hover:text-primary transition">Logros</a></li>
                        <li><a href="#contacto" class="text-gray-400 hover:text-primary transition">Contacto</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Especialidades</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Córnea y Cirugía
                                Refractiva</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Retina y Vítreo</a>
                        </li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Glaucoma</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Oftalmología
                                Pediátrica</a></li>
                        <li><a href="#"
                                class="text-gray-400 hover:text-primary transition">Neuro-oftalmología</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-lg font-semibold mb-4">Horario de Atención</h4>
                    <ul class="space-y-2">
                        <li class="flex justify-between">
                            <span class="text-gray-400">Lunes - Viernes:</span>
                            <span class="text-white">8:00 - 20:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Sábados:</span>
                            <span class="text-white">9:00 - 14:00</span>
                        </li>
                        <li class="flex justify-between">
                            <span class="text-gray-400">Domingos:</span>
                            <span class="text-white">Cerrado</span>
                        </li>
                    </ul>
                    <div class="mt-4">
                        <a href="#contacto"
                            class="bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-90 transition inline-block">Contáctanos</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 Clínica la Luz. Todos los derechos reservados.</p>
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

        // Smooth scrolling for anchor links
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

                    // Close mobile menu if open
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
                header.classList.add('py-2');
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('py-2');
                header.classList.remove('shadow-lg');
            }
        });

        // Initialize Swiper
        var swiper = new Swiper(".mySwiper", {
            effect: "fade",
            autoplay: {
                delay: 3500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.innerText.replace('+', '');
                const data = +counter.getAttribute('data-target');
                const time = data / speed;

                if (value < data) {
                    counter.innerText = Math.ceil(value + time);
                    setTimeout(animate, 1);
                } else {
                    if (counter.innerText.indexOf('+') === -1 && counter.innerText > 100) {
                        counter.innerText += '+';
                    }
                }
            }

            // Set data-target attribute based on current text
            const targetValue = counter.innerText.replace('+', '');
            counter.setAttribute('data-target', targetValue);
            counter.innerText = '0';

            // Start animation when element is in viewport
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        animate();
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.5
            });

            observer.observe(counter);
        });
        // Initialize Fellows Slider
        var fellowsSwiper = new Swiper(".fellowsSwiper", {
            slidesPerView: 1,
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: "coverflow",
            coverflowEffect: {
                rotate: 0,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: false,
            },
            pagination: {
                el: ".fellows-slider-container .swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".fellows-slider-container .swiper-button-next",
                prevEl: ".fellows-slider-container .swiper-button-prev",
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                },
            }
        });
    </script>
</body>

</html>
