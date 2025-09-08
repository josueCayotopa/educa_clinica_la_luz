<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evaluación Quirúrgica ICO-OSCAR</title>
    <!-- Added Tailwind CSS CDN and custom color configuration -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#B11A1A',
                        secondary: '#0D3049',
                        accent: '#669BBB',
                    }
                }
            }
        }
    </script>
    <style>
        /* Minimal custom styles for specific components that need exact colors */
        .badge-na { background: #f3f4f6; color: #6b7280; }
        .badge-novice { background: #fef2f2; color: #dc2626; border: 1px solid #fecaca; }
        .badge-beginner { background: #fffbeb; color: #d97706; border: 1px solid #fed7aa; }
        .badge-advanced { background: #eff6ff; color: #2563eb; border: 1px solid #bfdbfe; }
        .badge-competent { background: #f0fdf4; color: #16a34a; border: 1px solid #bbf7d0; }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gradient-to-br from-white to-slate-50 min-h-screen text-secondary font-sans">
    <!-- Converted header to Tailwind classes with modern styling -->
    <header class="bg-white shadow-lg border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 py-6">
            <div class="flex items-center gap-4">
                <div class="w-14 h-14 rounded-full bg-accent/10 flex items-center justify-center text-accent shadow-md">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-secondary mb-1">Evaluación Quirúrgica ICO-OSCAR</h1>
                    <p class="text-accent font-semibold">Catarata - Programa de Excelencia</p>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- Modern tab design with Tailwind -->
        <div class="mb-8">
            <div class="grid grid-cols-1 md:grid-cols-3 bg-white rounded-xl shadow-lg overflow-hidden border border-gray-100">
                <button class="tab-button px-6 py-4 bg-primary text-white font-semibold flex items-center justify-center gap-3 transition-all duration-200 hover:bg-primary/90" onclick="showTab('evaluation')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                        <polyline points="14,2 14,8 20,8"/>
                        <line x1="16" y1="13" x2="8" y2="13"/>
                        <line x1="16" y1="17" x2="8" y2="17"/>
                        <polyline points="10,9 9,9 8,9"/>
                    </svg>
                    Evaluación
                </button>
                <button class="tab-button px-6 py-4 bg-white text-secondary font-semibold flex items-center justify-center gap-3 transition-all duration-200 hover:bg-gray-50" onclick="showTab('history')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                        <line x1="16" y1="2" x2="16" y2="6"/>
                        <line x1="8" y1="2" x2="8" y2="6"/>
                        <line x1="3" y1="10" x2="21" y2="10"/>
                    </svg>
                    Historial
                </button>
                <button class="tab-button px-6 py-4 bg-white text-secondary font-semibold flex items-center justify-center gap-3 transition-all duration-200 hover:bg-gray-50" onclick="showTab('curve')">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"/>
                        <polyline points="17 6 23 6 23 12"/>
                    </svg>
                    Curva de Aprendizaje
                </button>
            </div>
        </div>

        <!-- Modern card design with Tailwind for Evaluation Tab -->
        <div id="evaluation" class="tab-content">
            <div class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden border-l-4 border-primary">
                <div class="bg-gradient-to-r from-primary/5 to-accent/5 px-6 py-5 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-secondary">Información General</h2>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-secondary">Procedimiento</label>
                            <select id="procedure" class="w-full px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" onchange="loadRubric()">
                                <!-- Options will be loaded from Laravel API -->
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-secondary">Evaluador</label>
                            <input type="text" id="evaluador" class="w-full px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" placeholder="Nombre del evaluador">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-semibold text-secondary">Fecha</label>
                            <input type="date" id="fecha" class="w-full px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200">
                        </div>
                    </div>
                </div>
            </div>

            <div id="rubric-section" class="bg-white rounded-xl shadow-lg mb-8 overflow-hidden border-l-4 border-accent hidden">
                <div class="bg-gradient-to-r from-accent/5 to-primary/5 px-6 py-5 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-secondary" id="rubric-title">Pasos del procedimiento - Extracción Extracapsular (ECCE)</h2>
                </div>
                <div class="p-6">
                    <div id="rubric-steps" class="space-y-6"></div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-secondary">
                <div class="p-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-semibold text-secondary mb-2">Comentarios</label>
                            <textarea id="comentarios" class="w-full px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200 resize-none" rows="4" placeholder="Comentarios adicionales"></textarea>
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <button class="bg-primary hover:bg-primary/90 text-white px-6 py-3 rounded-lg font-semibold flex items-center gap-3 transition-all duration-200 shadow-md hover:shadow-lg" onclick="submitEvaluation()">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"/>
                                    <polyline points="17,21 17,13 7,13 7,21"/>
                                    <polyline points="7,3 7,8 15,8"/>
                                </svg>
                                Guardar evaluación
                            </button>
                            <button class="bg-white hover:bg-gray-50 text-accent border-2 border-accent px-6 py-3 rounded-lg font-semibold flex items-center gap-3 transition-all duration-200 shadow-md hover:shadow-lg" onclick="window.print()">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <polyline points="6,9 6,2 18,2 18,9"/>
                                    <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/>
                                    <rect x="6" y="14" width="12" height="8"/>
                                </svg>
                                Exportar/Imprimir PDF
                            </button>
                        </div>

                        <div id="results" class="hidden bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-lg p-4">
                            <div id="results-text" class="text-green-800 font-semibold"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern History Tab with Tailwind -->
        <div id="history" class="tab-content hidden">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-accent">
                <div class="bg-gradient-to-r from-accent/5 to-secondary/5 px-6 py-5 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-secondary">Historial de Evaluaciones</h2>
                </div>
                <div class="p-6">
                    <div class="mb-6">
                        <label class="block text-sm font-semibold text-secondary mb-2">Procedimiento</label>
                        <select id="history-procedure-filter" class="w-full max-w-sm px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" onchange="loadHistorial()">
                            <option value="all">Todos los procedimientos</option>
                        </select>
                    </div>

                    <div class="overflow-x-auto rounded-lg border border-gray-200">
                        <table class="w-full">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th class="px-6 py-4 text-left font-semibold">Fecha</th>
                                    <th class="px-6 py-4 text-left font-semibold">Procedimiento</th>
                                    <th class="px-6 py-4 text-left font-semibold">Total</th>
                                    <th class="px-6 py-4 text-left font-semibold">Porcentaje</th>
                                    <th class="px-6 py-4 text-left font-semibold">Evaluador</th>
                                    <th class="px-6 py-4 text-left font-semibold">Comentarios</th>
                                </tr>
                            </thead>
                            <tbody id="history-tbody" class="bg-white divide-y divide-gray-200">
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                        No hay evaluaciones registradas
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modern Learning Curve Tab with Tailwind -->
        <div id="curve" class="tab-content hidden">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border-l-4 border-primary">
                <div class="bg-gradient-to-r from-primary/5 to-accent/5 px-6 py-5 border-b border-gray-100">
                    <h2 class="text-xl font-bold text-secondary">Curva de Aprendizaje</h2>
                </div>
                <div class="p-6">
                    <div class="mb-8">
                        <label class="block text-sm font-semibold text-secondary mb-2">Procedimiento</label>
                        <select id="curve-procedure-filter" class="w-full max-w-sm px-4 py-3 border border-accent/30 rounded-lg focus:ring-2 focus:ring-primary focus:border-primary transition-all duration-200" onchange="updateLearningCurve()">
                            <option value="all">Todos los procedimientos</option>
                        </select>
                    </div>

                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <canvas id="learning-curve" width="800" height="400" class="w-full h-auto max-h-96 rounded-lg bg-white shadow-sm"></canvas>
                    </div>

                    <div id="curve-stats" class="mt-6">
                        <!-- Statistics will be displayed here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const API_BASE = '/api/v1';
        let scores = {};
        let currentUser = null;
        let currentProcedures = [];
        let currentQuestions = [];
        let searchTimeout;

        async function loadCurrentUser() {
            try {
                console.log('[v0] Loading current user...');
                const response = await fetch(`${API_BASE}/user/current`);
                console.log('[v0] User response status:', response.status);
                
                if (response.ok) {
                    currentUser = await response.json();
                    console.log('[v0] Current user loaded:', currentUser);
                    // Auto-fill evaluador field with current user name
                    const evaluadorInput = document.getElementById('evaluador');
                    if (evaluadorInput && currentUser) {
                        evaluadorInput.value = currentUser.name || currentUser.usuario || '';
                        console.log('[v0] Evaluador field filled with:', evaluadorInput.value);
                    }
                } else {
                    console.log('[v0] Failed to load user, status:', response.status);
                }
            } catch (error) {
                console.error('[v0] Error loading current user:', error);
            }
        }

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            console.log('[v0] DOM loaded, initializing...');
            const fechaInput = document.getElementById('fecha');
            if (fechaInput) {
                fechaInput.value = new Date().toISOString().split('T')[0];
                console.log('[v0] Date field set to:', fechaInput.value);
            }
            
            loadCurrentUser(); // Load current user first
            loadProcedures();
            loadHistorial();
        });

        async function loadProcedures() {
            try {
                console.log('[v0] Starting to load procedures...');
                const select = document.getElementById('procedure');
                select.innerHTML = '<option value="">Cargando procedimientos...</option>';
                
                const url = `${API_BASE}/fellow/procedimientos`;
                console.log('[v0] Fetching from URL:', url);
                
                const response = await fetch(url);
                console.log('[v0] Response status:', response.status);
                console.log('[v0] Response headers:', response.headers);
                
                if (!response.ok) {
                    const errorText = await response.text();
                    console.error('[v0] Response error text:', errorText);
                    throw new Error(`HTTP error! status: ${response.status}, text: ${errorText}`);
                }
                
                const procedures = await response.json();
                console.log('[v0] Procedures received:', procedures);
                currentProcedures = procedures;
                
                select.innerHTML = '<option value="">-- Seleccionar procedimiento --</option>';
                
                if (procedures && procedures.length > 0) {
                    procedures.forEach(proc => {
                        console.log('[v0] Adding procedure:', proc);
                        const option = document.createElement('option');
                        option.value = proc.ID;
                        option.textContent = `${proc.NOMBRE}${proc.DESCRIPCION ? ' - ' + proc.DESCRIPCION : ''}`;
                        select.appendChild(option);
                    });
                    
                    console.log(`[v0] Loaded ${procedures.length} procedures successfully`);
                } else {
                    select.innerHTML = '<option value="">No hay procedimientos disponibles</option>';
                    console.log('[v0] No procedures found in response');
                }

                const historySelect = document.getElementById('history-procedure-filter');
                const curveSelect = document.getElementById('curve-procedure-filter');
                
                if (historySelect) {
                    historySelect.innerHTML = '<option value="all">Todos los procedimientos</option>';
                    if (procedures && procedures.length > 0) {
                        procedures.forEach(proc => {
                            const option = document.createElement('option');
                            option.value = proc.ID;
                            option.textContent = proc.NOMBRE;
                            historySelect.appendChild(option);
                        });
                    }
                    console.log('[v0] History filter populated');
                }
                
                if (curveSelect) {
                    curveSelect.innerHTML = '<option value="all">Todos los procedimientos</option>';
                    if (procedures && procedures.length > 0) {
                        procedures.forEach(proc => {
                            const option = document.createElement('option');
                            option.value = proc.ID;
                            option.textContent = proc.NOMBRE;
                            curveSelect.appendChild(option);
                        });
                    }
                    console.log('[v0] Curve filter populated');
                }
                
            } catch (error) {
                console.error('[v0] Error loading procedures:', error);
                console.error('[v0] Error stack:', error.stack);
                const select = document.getElementById('procedure');
                select.innerHTML = '<option value="">Error al cargar procedimientos</option>';
                
                alert(`Error al cargar los procedimientos: ${error.message}. Por favor, verifique:\n1. Que el servidor Laravel esté ejecutándose\n2. Que las rutas API estén configuradas\n3. Que la base de datos tenga datos en FELLOW_PROCEDIMIENTOS`);
            }
        }

        async function searchPatients() {
            const query = document.getElementById('patient-search').value;
            const resultsDiv = document.getElementById('patient-results');
            const patientInfoDiv = document.getElementById('selected-patient-info');
            
            if (query.length < 2) {
                resultsDiv.classList.add('hidden');
                patientInfoDiv.classList.add('hidden');
                return;
            }

            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(async () => {
                try {
                    const response = await fetch(`${API_BASE}/pacientes/buscar?q=${encodeURIComponent(query)}`);
                    const patients = await response.json();
                    
                    if (patients.length === 0) {
                        resultsDiv.innerHTML = '<div class="p-3 text-gray-500">No se encontraron pacientes</div>';
                    } else {
                        resultsDiv.innerHTML = patients.map(patient => `
                            <div class="p-3 hover:bg-gray-50 cursor-pointer border-b border-gray-100 last:border-b-0" onclick="selectPatient('${patient.id}', '${patient.nombre_completo}', '${patient.num_hc}', '${patient.dni || ''}', '${patient.cod_atencion || ''}')">
                                <div class="font-semibold text-secondary">${patient.nombre_completo}</div>
                                <div class="text-sm text-gray-600">
                                    HC: ${patient.num_hc} | DNI: ${patient.dni || 'N/A'} 
                                    ${patient.cod_atencion ? `| Atención: ${patient.cod_atencion}` : ''}
                                    | ${patient.fecha_nacimiento || 'Sin fecha'}
                                </div>
                            </div>
                        `).join('');
                    }
                    resultsDiv.classList.remove('hidden');
                    patientInfoDiv.classList.add('hidden');
                } catch (error) {
                    console.error('Error searching patients:', error);
                }
            }, 300);
        }

        function selectPatient(id, name, hc, dni, codAtencion) {
            document.getElementById('selected-patient-id').value = id;
            const patientInfoDiv = document.getElementById('selected-patient-info');
            patientInfoDiv.innerHTML = `
                <div class="font-semibold text-secondary">${name}</div>
                <div class="text-sm text-gray-600">
                    HC: ${hc} | DNI: ${dni || 'N/A'} 
                    ${codAtencion ? `| Atención: ${codAtencion}` : ''}
                </div>
            `;
            patientInfoDiv.classList.remove('hidden');
            document.getElementById('patient-search').value = name;
            document.getElementById('patient-results').classList.add('hidden');
        }

        async function loadRubric() {
            const procedureId = document.getElementById('procedure').value;
            if (!procedureId) {
                document.getElementById('rubric-section').classList.add('hidden');
                return;
            }

            try {
                const container = document.getElementById('rubric-steps');
                container.innerHTML = '<div class="text-center py-8"><div class="text-gray-500">Cargando preguntas de evaluación...</div></div>';
                document.getElementById('rubric-section').classList.remove('hidden');
                
                const response = await fetch(`${API_BASE}/fellow/procedimientos/${procedureId}/preguntas`);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const questions = await response.json();
                currentQuestions = questions;
                
                const title = document.getElementById('rubric-title');
                
                const procedure = currentProcedures.find(p => p.ID == procedureId);
                title.textContent = `Evaluación ICO-OSCAR - ${procedure?.NOMBRE || 'Procedimiento'}`;
                
                container.innerHTML = '';
                scores = {};

                if (!questions || questions.length === 0) {
                    container.innerHTML = '<div class="text-center py-8"><div class="text-gray-500">No hay preguntas configuradas para este procedimiento</div></div>';
                    return;
                }

                questions.forEach((question, index) => {
                    const stepDiv = document.createElement('div');
                    stepDiv.className = 'bg-white border-l-4 border-primary rounded-lg p-6 shadow-sm hover:shadow-md transition-all duration-200';
                    
                    let optionsHTML = '';
                    
                    if (question.opciones && question.opciones.length > 0) {
                        question.opciones.forEach(opcion => {
                            optionsHTML += `
                                <label class="flex items-start space-x-3 p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200">
                                    <input type="radio" name="step_${question.ID}" value="${opcion.ID}" data-score="${opcion.VALOR}" 
                                           class="mt-1 text-primary focus:ring-primary focus:ring-2" 
                                           onchange="updateScore(${question.ID}, ${opcion.VALOR}, ${opcion.ID})">
                                    <div class="flex-1">
                                        <div class="font-semibold text-secondary">${opcion.ETIQUETA} (${opcion.VALOR} puntos)</div>
                                        ${opcion.DESCRIPCION ? `<div class="text-sm text-gray-600 mt-1">${opcion.DESCRIPCION}</div>` : ''}
                                    </div>
                                </label>
                            `;
                        });
                    } else {
                        optionsHTML = '<div class="text-gray-500 italic">No hay opciones configuradas para esta pregunta</div>';
                    }

                    stepDiv.innerHTML = `
                        <div class="mb-4">
                            <h4 class="text-lg font-bold text-secondary mb-2">Paso ${index + 1}: ${question.PREGUNTA}</h4>
                            ${question.DESCRIPCION ? `<p class="text-gray-600 mb-4">${question.DESCRIPCION}</p>` : ''}
                        </div>
                        <div class="space-y-2">
                            ${optionsHTML}
                        </div>
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Observaciones (opcional):</label>
                            <textarea id="obs_${question.ID}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent" 
                                      rows="2" placeholder="Comentarios específicos sobre este paso..."></textarea>
                        </div>
                    `;
                    
                    container.appendChild(stepDiv);
                });

                console.log(`[v0] Loaded ${questions.length} questions for procedure ${procedureId}`);
                
            } catch (error) {
                console.error('Error loading rubric:', error);
                const container = document.getElementById('rubric-steps');
                container.innerHTML = '<div class="text-center py-8"><div class="text-red-500">Error al cargar las preguntas de evaluación</div></div>';
            }
        }

        function updateScore(questionId, score, opcionId) {
            scores[questionId] = {
                pregunta_id: questionId,
                opcion_id: opcionId,
                valor: score,
                observacion: document.getElementById(`obs_${questionId}`)?.value || ''
            };
            updateResults();
        }

        // Calculate results
        function calculateResults() {
            let total = 0;
            let count = 0;

            for (const questionId in scores) {
                if (scores.hasOwnProperty(questionId)) {
                    total += scores[questionId].valor;
                    count++;
                }
            }

            const promedio = count > 0 ? total / count : 0;
            return { total, promedio, count };
        }

        function updateResults() {
            const results = calculateResults();
            const resultsDiv = document.getElementById('results');
            const resultsText = document.getElementById('results-text');

            if (results && results.count > 0) {
                resultsText.innerHTML = `
                    <div class="text-center">
                        <div class="text-2xl font-bold text-primary mb-2">${results.total} puntos</div>
                        <div class="text-lg text-secondary">Promedio: ${results.promedio.toFixed(2)} puntos</div>
                    </div>
                `;
                resultsDiv.classList.remove('hidden');
            } else {
                resultsDiv.classList.add('hidden');
            }
        }

        async function submitEvaluation() {
            const pacienteId = document.getElementById('selected-patient-id').value;
            const procedureId = document.getElementById('procedure').value;
            const evaluador = document.getElementById('evaluador').value;
            const fecha = document.getElementById('fecha').value;
            const comentarios = document.getElementById('comentarios').value;

            if (!pacienteId || !procedureId || !evaluador || !fecha) {
                alert('Por favor complete todos los campos obligatorios');
                return;
            }

            if (Object.keys(scores).length === 0) {
                alert('Por favor complete al menos una evaluación');
                return;
            }

            // Add observations to scores
            Object.keys(scores).forEach(questionId => {
                const obsTextarea = document.getElementById(`obs_${questionId}`);
                if (obsTextarea) {
                    scores[questionId].observacion = obsTextarea.value || '';
                }
            });

            const evaluationData = {
                cod_paciente: pacienteId,
                procedimiento_id: procedureId,
                evaluador: evaluador,
                fecha_evaluacion: fecha,
                respuestas: Object.values(scores),
                observaciones: comentarios
            };

            try {
                const response = await fetch(`${API_BASE}/fellow/evaluaciones`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                    },
                    body: JSON.stringify(evaluationData)
                });

                const result = await response.json();

                if (result.success) {
                    // Show results
                    const results = calculateResults();
                    const resultsDiv = document.getElementById('results');
                    const resultsText = document.getElementById('results-text');
                    resultsText.innerHTML = `
                        <div class="text-center">
                            <div class="text-2xl font-bold text-primary mb-2">${results.total} / ${results.count * 5} puntos</div>
                            <div class="text-lg text-secondary">Promedio: ${results.promedio.toFixed(2)} puntos</div>
                            <div class="text-sm text-gray-600 mt-2">Porcentaje: ${result.evaluacion.PORCENTAJE}%</div>
                        </div>
                    `;
                    resultsDiv.classList.remove('hidden');

                    alert('¡Evaluación guardada exitosamente!');
                    
                    // Reset form
                    resetForm();
                    loadHistorial(); // Refresh history
                    
                } else {
                    alert('Error al guardar la evaluación: ' + result.message);
                }
            } catch (error) {
                console.error('Error submitting evaluation:', error);
                alert('Error al enviar la evaluación');
            }
        }

        async function loadHistorial() {
            const tbody = document.getElementById('history-tbody');
            const procedureFilter = document.getElementById('history-procedure-filter')?.value;
            
            try {
                let url = `${API_BASE}/fellow/historial`;
                if (procedureFilter && procedureFilter !== 'all') {
                    url += `?procedimiento_id=${procedureFilter}`;
                }

                const response = await fetch(url);
                const evaluaciones = await response.json();
                
                if (evaluaciones.length === 0) {
                    tbody.innerHTML = '<tr><td colspan="6" class="px-6 py-8 text-center text-gray-500">No hay evaluaciones registradas</td></tr>';
                    return;
                }

                tbody.innerHTML = evaluaciones.map(ev => `
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 text-sm">${new Date(ev.FECHA_EVALUACION).toLocaleDateString('es-ES')}</td>
                        <td class="px-6 py-4 text-sm font-medium">${ev.procedimiento?.NOMBRE || 'N/A'}</td>
                        <td class="px-6 py-4 text-sm font-semibold text-primary">${ev.PUNTAJE_TOTAL || 0}</td>
                        <td class="px-6 py-4 text-sm">${ev.PORCENTAJE ? ev.PORCENTAJE.toFixed(2) + '%' : '0%'}</td>
                        <td class="px-6 py-4 text-sm">${ev.EVALUADOR || 'N/A'}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">${ev.OBSERVACIONES || 'Sin comentarios'}</td>
                    </tr>
                `).join('');
            } catch (error) {
                console.error('Error loading history:', error);
                tbody.innerHTML = '<tr><td colspan="6" class="px-6 py-8 text-center text-red-500">Error al cargar el historial</td></tr>';
            }
        }

        async function updateLearningCurve() {
            const canvas = document.getElementById('learning-curve');
            const ctx = canvas.getContext('2d');
            const curveProc = document.getElementById('curve-procedure-filter')?.value;

            try {
                let apiUrl = `${API_BASE}/fellow/curva-aprendizaje`;
                if (curveProc && curveProc !== 'all') {
                    apiUrl += `?procedimiento_id=${curveProc}`;
                }

                const response = await fetch(apiUrl);
                const data = await response.json();

                if (!data.datos || data.datos.length === 0) {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                    ctx.fillStyle = '#6B7280';
                    ctx.font = '16px Arial';
                    ctx.textAlign = 'center';
                    ctx.fillText('No hay datos suficientes para mostrar la curva', canvas.width / 2, canvas.height / 2);
                    return;
                }

                const evals = data.datos;
                const padding = { left: 60, right: 20, top: 20, bottom: 70 };
                const plotWidth = canvas.width - padding.left - padding.right;
                const plotHeight = canvas.height - padding.top - padding.bottom;

                ctx.clearRect(0, 0, canvas.width, canvas.height);

                // Draw axes
                ctx.strokeStyle = '#E5E7EB';
                ctx.lineWidth = 1;
                ctx.beginPath();
                ctx.moveTo(padding.left, padding.top);
                ctx.lineTo(padding.left, canvas.height - padding.bottom);
                ctx.lineTo(canvas.width - padding.right, canvas.height - padding.bottom);
                ctx.stroke();

                if (evals.length > 0) {
                    const maxScore = Math.max(...evals.map(e => e.puntaje || 0));
                    const minScore = Math.min(...evals.map(e => e.puntaje || 0));
                    const scoreRange = Math.max(maxScore - minScore, 1);

                    // Draw data points and line
                    ctx.strokeStyle = '#B11A1A';
                    ctx.fillStyle = '#B11A1A';
                    ctx.lineWidth = 2;
                    ctx.beginPath();

                    evals.forEach((eval, index) => {
                        const x = padding.left + (index / Math.max(evals.length - 1, 1)) * plotWidth;
                        const y = canvas.height - padding.bottom - ((eval.puntaje - minScore) / scoreRange) * plotHeight;

                        if (index === 0) {
                            ctx.moveTo(x, y);
                        } else {
                            ctx.lineTo(x, y);
                        }

                        // Draw point
                        ctx.beginPath();
                        ctx.arc(x, y, 4, 0, 2 * Math.PI);
                        ctx.fill();
                        ctx.beginPath();
                    });

                    ctx.stroke();

                    // Add labels
                    ctx.fillStyle = '#374151';
                    ctx.font = '12px Arial';
                    ctx.textAlign = 'center';
                    ctx.fillText('Evaluaciones', canvas.width / 2, canvas.height - 10);

                    ctx.save();
                    ctx.translate(15, canvas.height / 2);
                    ctx.rotate(-Math.PI / 2);
                    ctx.fillText('Puntaje', 0, 0);
                    ctx.restore();

                    // Show statistics
                    const statsDiv = document.getElementById('curve-stats');
                    if (statsDiv) {
                        statsDiv.innerHTML = `
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <div class="text-2xl font-bold text-primary">${data.total_evaluaciones}</div>
                                    <div class="text-sm text-gray-600">Evaluaciones</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <div class="text-2xl font-bold text-secondary">${data.promedio_puntaje ? data.promedio_puntaje.toFixed(1) : '0'}</div>
                                    <div class="text-sm text-gray-600">Promedio</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <div class="text-2xl font-bold text-accent">${data.promedio_porcentaje ? data.promedio_porcentaje.toFixed(1) : '0'}%</div>
                                    <div class="text-sm text-gray-600">Porcentaje</div>
                                </div>
                                <div class="bg-white p-4 rounded-lg shadow">
                                    <div class="text-2xl font-bold text-green-600">${data.mejor_evaluacion ? data.mejor_evaluacion.PUNTAJE_TOTAL : '0'}</div>
                                    <div class="text-sm text-gray-600">Mejor puntaje</div>
                                </div>
                            </div>
                        `;
                    }
                }
            } catch (error) {
                console.error('Error updating learning curve:', error);
            }
        }

        function resetForm() {
            document.getElementById('patient-search').value = '';
            document.getElementById('selected-patient-id').value = '';
            document.getElementById('selected-patient-info').classList.add('hidden');
            document.getElementById('procedure').value = '';
            document.getElementById('fecha').value = '';
            document.getElementById('comentarios').value = '';
            document.getElementById('rubric-section').classList.add('hidden');
            document.getElementById('results').classList.add('hidden');
            scores = {};
        }

        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.tab-content').forEach(tab => {
                tab.classList.add('hidden');
            });
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white');
                btn.classList.add('bg-white', 'text-secondary', 'hover:bg-gray-50');
            });

            // Show selected tab
            document.getElementById(tabName).classList.remove('hidden');
            event.target.classList.remove('bg-white', 'text-secondary', 'hover:bg-gray-50');
            event.target.classList.add('bg-primary', 'text-white');

            if (tabName === 'curve') {
                setTimeout(updateLearningCurve, 100);
            }
        }
    </script>
</body>
</html>
