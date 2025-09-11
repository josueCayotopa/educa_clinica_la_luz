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
      <div><span class="font-semibold">Puntaje total (suma):</span> {{ number_format((float)$eval->PUNTAJE_TOTAL,0) }}</div>
      <div><span class="font-semibold">Puntaje (0–100):</span>
        {{ $score100 !== null ? number_format($score100,2) : '—' }}</div>
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

  <h2 class="text-lg font-semibold mb-2">Curva de aprendizaje (puntaje 0–100)</h2>
  <div id="curveWrapper" class="bg-white p-3 border rounded">
    <canvas id="curve" height="100"></canvas>
    <div id="empty" class="text-gray-600 text-sm mt-2 {{ count($cases)?'hidden':'' }}">
      No hay suficientes evaluaciones para graficar.
    </div>
    <div class="text-sm text-gray-700 mt-2">
      Las bandas de color representan las categorías de desempeño:
      <span class="inline-block w-3 h-3 align-middle rounded" style="background:rgba(239,68,68,.35)"></span>
      <span class="align-middle">Deficientes (&lt;70)</span>,
      <span class="inline-block w-3 h-3 align-middle rounded ml-2" style="background:rgba(234,179,8,.35)"></span>
      <span class="align-middle">Medios (70–89)</span>,
      <span class="inline-block w-3 h-3 align-middle rounded ml-2" style="background:rgba(34,197,94,.35)"></span>
      <span class="align-middle">Buenos (≥90)</span>.
      Eje X: <strong>número de caso</strong> (experiencia acumulada). Eje Y: <strong>puntaje ICO-OSCAR</strong> (0–100).
    </div>
  </div>

</div>

<script>
const cases  = @json($cases);   // [1..N]
const scores = @json($scores);  // 0–100 (o null)
const dates  = @json($dates);   // para tooltip opcional
let chart;

// Plugin de bandas de color
const bandsPlugin = {
  id: 'bands',
  beforeDraw(chart) {
    const {ctx, chartArea, scales} = chart;
    if (!chartArea) return;
    const {left, right} = chartArea;
    const y = scales.y;
    const y0 = v => y.getPixelForValue(v);

    ctx.save();
    // Rojo 0–70
    ctx.fillStyle = 'rgba(239, 68, 68, 0.12)';
    ctx.fillRect(left, y0(70), right-left, y0(0)-y0(70));
    // Amarillo 70–90
    ctx.fillStyle = 'rgba(234, 179, 8, 0.12)';
    ctx.fillRect(left, y0(90), right-left, y0(70)-y0(90));
    // Verde 90–100
    ctx.fillStyle = 'rgba(34, 197, 94, 0.12)';
    ctx.fillRect(left, y0(100), right-left, y0(90)-y0(100));
    ctx.restore();
  }
};

function buildChart() {
  const canvas = document.getElementById('curve');
  const emptyMsg = document.getElementById('empty');
  const ctx = canvas.getContext('2d');

  const valid = (scores || []).filter(v => v != null).length;
  const singlePoint = valid <= 1;

  if (!cases.length || valid === 0) {
    emptyMsg.classList.remove('hidden');
    return;
  }
  emptyMsg.classList.add('hidden');

  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: cases, // Nº de caso
      datasets: [{
        label: 'Puntaje (0–100)',
        data: scores,
        showLine: !singlePoint,
        tension: 0.25,
        borderWidth: 2,
        pointRadius: 3,
        pointHoverRadius: 5,
        spanGaps: false,
      }]
    },
    options: {
      responsive: true,
      animation: false,
      scales: {
        y: {
          min: 0, max: 100,
          title: { display: true, text: 'Puntaje ICO-OSCAR (0–100)' },
          grid: { color: '#e5e7eb' }
        },
        x: {
          offset: singlePoint,
          title: { display: true, text: 'Número de caso (experiencia acumulada)' },
          ticks: { autoSkip: true },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { position: 'top' },
        tooltip: {
          callbacks: {
            afterLabel: (ctx) => {
              const i = ctx.dataIndex;
              return dates && dates[i] ? `Fecha: ${dates[i]}` : undefined;
            }
          }
        }
      }
    },
    plugins: [bandsPlugin]
  });
}

// Convierte el canvas en IMG para que salga siempre al imprimir
function bakeChartToImage() {
  const canvas = document.getElementById('curve');
  if (!canvas) return;
  const url = canvas.toDataURL('image/png', 1.0);
  const img = new Image();
  img.src = url; img.style.width = '100%';
  const wrap = document.getElementById('curveWrapper');
  wrap.innerHTML = ''; wrap.appendChild(img);
}

function imprimir() {
  if (chart) bakeChartToImage();
  setTimeout(() => window.print(), 150);
}

document.addEventListener('DOMContentLoaded', () => {
  buildChart();
  @if($autoPrint) imprimir(); @endif
});
</script>
</body>
</html>
