    <section id="inicio" class="relative overflow-hidden bg-secondary">

        <div class="carousel-container relative h-[650px] md:h-[750px]">
       
            <!-- Slide 1: Programa de Alta Especialización -->
            <div class="carousel-slide active absolute inset-0 transition-opacity duration-1000">
                <img src="{{ asset('images/fellowship-programa.jpg') }}" alt="Programa de Alta Especialización" class="w-full h-full object-cover">
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
                <img src="{{ asset('images/residentado-medico.jpg') }}" alt="Residentado Médico en Oftalmología" class="w-full h-full object-cover">
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
                               
                                <span class="block text-white relative inline-block mt-2">
                                    <span class="block text-primary relative inline-block mt-2">
                                    Residentado Médico
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#B11A1A" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                                  
                                   en Oftalmología por  la Universidad Nacional Federico Villarreal
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#D97706" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </h1>

                            <p class="text-white/95 text-lg md:text-xl mb-8 leading-relaxed">
                                Formación integral como médico oftalmólogo en convenio con la 
                                <strong>Universidad Nacional Federico Villarreal</strong>. 
                                3 años de residencia con tecnología de última generación.
                            </p>

                            <!-- Características badge -->
                            <div class="flex flex-wrap gap-3 mb-8 justify-end">
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-hospital mr-2"></i>Formación Clínica
                                </span>
                                <span class="bg-white/10 backdrop-blur-sm text-white px-4 py-2 rounded-lg text-sm font-semibold border border-white/20">
                                    <i class="fas fa-procedures mr-2"></i>Entrenamiento Quirúrgico
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
             <!-- Slide 3 : Cirugia de catarata ambidiestramente -->
            <div class="carousel-slide absolute inset-0 opacity-0 transition-opacity duration-1000">
                <img src="{{ asset('images/residentado-medico.jpg') }}" alt="Residentado Médico en Oftalmología" class="w-full h-full object-cover">
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
                               
                                <span class="block text-white relative inline-block mt-2">
                                  Enseñamos a realizar cirugias de cataratas con ambas manos 
                                   <span class="block text-white relative inline-block mt-2">
                                    <span class="block text-primary relative inline-block mt-2">
                                   con ambas manos 
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#B11A1A" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                                  
                                  
                                    <svg class="absolute -bottom-2 left-0 w-full" height="8" viewBox="0 0 200 8" fill="none">
                                        <path d="M0 4C50 1 150 1 200 4" stroke="#D97706" stroke-width="6" stroke-linecap="round" />
                                    </svg>
                                </span>
                            </h1>

                            <p class="text-white/95 text-lg md:text-xl mb-8 leading-relaxed">
                                
                            </p>

                      
                           

                            <!-- Botones CTA -->
                            <div class="flex flex-wrap gap-4 justify-end">
                                <a href="#residentado" class="inline-flex items-center bg-accent text-white font-bold py-4 px-8 rounded-xl hover:bg-accent/90 hover:shadow-2xl hover:shadow-accent/30 transition-all duration-300 transform hover:scale-105">
                                    <i class="fas fa-stethoscope mr-3"></i>
                                    <span>Conoce mas sobre nuestra malla curricular</span>
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