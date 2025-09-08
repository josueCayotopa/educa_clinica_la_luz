<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Evaluación #{{ $eval->ID }} — {{ $eval->procedimiento?->NOMBRE }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
  <style>
    @media print {
      .no-print { display: none !important; }
      .page-break { page-break-before: always; }
      body { background: #fff; }
    }
    th, td { border: 1px solid #e5e7eb; padding: 6px 8px; vertical-align: top; }
    table { border-collapse: collapse; width: 100%; font-size: 0.95rem; }
  </style>
</head>
<body class="bg-gray-50">
<div class="max-w-5xl mx-auto p-6 bg-white shadow rounded-lg">

  <div class="flex items-center justify-between mb-4">
    <h1 class="text-xl font-semibold">Evaluación de procedimiento</h1>
    <button class="no-print px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700"
            onclick="imprimir()">Imprimir</button>
  </div>

  <div class="grid grid-cols-2 gap-4 mb-4">
    <div>
      <div><span class="font-semibold">Residente:</span>
        {{ $eval->residenteUser?->name ?? $eval->residenteUser?->usuario ?? '—' }}</div>
      <div><span class="font-semibold">Procedimiento:</span> {{ $eval->procedimiento?->NOMBRE }}</div>
    </div>
    <div>
      <div><span class="font-semibold">Fecha:</span>
        {{ $eval->FECHA_EVALUACION?->format('Y-m-d') ?? (string)$eval->FECHA_EVALUACION }}</div>
      <div><span class="font-semibold">Puntaje:</span> {{ number_format((float)$eval->PUNTAJE_TOTAL,0) }}</div>
      <div><span class="font-semibold">Promedio:</span>
        {{ $eval->PROMEDIO !== null ? number_format((float)$eval->PROMEDIO,2) : '—' }}</div>
    </div>
  </div>

  @if($eval->OBSERVACIONES)
    <div class="mb-4">
      <div class="font-semibold mb-1">Comentarios</div>
      <div class="whitespace-pre-wrap">{{ $eval->OBSERVACIONES }}</div>
    </div>
  @endif

  <h2 class="text-lg font-semibold mb-2">Pasos y respuestas</h2>
  <table class="mb-6">
    <thead>
    <tr>
      <th style="width:50px;">#</th>
      <th>Paso</th>
      <th style="width:220px;">Nivel elegido</th>
      <th style="width:90px;">Puntaje</th>
      <th>Observación</th>
    </tr>
    </thead>
    <tbody>
    @foreach($resps as $r)
      <tr>
        <td>{{ $r->pregunta?->ORDEN ?? '—' }}</td>
        <td>{{ $r->pregunta?->PREGUNTA ?? '—' }}</td>
        <td>
          @if($r->opcion)
            <div class="font-semibold">{{ $r->opcion->ETIQUETA }} ({{ $r->opcion->VALOR }})</div>
            <div class="text-gray-600 text-sm">{{ $r->opcion->DESCRIPCION }}</div>
          @else
            —
          @endif
        </td>
        <td class="text-center">{{ $r->VALOR ?? '—' }}</td>
        <td>{{ $r->OBSERVACION ?? '' }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>

  <div class="page-break"></div>

  <h2 class="text-lg font-semibold mb-2">Curva de aprendizaje (residente / mismo procedimiento)</h2>
  <div id="curveWrapper" class="bg-white p-3 border rounded">
    <canvas id="curve" height="100"></canvas>
    <div id="empty" class="text-gray-600 text-sm mt-2 {{ count($labels)?'hidden':'' }}">
      No hay suficientes evaluaciones para graficar.
    </div>
  </div>

</div>

<script>
const labels  = @json($labels);
const promedio = @json($prom);
const ref = {{ $ref }};
let chart;

function buildChart() {
  if (!labels.length || promedio.filter(v => v!=null).length === 0) return;

  const ctx = document.getElementById('curve').getContext('2d');
  const valid = promedio.filter(v => v!=null).length;
  const singlePoint = valid <= 1;

  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels,
      datasets: [
        { label: 'Promedio', data: promedio, showLine: !singlePoint, tension: 0.25, borderWidth: 2, pointRadius: 3 },
        { label: 'Referencia 4.0', data: labels.map(()=>ref), showLine: true, borderDash:[8,6], pointRadius: 0, borderWidth: 1 }
      ]
    },
    options: {
      responsive: true,
      animation: false,
      scales: {
        y: { min:0, max:5, title:{display:true,text:'Promedio (0–5)'} },
        x: { offset: singlePoint, ticks:{maxRotation:45,minRotation:45}, title:{display:true,text:'Fecha'} }
      },
      plugins: { legend: { position:'top' } }
    }
  });
}

// Convierte el canvas en imagen para que SIEMPRE salga al imprimir
function bakeChartToImage() {
  const canvas = document.getElementById('curve');
  if (!canvas) return;
  const url = canvas.toDataURL('image/png', 1.0);
  const img = new Image(); img.src = url; img.style.width = '100%';
  const wrap = document.getElementById('curveWrapper');
  wrap.innerHTML = ''; wrap.appendChild(img);
}

function imprimir() {
  if (chart) { bakeChartToImage(); }
  setTimeout(()=> window.print(), 150);
}

// Render inicial
document.addEventListener('DOMContentLoaded', () => {
  buildChart();
  // Autoprint si viene con ?print=1 (por defecto true)
  @if($autoPrint) imprimir(); @endif
});
</script>
</body>
</html>
