<!-- Grid de Centros Quirúrgicos -->
<div class="mb-12">
    <h3 class="text-3xl font-bold text-secondary mb-8 text-center">Otros Centros Quirúrgicos</h3>
    
    <div class="grid md:grid-cols-3 gap-6">
        
        @php
        $centros = [
            [
                'nombre' => 'Sede Central - La Victoria',
                'imagen' => 'central.jpg',
                'descripcion' => '4 salas quirúrgicas especializadas con equipamiento completo',
                'salas' => 4,
                'destacado' => true
            ],
            [
                'nombre' => 'Sede Breña',
                'imagen' => 'brena.jpg',
                'descripcion' => 'Centro especializado en cirugía de córnea y segmento anterior',
                'salas' => 2,
                'destacado' => false
            ],
            [
                'nombre' => 'San Juan de Lurigancho',
                'imagen' => 'sjl.jpg',
                'descripcion' => 'Moderno centro con alto flujo de pacientes para entrenamiento',
                'salas' => 2,
                'destacado' => false
            ],
            [
                'nombre' => 'Sede Chiclayo',
                'imagen' => 'chiclayo.jpg',
                'descripcion' => 'Centro regional del norte con tecnología de punta',
                'salas' => 2,
                'destacado' => false
            ],
            [
                'nombre' => 'Sede Jaén',
                'imagen' => 'jaen.jpg',
                'descripcion' => 'Atención especializada en zona nororiental del país',
                'salas' => 1,
                'destacado' => false
            ],
        ];
        @endphp
        
        @foreach($centros as $centro)
        <div class="bg-white rounded-xl shadow-lg overflow-hidden card-hover">
            <div class="relative overflow-hidden">
                <img src="{{ asset('images/centros/' . $centro['imagen']) }}" 
                     alt="{{ $centro['nombre'] }}" 
                     class="w-full h-48 object-cover img-zoom cursor-pointer"
                     onclick="openModal('{{ asset('images/centros/' . $centro['imagen']) }}', '{{ $centro['nombre'] }}')">
                @if($centro['destacado'])
                <div class="absolute top-4 left-4">
                    <span class="bg-primary text-white px-3 py-1 rounded-full text-xs font-bold">
                        Principal
                    </span>
                </div>
                @endif
            </div>
            <div class="p-6">
                <h4 class="text-xl font-bold text-secondary mb-2">{{ $centro['nombre'] }}</h4>
                <p class="text-gray-600 text-sm mb-4">
                    {{ $centro['descripcion'] }}
                </p>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">
                        <i class="fas fa-procedures mr-2"></i>{{ $centro['salas'] }} {{ $centro['salas'] > 1 ? 'Salas' : 'Sala' }}
                    </span>
                    <button onclick="openModal('{{ asset('images/centros/' . $centro['imagen']) }}', '{{ $centro['nombre'] }}')" 
                            class="text-primary hover:text-secondary font-semibold">
                        Ver más <i class="fas fa-arrow-right ml-1"></i>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
        
    </div>
</div>