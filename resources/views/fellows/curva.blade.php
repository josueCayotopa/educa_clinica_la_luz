{{-- resources/views/fellows/curva.blade.php --}}
@php $canAll = auth()->user()->canViewAllFellowEvals(); @endphp
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Curva de aprendizaje</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
</head>
<body class="bg-gray-50">
<div class="max-w-6xl mx-auto p-6">
  <h1 class="text-2xl font-semibold text-gray-800 mb-4">Curva de aprendizaje</h1>

  <div class="bg-white p-4 rounded-xl shadow mb-4 grid md:grid-cols-3 gap-3">
    <div>
      <label class="block text-sm font-medium mb-1">Residente</label>
      <select id="residente" class="w-full border rounded px-3 py-2" {{ $canAll ? '' : 'disabled' }}>
      @foreach ($residentes as $r)
        <option value="{{ $r->id }}" @selected($r->id == $residenteId)>{{ $r->name }}</option>
      @endforeach
    </select>
    </div>
    <div>
      <label class="block text-sm font-medium mb-1">Procedimiento</label>
      <select id="procedimiento" class="w-full border rounded px-3 py-2">
       
        @foreach ($procedimientos as $p)
          <option value="{{ $p->ID }}" @selected((string)$p->ID === (string)$procedimientoId)>{{ $p->NOMBRE }}</option>
        @endforeach
      </select>
    </div>
    <div class="flex items-end">
      <button id="filtrar" class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700 w-full">Mostrar Grafico</button>
    </div>
  </div>

  <div class="bg-white p-4 rounded-xl shadow">
    <canvas id="curve" height="90"></canvas>
    <div id="empty" class="text-gray-600 text-sm mt-2 hidden">No hay suficientes evaluaciones para graficar.</div>
  </div>
</div>

<script>
const ctx = document.getElementById('curve').getContext('2d');
let chart;

// Plugin para bandas de color (0–70 rojo, 70–90 amarillo, 90–100 verde)
const bandsPlugin = {
  id: 'bands',
  beforeDraw(chart, args, opts) {
    const {ctx, chartArea, scales} = chart;
    if (!chartArea) return;
    const {left, right, top, bottom} = chartArea;
    const y = scales.y;
    const toY = v => y.getPixelForValue(v);

    ctx.save();

    // Rojo: 0–70
    ctx.fillStyle = 'rgba(239, 68, 68, 0.12)'; // tailwind red-500 12%
    ctx.fillRect(left, toY(70), right-left, toY(0) - toY(70));

    // Amarillo: 70–90
    ctx.fillStyle = 'rgba(234, 179, 8, 0.12)'; // amber-500 12%
    ctx.fillRect(left, toY(90), right-left, toY(70) - toY(90));

    // Verde: 90–100
    ctx.fillStyle = 'rgba(34, 197, 94, 0.12)'; // green-500 12%
    ctx.fillRect(left, toY(100), right-left, toY(90) - toY(100));

    ctx.restore();
  }
};

function buildChart(cases, scores, dates) {
  if (chart) chart.destroy();

  const validCount = scores.filter(v => v != null).length;
  const singlePoint = validCount <= 1;

  if (!cases.length || validCount === 0) {
    document.getElementById('empty').classList.remove('hidden');
    return;
  }
  document.getElementById('empty').classList.add('hidden');

  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: cases, // Nº de caso
      datasets: [
        {
          label: 'Puntaje (0–100)',
          data: scores,
          showLine: !singlePoint,
          tension: 0.25,
          borderWidth: 2,
          pointRadius: 4,
          pointHoverRadius: 6,
          spanGaps: false,
        }
      ]
    },
    options: {
      responsive: true,
      interaction: { mode: 'index', intersect: false },
      elements: { point: { hitRadius: 8 } },
      scales: {
        y: {
          min: 0, max: 100,
          title: { display: true, text: 'Puntaje ICO-OSCAR (0–100)' },
          grid: { color: '#e5e7eb' }
        },
        x: {
          offset: singlePoint,              // centra si hay 1 punto
          title: { display: true, text: 'Número de caso (experiencia acumulada)' },
          ticks: { autoSkip: true },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { position: 'top' },
        tooltip: {
          callbacks: {
            // Muestra fecha en el tooltip usando el mismo índice
            afterLabel: (ctx) => {
              const i = ctx.dataIndex;
              const d = (dates && dates[i]) ? dates[i] : null;
              return d ? `Fecha: ${d}` : undefined;
            }
          }
        }
      }
    },
    plugins: [bandsPlugin]
  });
}

async function loadData() {
  const residente_id = document.getElementById('residente').value;
  const procedimiento_id = document.getElementById('procedimiento').value;
  const qs = new URLSearchParams({ residente_id, procedimiento_id }).toString();

  // Usa la ruta WEB autenticada (recomendado)
  const url = '{{ route('fellows.curva.data') }}' + '?' + qs;

  const res = await fetch(url, { headers: { 'Accept':'application/json' } });
  const data = await res.json();
  if (!data.ok) {
    buildChart([],[],[]);
    return;
  }
  buildChart(data.cases, data.scores, data.dates);
}

document.getElementById('filtrar').addEventListener('click', loadData);
window.addEventListener('DOMContentLoaded', loadData);
</script>

<!-- Leyenda de categorías -->
<div class="max-w-6xl mx-auto mt-2 text-sm text-gray-700">
  <div class="flex items-center gap-4">
    <div class="flex items-center gap-2">
      <span class="inline-block w-4 h-4 rounded" style="background:rgba(239,68,68,.35)"></span>
      <span>Deficiente: &lt; 70</span>
    </div>
    <div class="flex items-center gap-2">
      <span class="inline-block w-4 h-4 rounded" style="background:rgba(234,179,8,.35)"></span>
      <span>Medio: 70–89</span>
    </div>
    <div class="flex items-center gap-2">
      <span class="inline-block w-4 h-4 rounded" style="background:rgba(34,197,94,.35)"></span>
      <span>Bueno: ≥ 90</span>
    </div>
  </div>
</div>

</body>
</html>
