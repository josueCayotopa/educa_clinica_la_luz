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
                <a href="/" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Inicio</a>
                <a href="/#objetivos" class="text-secondary hover:text-primary transition-colors duration-300 font-semibold">Objetivos</a>
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