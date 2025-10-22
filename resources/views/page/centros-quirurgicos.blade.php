@extends('layouts.app')

@section('title', 'Centros Quirúrgicos - Clínica La Luz')

@push('styles')
<style>
    .card-hover {
        transition: all 0.3s ease;
    }

    .card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(177, 26, 26, 0.2);
    }

    .img-zoom {
        transition: transform 0.5s ease;
    }

    .img-zoom:hover {
        transform: scale(1.1);
    }

    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        animation: fadeIn 0.3s;
    }

    .modal.active {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

</style>
@endpush

@section('content')

<!-- Hero Section -->
<section class="bg-gradient-to-r from-secondary to-primary text-white py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <div class="inline-block mb-4">
                <span class="bg-white/20 backdrop-blur-md text-white px-6 py-2 rounded-full text-sm font-semibold">
                    <i class="fas fa-hospital-alt mr-2"></i>
                    Infraestructura de Vanguardia
                </span>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold mb-6">
                11 salas de operaciones en oftalmología de la red Clínica La Luz
            </h1>

            <div class="flex flex-wrap justify-center gap-6 text-lg">
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-2 text-2xl"></i>
                    <span>11 salas quirúrgicas a Nivel Nacional</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-2 text-2xl"></i>
                    <span>Tecnología de Vanguardia</span>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-check-circle text-green-400 mr-2 text-2xl"></i>
                    <span>Alto Volumen Quirúrgico</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Mapa de Sedes -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-secondary mb-4">
                Presencia Nacional
            </h2>
            <p class="text-xl text-gray-600">
                Centros quirúrgicos distribuidos estratégicamente en todo el país
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-6">
            <!-- Lima Central -->
            <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-8 border-2 border-primary/20 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-secondary">Sede Central</h3>
                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold">4 Sedes</span>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Sede Principal - Av Arequipa
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Breña
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        San Juan de Lurigancho
                    </li>

                </ul>
            </div>

            <!-- Norte -->
            <div class="bg-gradient-to-br from-secondary/10 to-secondary/5 rounded-2xl p-8 border-2 border-secondary/20 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-secondary"> Norte Peruano</h3>
                    <span class="bg-secondary text-white px-4 py-2 rounded-full text-sm font-bold">3 Sedes</span>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Chiclayo
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Jaén
                    </li>
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Cajamarca (Próximamente)
                    </li>
                </ul>
            </div>

            <!-- Sur -->
            <div class="bg-gradient-to-br from-primary/10 to-primary/5 rounded-2xl p-8 border-2 border-primary/20 card-hover">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-2xl font-bold text-secondary">Sur Peruano</h3>
                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold">2 Sedes</span>
                </div>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700">
                        <i class="fas fa-map-marker-alt text-primary mr-3"></i>
                        Tacna
                    </li>

                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Sede Principal-->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-secondary mb-4">
                Nuestros Centros Quirúrgicos
            </h2>
            <p class="text-xl text-gray-600">
                Instalaciones especializadas con equipamiento de última generación
            </p>
        </div>

        <!-- Sede Central Destacada -->
        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE CENTRAL</h3>

                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">4</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Sala 1 -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/06/DSC_0037-scaled.jpg" alt="Sala de Catarata - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg', 'Sala de Catarata - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala 1</h4>

                        </div>

                        <!-- SEDE CENTRAL - Sala 2 -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/06/F3.jpg" alt="Sala de Cirugía Refractiva - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg', 'Sala de Cirugía Refractiva - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala 2</h4>

                        </div>

                        <!-- SEDE CENTRAL - Sala 3 -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/Imagen-de-WhatsApp-2025-10-21-a-las-00.08.28_3977d2f5.jpg" alt="Sala de Cirugía Refractiva - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg', 'Sala de Cirugía Refractiva - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala 3</h4>

                        </div>
                        <!-- SEDE CENTRAL - Sala 4 -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/06/DSC_0217-scaled.jpg" alt="Sala de Cirugía Refractiva - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg', 'Sala de Cirugía Refractiva - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala 4</h4>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- SEDE SAN JUAN DE LURIGANCHO  Y BREÑA -->
        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE SAN JUAN DE LURIGANCHO Y BREÑA</h3>
                            <p class="text-lg opacity-90">Centro Especializado en Cirugía de Segmento Anterior</p>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">2</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Sala de SAN JUAN DE LURIGANCHO  -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/san-juan-.jpg" alt="Sala de Catarata - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg', 'Sala de Catarata - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de San Juan de Lurigancho</h4>

                        </div>

                        <!-- Sala de BREÑA -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/brena.jpg" alt="Sala de Cirugía Refractiva - Tacna" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg', 'Sala de Cirugía Refractiva - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Breña</h4>

                        </div>
                    </div>


                </div>
            </div>
        </div>
        <!-- SEDE JAEN -->
        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE JAÉN</h3>
                            <p class="text-lg opacity-90">Centro Especializado en Cirugía de Segmento Anterior, córnea y cirugía refractiva</p>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">1</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">

                    <!-- Sala de jaen  -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                            <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/06/F6.jpg" alt="Sala de Catarata - Tacna" class="w-full h-full object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg', 'Sala de Catarata - Tacna')">
                            <div class="absolute top-4 right-4">
                                <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                    <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                </span>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Jaén</h4>

                    </div>





                </div>
            </div>
        </div>
        <!-- SEDE CHICLAYO -->

        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE CHICLAYO</h3>
                            <p class="text-lg opacity-90">Centro Especializado en Cirugía de Segmento Anterior</p>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">2</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Sala darata -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/chiclayo.jpg" alt="Sala de Catarata - Chiclayo" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/chiclayo.jpg', 'Sala de Catarata - Chiclayo')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Catarata</h4>
                            
                        </div>

                        <!-- Sala de Refractiva -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/chiclayo-2.jpg" alt="Sala de Cirugía Refractiva - Chiclayo" class="w-full h-80 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/chiclayo-2.jpg', 'Sala de Cirugía Refractiva - Chiclayo')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Cirugía Refractiva</h4>
                            
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
     

        <!-- Sede Cajamarca Destacada -->

        <!-- Sede Tacna Destacada -->
        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE TACNA</h3>
                            <p class="text-lg opacity-90">Centro Especializado en Cirugía de Segmento Anterior</p>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">2</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Sala de Catarata -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg" alt="Sala de Catarata - Tacna" class="w-full h-64 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg', 'Sala de Catarata - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Catarata</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Facoemulsificador de última generación</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Microscopio quirúrgico Zeiss</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Sistema de grabación HD para docencia</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Capacidad: 15-20 cirugías/día</span>
                                </li>
                            </ul>
                        </div>

                        <!-- Sala de Refractiva -->
                        <div class="group">
                            <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                                <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg" alt="Sala de Cirugía Refractiva - Tacna" class="w-full h-64 object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/tacna.jpg', 'Sala de Cirugía Refractiva - Tacna')">
                                <div class="absolute top-4 right-4">
                                    <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                        <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                    </span>
                                </div>
                            </div>
                            <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Cirugía Refractiva</h4>
                            <ul class="space-y-2 text-gray-700">
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Láser Excimer de última generación</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Sistema de eye-tracking avanzado</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Femtosegundo para SMILE y flaps</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-check-circle text-primary mr-3 mt-1"></i>
                                    <span>Ambiente controlado ISO 5</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Estadísticas de Tacna -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-8 p-6 bg-gray-50 rounded-xl">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1">2500+</div>
                            <div class="text-sm text-gray-600">Cirugías/Año</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1">98%</div>
                            <div class="text-sm text-gray-600">Tasa de Éxito</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1">10</div>
                            <div class="text-sm text-gray-600">Cirujanos Activos</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-primary mb-1">24/7</div>
                            <div class="text-sm text-gray-600">Disponibilidad</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

          <!-- SEDE CAJAMARCA -->
        <div class="mb-20">
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden">
                <div class="bg-gradient-to-r from-primary to-secondary p-8 text-white">
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <h3 class="text-3xl font-bold mb-2">SEDE CAJAMARCA</h3>
                            <p class="text-lg opacity-90">Centro Especializado en Cirugía de Segmento Anterior, córnea y cirugía refractiva</p>
                        </div>
                        <div class="text-right">
                            <div class="text-4xl font-bold">1</div>
                            <div class="text-sm">Salas Quirúrgicas</div>
                        </div>
                    </div>
                </div>

                <div class="p-8">

                    <!-- Sala de jaen  -->
                    <div class="group">
                        <div class="relative overflow-hidden rounded-xl shadow-lg mb-4">
                            <img src="https://fernandop142.sg-host.com/wp-content/uploads/2025/10/sala-1.jpg" alt="Sala de Catarata - Tacna" class="w-full h-full object-cover img-zoom cursor-pointer" onclick="openModal('https://fernandop142.sg-host.com/wp-content/uploads/2025/10/TACNA-2.jpg', 'Sala de Catarata - Tacna')">
                            <div class="absolute top-4 right-4">
                                <span class="bg-primary text-white px-4 py-2 rounded-full text-sm font-bold shadow-lg">
                                    <i class="fas fa-eye mr-2"></i>Ver Ampliada
                                </span>
                            </div>
                        </div>
                        <h4 class="text-2xl font-bold text-secondary mb-3">Sala de Cajamarca</h4>

                    </div>





                </div>
            </div>
        </div>






    </div>
</section>

<!-- Equipamiento -->
@include('components.centros-equipamiento')

<!-- Call to Action -->
<section class="py-16 bg-gradient-to-r from-primary to-secondary text-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <h2 class="text-4xl font-bold mb-6">¿Listo para Entrenar en Nuestros Centros?</h2>
        <p class="text-xl mb-8 opacity-90">
            Forma parte de nuestro programa y accede a la mejor infraestructura quirúrgica del país
        </p>
        <div class="flex flex-wrap justify-center gap-4">
            <a href="#" class="inline-flex items-center bg-white text-primary font-bold py-4 px-8 rounded-xl hover:shadow-2xl transition-all duration-300">
                <i class="fas fa-calendar-check mr-3"></i>
                Agendar Visita
            </a>
            <a href="#" class="inline-flex items-center bg-white/20 backdrop-blur-md border-2 border-white text-white font-bold py-4 px-8 rounded-xl hover:bg-white hover:text-secondary transition-all duration-300">
                <i class="fas fa-phone mr-3"></i>
                Contactar
            </a>
        </div>
    </div>
</section>

<!-- Modal -->
<div id="imageModal" class="modal" onclick="closeModal()">
    <div class="relative max-w-6xl mx-auto p-4">
        <button onclick="closeModal()" class="absolute top-8 right-8 text-white text-4xl font-bold hover:text-gray-300 z-50">
            &times;
        </button>
        <img id="modalImage" src="" alt="" class="max-w-full max-h-screen mx-auto rounded-lg shadow-2xl">
        <p id="modalCaption" class="text-white text-center text-xl mt-4 font-semibold"></p>
    </div>
</div>

@endsection

@push('scripts')
<script>
    function openModal(src, caption) {
        const modal = document.getElementById('imageModal');
        const modalImg = document.getElementById('modalImage');
        const modalCaption = document.getElementById('modalCaption');

        modal.classList.add('active');
        modalImg.src = src;
        modalCaption.textContent = caption;
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        const modal = document.getElementById('imageModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });

</script>
@endpush
