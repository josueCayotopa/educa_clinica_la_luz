<!-- Fellows Showcase Section -->
<div class="mt-16 text-center fade-in">
    <h3 class="text-2xl font-bold text-secondary mb-2">Nuestros Fellows Destacados</h3>
    <div class="w-20 h-1 bg-primary mx-auto mb-6"></div>
    <p class="text-gray-500 mb-10 max-w-2xl mx-auto">Conoce a los especialistas que se han formado en nuestro programa y ahora son referentes en sus áreas de especialización.</p>
    
    <!-- Fellows Slider -->
    <div class="fellows-slider-container relative max-w-6xl mx-auto px-4 py-10">
        <!-- Illumination Effects -->
        <div class="absolute top-1/2 left-1/4 w-64 h-64 bg-primary opacity-10 rounded-full blur-3xl transform -translate-y-1/2"></div>
        <div class="absolute top-1/2 right-1/4 w-64 h-64 bg-accent opacity-10 rounded-full blur-3xl transform -translate-y-1/2"></div>
        
        <!-- Main Slider -->
        <div class="swiper fellowsSwiper">
            <div class="swiper-wrapper">
                <!-- Fellow 1 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/amy-perez.jpg')}}" alt="Dr. Juan Pérez" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dr. Juan Pérez</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Córnea y Cirugía Refractiva</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2018-2020. Actualmente Director de la Unidad de Córnea en Hospital Universitario.</p>
                    </div>
                </div>
                
                <!-- Fellow 2 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/niurka.jpg')}}" alt="Dra. María Rodríguez" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dra. María Rodríguez</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Retina y Vítreo</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2019-2021. Investigadora principal en el Instituto Nacional de Oftalmología.</p>
                    </div>
                </div>
                
                <!-- Fellow 3 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/pedro-tinoco.png')}}" alt="Dr. Carlos Gómez" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dr. Carlos Gómez</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Glaucoma</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2017-2019. Director de la Clínica de Glaucoma en Centro Médico Nacional.</p>
                    </div>
                </div>
                
                <!-- Fellow 4 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}" alt="Dra. Ana García" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dra. Ana García</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Oftalmología Pediátrica</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2020-2022. Jefa del Departamento de Oftalmología Pediátrica en Hospital Infantil.</p>
                    </div>
                </div>
                
                <!-- Fellow 5 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}" alt="Dr. Roberto Sánchez" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dr. Roberto Sánchez</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Neuro-oftalmología</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2018-2020. Investigador asociado en el Centro de Neurociencias.</p>
                    </div>
                </div>
                
                <!-- Fellow 6 -->
                <div class="swiper-slide">
                    <div class="fellow-card group">
                        <div class="fellow-image-container relative mx-auto w-56 h-64 md:w-64 md:h-72 mb-6 overflow-hidden shadow-xl">
                            <!-- Overlay gradient on hover -->
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent to-secondary opacity-0 group-hover:opacity-30 transition-opacity duration-300 z-10"></div>
                            
                            <!-- Image with subtle border -->
                            <div class="absolute inset-0 border-2 border-primary/20 overflow-hidden">
                                <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos_felows/ricardo-alarcon.jpg') }}" alt="Dra. Laura Martínez" class="w-full h-full object-cover transform transition-transform duration-500 group-hover:scale-110">
                            </div>
                            
                            <!-- Shine Effect -->
                            <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45 z-20" style="transform: translateX(-100%); animation: shine 3s infinite;"></div>
                        </div>
                        <h4 class="text-xl font-bold text-secondary mb-1 transition-transform duration-300 group-hover:text-primary">Dra. Laura Martínez</h4>
                        <p class="text-accent font-medium mb-3">Especialista en Oculoplastia</p>
                        <p class="text-gray-600 max-w-md mx-auto text-sm">Fellow 2019-2021. Directora de la Unidad de Cirugía Oculoplástica en Clínica Internacional.</p>
                    </div>
                </div>
            </div>
            
            <!-- Navigation Elements -->
            <div class="swiper-pagination mt-8"></div>
            
            <!-- Navigation Arrows -->
            <div class="swiper-button-prev after:content-[''] w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-primary transition-all duration-300 hover:bg-primary hover:text-white">
                <i class="fas fa-chevron-left"></i>
            </div>
            <div class="swiper-button-next after:content-[''] w-12 h-12 bg-white rounded-full shadow-lg flex items-center justify-center text-primary transition-all duration-300 hover:bg-primary hover:text-white">
                <i class="fas fa-chevron-right"></i>
            </div>
        </div>
    </div>
    
    <!-- Acreditaciones (Smaller Section Below) -->
    <div class="mt-16">
        <p class="text-gray-500 mb-6">Reconocido y acreditado por:</p>
        <div class="flex flex-wrap justify-center items-center gap-8 opacity-70">
            <img src="https://placehold.co/120x60/0D3049/FFFFFF?text=Asociación+1" alt="Asociación 1" class="h-10">
            <img src="https://placehold.co/120x60/B11A1A/FFFFFF?text=Asociación+2" alt="Asociación 2" class="h-10">
            <img src="https://placehold.co/120x60/669BBB/FFFFFF?text=Asociación+3" alt="Asociación 3" class="h-10">
            <img src="https://placehold.co/120x60/0D3049/FFFFFF?text=Asociación+4" alt="Asociación 4" class="h-10">
            <img src="https://placehold.co/120x60/B11A1A/FFFFFF?text=Asociación+5" alt="Asociación 5" class="h-10">
        </div>
    </div>
</div>

<!-- Add this to your CSS if not already present -->
<style>
    @keyframes shine {
        0% {
            transform: translateX(-100%) rotate(45deg);
        }
        20%, 100% {
            transform: translateX(100%) rotate(45deg);
        }
    }
    
    .fellows-slider-container .swiper-button-prev,
    .fellows-slider-container .swiper-button-next {
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s ease;
    }
    
    .fellows-slider-container:hover .swiper-button-prev,
    .fellows-slider-container:hover .swiper-button-next {
        opacity: 1;
        transform: scale(1);
    }
    
    .fellows-slider-container .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background-color: #B11A1A;
        opacity: 0.5;
        transition: all 0.3s ease;
    }
    
    .fellows-slider-container .swiper-pagination-bullet-active {
        width: 20px;
        border-radius: 5px;
        background-color: #B11A1A;
        opacity: 1;
    }
    
    .fellow-card {
        padding: 2rem;
        transition: all 0.3s ease;
    }
    
    .fellow-card:hover {
        transform: translateY(-10px);
    }
    
    .fellow-image-container {
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.2);
        transition: all 0.5s ease;
    }
    
    .fellow-card:hover .fellow-image-container {
        box-shadow: 0 20px 30px -10px rgba(0, 0, 0, 0.3);
    }
</style>

<!-- Make sure this JavaScript is included -->
<script>
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