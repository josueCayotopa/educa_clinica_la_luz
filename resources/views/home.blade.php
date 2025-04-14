<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa de Fellows - Clínica la Luz</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary:'#B11A1A',
                        secondary:'#0D3049',
                        accent: '#669BBB',
                        light: '#669BBB',
                    }
                }
            }
        }
    </script>
</head>

<body class="font-sans bg-white">
    <!-- Header -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="flex items-center">
        
                <div class="flex items-center">
               
                    <div>
                        {{-- Logo and Title --}}
                        <img src="{{ asset('images/logo.png') }}" alt="" class="w-20 h-15 mr-2">
                        
                    </div>
                </div>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden md:flex space-x-6">
                <a href="#inicio" class="text-secondary hover:text-primary transition">Inicio</a>
                <a href="#programa" class="text-secondary hover:text-primary transition">Programa Fellows</a>
                <a href="#especialidades" class="text-secondary hover:text-primary transition">Especialidades</a>
                <a href="#logros" class="text-secondary hover:text-primary transition">Logros</a>
                <a href="#contacto" class="text-secondary hover:text-primary transition">Contacto</a>
                <a href="#blog" class="text-secondary hover:text-primary transition">Blog</a>
            </nav>
            
            <!-- Book Appointment Button (Desktop) -->
            <a href="#contacto" class="hidden md:block bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-90 transition">
                Ingresar
            </a>
            
            <!-- Mobile menu button -->
            <button id="menu-toggle" class="md:hidden text-primary">
                <i class="fas fa-bars text-2xl"></i>
            </button>
        </div>
        
        <!-- Mobile Navigation -->
        <nav id="mobile-menu" class="hidden px-4 py-2 bg-white md:hidden">
            <div class="flex flex-col space-y-3">
                <a href="#inicio" class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Inicio</a>
                <a href="#programa" class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Programa Fellows</a>
                <a href="#especialidades" class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Especialidades</a>
                <a href="#logros" class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Logros</a>
                <a href="#contacto" class="text-secondary hover:text-primary transition py-2 border-b border-gray-100">Contacto</a>
                <a href="#blog" class="text-secondary hover:text-primary transition py-2">Blog</a>
                <a href="#contacto" class="bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-90 transition text-center mt-2">
                    Solicitar Información
                </a>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="inicio" class="relative bg-white py-8">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <div class="text-accent font-medium mb-2">Programa de Excelencia</div>
                    <h2 class="text-4xl md:text-5xl font-bold text-secondary mb-4">Formamos a los <span class="text-primary">Mejores Especialistas</span></h2>
                    <p class="text-gray-600 mb-6">
                        Nuestro programa de fellows en oftalmología ofrece una formación integral con los más altos estándares de calidad y tecnología de vanguardia para desarrollar a los líderes del futuro en salud visual.
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#programa" class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition">
                            Solicitar Información
                        </a>
                        <div class="flex space-x-4 items-center">
                            <a href="#" class="text-secondary hover:text-primary transition">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition">
                                <i class="fab fa-instagram text-xl"></i>
                            </a>
                            <a href="#" class="text-secondary hover:text-primary transition">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white rounded-lg shadow-xl p-6">
                    <h3 class="text-xl font-bold text-secondary mb-4 text-center">Solicita Información</h3>
                    <form>
                        <div class="mb-4">
                            <input type="text" placeholder="Tu nombre*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <input type="email" placeholder="Tu correo electrónico*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <input type="tel" placeholder="Número de teléfono*" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-4">
                            <select class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary text-gray-500">
                                <option value="" selected disabled>Especialidad de interés</option>
                                <option value="cornea">Córnea y Cirugía Refractiva</option>
                                <option value="retina">Retina y Vítreo</option>
                                <option value="glaucoma">Glaucoma</option>
                                <option value="pediatrica">Oftalmología Pediátrica</option>
                                <option value="neuro">Neuro-oftalmología</option>
                                <option value="oculoplastia">Oculoplastia</option>
                            </select>
                        </div>
                        <button type="submit" class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition w-full">
                            Solicitar Ahora
                        </button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Background Elements -->
        <div class="absolute top-20 right-10 w-20 h-20 bg-primary opacity-10 rounded-full"></div>
        <div class="absolute bottom-10 left-10 w-32 h-32 bg-accent opacity-10 rounded-full"></div>
    </section>

    <!-- About Fellows Program -->
    <section id="programa" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-secondary mb-2">Programa de Fellows</h2>
                <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Nuestro programa de formación especializada en oftalmología está diseñado para desarrollar profesionales de excelencia con habilidades clínicas y quirúrgicas avanzadas.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <img src="https://placehold.co/600x400/0D3049/FFFFFF?text=Formación+Especializada" alt="Programa de Fellows" class="rounded-lg shadow-lg w-full">
                </div>
                <div>
                    <h3 class="text-2xl font-bold text-primary mb-4">Formación de Excelencia</h3>
                    <p class="text-gray-700 mb-4">El programa de fellows de la Clínica la Luz ofrece una experiencia educativa integral con:</p>
                    <ul class="space-y-3">
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Rotaciones clínicas en todas las subespecialidades oftalmológicas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Entrenamiento quirúrgico supervisado por especialistas reconocidos</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Participación en investigaciones y publicaciones científicas</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Acceso a tecnología de vanguardia y equipamiento moderno</span>
                        </li>
                        <li class="flex items-start">
                            <i class="fas fa-check-circle text-primary mt-1 mr-2"></i>
                            <span>Sesiones académicas y conferencias con expertos internacionales</span>
                        </li>
                    </ul>
                    <a href="#contacto" class="inline-block mt-6 bg-primary text-white font-bold py-2 px-6 rounded-lg hover:bg-opacity-90 transition">Solicitar Información</a>
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
                <p class="text-gray-600 max-w-3xl mx-auto">Ofrecemos formación especializada en todas las áreas de la oftalmología moderna, con tecnología de vanguardia y profesionales de primer nivel.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
                <!-- Specialty 1 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <i class="fas fa-eye text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Córnea y Cirugía Refractiva</h3>
                        <p class="text-gray-600 mb-4">Especialización en trasplantes de córnea, cirugía refractiva láser y tratamientos avanzados para enfermedades corneales.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-secondary flex items-center justify-center">
                        <i class="fas fa-glasses text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Retina y Vítreo</h3>
                        <p class="text-gray-600 mb-4">Diagnóstico y tratamiento de enfermedades retinianas, incluyendo degeneración macular, retinopatía diabética y desprendimiento de retina.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-accent flex items-center justify-center">
                        <i class="fas fa-low-vision text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Glaucoma</h3>
                        <p class="text-gray-600 mb-4">Manejo integral del glaucoma con técnicas diagnósticas avanzadas y procedimientos quirúrgicos mínimamente invasivos.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-accent flex items-center justify-center">
                        <i class="fas fa-child text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Oftalmología Pediátrica</h3>
                        <p class="text-gray-600 mb-4">Atención especializada para niños con problemas visuales, estrabismo y otras patologías oculares infantiles.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 5 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-primary flex items-center justify-center">
                        <i class="fas fa-brain text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Neuro-oftalmología</h3>
                        <p class="text-gray-600 mb-4">Diagnóstico y tratamiento de trastornos visuales relacionados con el sistema nervioso y enfermedades neurológicas.</p>
                        <div class="flex items-center text-sm text-primary">
                            <span>Más información</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </div>
                    </div>
                </div>

                <!-- Specialty 6 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-xl">
                    <div class="h-48 bg-secondary flex items-center justify-center">
                        <i class="fas fa-microscope text-white text-5xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-secondary mb-2">Oculoplastia</h3>
                        <p class="text-gray-600 mb-4">Cirugía reconstructiva y estética de párpados, órbita y vías lagrimales con técnicas mínimamente invasivas.</p>
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
                <p class="text-gray-600 max-w-3xl mx-auto">A lo largo de nuestra trayectoria, hemos alcanzado importantes hitos que nos posicionan como un centro de referencia en oftalmología.</p>
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
                                <h4 class="text-lg font-semibold text-secondary mb-1">Centro de Excelencia en Cirugía Refractiva</h4>
                                <p class="text-gray-600">Reconocimiento internacional por nuestros resultados en cirugía refractiva y trasplantes de córnea.</p>
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
                                <p class="text-gray-600">Programa acreditado por las principales sociedades oftalmológicas internacionales.</p>
                            </div>
                        </div>
                        <div class="flex">
                            <div class="flex-shrink-0 mr-4">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <i class="fas fa-certificate text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-lg font-semibold text-secondary mb-1">Premio a la Innovación Médica</h4>
                                <p class="text-gray-600">Por el desarrollo de nuevas técnicas quirúrgicas y protocolos de tratamiento.</p>
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
                <p class="max-w-3xl mx-auto">Conoce las experiencias de quienes han formado parte de nuestro programa de especialización.</p>
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
                    <p class="italic">"Mi experiencia como fellow en la Clínica la Luz transformó mi carrera. El nivel de formación, la exposición a casos complejos y el apoyo de los profesores fueron excepcionales."</p>
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
                    <p class="italic">"La formación quirúrgica que recibí fue incomparable. Ahora dirijo mi propia clínica y aplico diariamente las técnicas y conocimientos adquiridos durante mi fellowship."</p>
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
                    <p class="italic">"Lo que más valoro de mi tiempo como fellow fue la combinación perfecta entre práctica clínica, investigación y docencia. Una experiencia integral que me preparó para los desafíos de la oftalmología moderna."</p>
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
                <p class="text-gray-600 max-w-3xl mx-auto">¿Interesado en nuestro programa de fellows? Completa el formulario y nuestro equipo se pondrá en contacto contigo.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg shadow-md">
                    <h3 class="text-2xl font-bold text-primary mb-6">Envíanos un mensaje</h3>
                    <form>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Nombre</label>
                                <input type="text" id="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                            </div>
                        </div>
                        <div class="mb-4">
                            <label for="subject" class="block text-gray-700 mb-2">Asunto</label>
                            <input type="text" id="subject" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                        </div>
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 mb-2">Mensaje</label>
                            <textarea id="message" rows="4" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                        </div>
                        <button type="submit" class="bg-primary text-white font-bold py-3 px-6 rounded-lg hover:bg-opacity-90 transition w-full">Enviar Mensaje</button>
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
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a href="#" class="w-10 h-10 bg-primary rounded-full flex items-center justify-center text-white hover:bg-opacity-90 transition">
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
                    <p class="text-gray-400 mb-4">Formando a los mejores especialistas en oftalmología con los más altos estándares de calidad y tecnología de vanguardia.</p>
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
                        <li><a href="#programa" class="text-gray-400 hover:text-primary transition">Programa Fellows</a></li>
                        <li><a href="#especialidades" class="text-gray-400 hover:text-primary transition">Especialidades</a></li>
                        <li><a href="#logros" class="text-gray-400 hover:text-primary transition">Logros</a></li>
                        <li><a href="#contacto" class="text-gray-400 hover:text-primary transition">Contacto</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Especialidades</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Córnea y Cirugía Refractiva</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Retina y Vítreo</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Glaucoma</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Oftalmología Pediátrica</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-primary transition">Neuro-oftalmología</a></li>
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
                        <a href="#contacto" class="bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-90 transition inline-block">Contáctanos</a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2023 Clínica la Luz. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        
        menuToggle.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
        
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
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
    </script>
</body>
</html>