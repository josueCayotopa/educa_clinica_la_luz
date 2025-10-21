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
    
    <!-- Header -->
    @include('components.header')
    <!-- Main Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    @include('components.footer')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    
    <script>
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');

        if (menuToggle && mobileMenu) {
            menuToggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
            });
        }

        // Mobile dropdown toggle
        function toggleMobileDropdown() {
            const submenu = document.getElementById('mobile-submenu');
            const icon = document.getElementById('mobile-dropdown-icon');
            if (submenu && icon) {
                submenu.classList.toggle('hidden');
                icon.classList.toggle('fa-chevron-down');
                icon.classList.toggle('fa-chevron-up');
            }
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
                    const header = document.getElementById('header');
                    // Calcular la posición considerando el header fijo
                    const headerHeight = header ? header.offsetHeight : 0;
                    const targetPosition = targetElement.offsetTop - headerHeight - 20;
                    
                    window.scrollTo({
                        top: targetPosition,
                        behavior: 'smooth'
                    });
                    
                    // Cerrar el menú móvil si está abierto
                    if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                        mobileMenu.classList.add('hidden');
                    }
                }
            });
        });

        // Header scroll effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (header) {
                if (window.scrollY > 50) {
                    header.classList.add('shadow-lg', 'border-b', 'border-gray-200');
                } else {
                    header.classList.remove('shadow-lg', 'border-b', 'border-gray-200');
                }
            }
        });
    </script>
    
    <!-- Scripts adicionales de las páginas -->
    @stack('scripts')

</body>
</html>