<!-- Hero Section -->
<section class="relative overflow-hidden bg-gradient-to-br from-white to-gray-50">
    <!-- Background Elements -->
    <div class="absolute top-0 right-0 w-1/3 h-full bg-primary/5 clip-path-slant-left"></div>
    <div class="absolute bottom-0 left-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 translate-y-1/2"></div>
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
                    <span class="text-sm md:text-base font-medium tracking-wide">Programa de Excelencia en Oftalmología</span>
                </div>
                
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    <span class="text-secondary">Formamos a los </span>
                    <span class="text-primary relative">
                        Mejores Especialistas
                        <svg class="absolute -bottom-2 left-0 w-full" height="6" viewBox="0 0 200 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 3C50 0.5 150 0.5 200 3" stroke="#B11A1A" stroke-width="5" stroke-linecap="round"/>
                        </svg>
                    </span>
                </h1>
                
                <p class="text-gray-600 text-lg mb-8 max-w-xl">
                    Nuestro programa de fellows en oftalmología ofrece una formación integral con los más altos estándares de calidad y tecnología de vanguardia para desarrollar a los líderes del futuro en salud visual.
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
                        <img src="{{ asset('images/FELLOWS ANTIGUOS/fotos/graduacion.jpg') }}" alt="Fellows de Oftalmología" class="w-full h-full object-cover">
                        
                        <!-- Overlay with Gradient -->
                        <div class="absolute inset-0 bg-gradient-to-t from-secondary/50 via-transparent to-transparent opacity-60"></div>
                        
                        <!-- Shine Effect -->
                        <div class="absolute inset-0 bg-gradient-to-tr from-transparent via-white to-transparent opacity-0 group-hover:opacity-20 transition-opacity duration-700 rotate-45" style="transform: translateX(-100%); animation: shine 5s infinite;"></div>
                    </div>
                    
                    <!-- Floating Info Card -->
                    <div class="absolute -bottom-6 -left-6 md:bottom-8 md:left-8 bg-white p-4 rounded-lg shadow-xl max-w-xs transform rotate-0 hover:rotate-1 transition-transform duration-300">
                        <div class="flex items-center mb-2">
                            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center mr-2">
                                <i class="fas fa-microscope text-white text-xs"></i>
                            </div>
                            <h3 class="font-bold text-secondary">Entrenamiento Clínico Avanzado</h3>
                        </div>
                        <p class="text-gray-600 text-sm">Formación práctica con tecnología de vanguardia y casos clínicos complejos.</p>
                    </div>
                    
                    <!-- Decorative Elements -->
                    <div class="absolute -top-4 -right-4 w-16 h-16 bg-primary rounded-full opacity-80 shadow-lg"></div>
                    <div class="absolute -top-8 -right-8 w-16 h-16 border-2 border-primary rounded-full"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* Custom Clip Path */
    .clip-path-slant-left {
        clip-path: polygon(30% 0, 100% 0, 100% 100%, 0% 100%);
    }
    
    /* Animation Keyframes */
    @keyframes shine {
        0% {
            transform: translateX(-100%) rotate(45deg);
        }
        20%, 100% {
            transform: translateX(100%) rotate(45deg);
        }
    }
    
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    
    /* Animation Classes */
    .fade-in-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }
    
    /* Stat Cards */
    .stat-card {
        @apply bg-white rounded-lg p-4 shadow-md relative overflow-hidden transition-all duration-300;
    }
    
    .stat-card:hover {
        @apply shadow-lg transform -translate-y-1;
    }
    
    .stat-card::after {
        content: '';
        @apply absolute bottom-0 left-0 w-full h-1 bg-primary transform scale-x-0 transition-transform duration-300 origin-left;
    }
    
    .stat-card:hover::after {
        @apply transform scale-x-100;
    }
    
    .stat-value {
        @apply text-3xl font-bold text-secondary mb-1;
    }
    
    .stat-label {
        @apply text-xs text-gray-600;
    }
    
    .stat-icon {
        @apply absolute top-3 right-3 text-primary/20 text-xl transition-all duration-300;
    }
    
    .stat-card:hover .stat-icon {
        @apply text-primary/50 transform rotate-12;
    }
    
    /* CTA Buttons */
    .cta-button {
        @apply flex items-center gap-2 font-bold py-3 px-6 rounded-lg transition-all duration-300 shadow-md;
    }
    
    .cta-button:hover {
        @apply transform -translate-y-1 shadow-lg;
    }
    
    .cta-button.primary {
        @apply bg-primary text-white;
    }
    
    .cta-button.primary:hover {
        @apply bg-primary/90;
    }
    
    .cta-button.primary i {
        @apply transition-transform duration-300;
    }
    
    .cta-button.primary:hover i {
        @apply transform translate-x-1;
    }
    
    .cta-button.secondary {
        @apply bg-white text-secondary border-2 border-secondary;
    }
    
    .cta-button.secondary:hover {
        @apply bg-secondary/5;
    }
    
    /* Hero Image Container */
    .hero-image-container {
        @apply transform transition-all duration-500;
    }
    
    .hero-image-container:hover {
        @apply transform scale-[1.02];
    }
</style>