{{-- resources/views/fellows/curva.blade.php --}}
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
      <select id="residente" class="w-full border rounded px-3 py-2">
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

function buildChart(labels, promedio, ma3, ref = 4.0) {
  if (chart) chart.destroy();

  // ¿Cuántos puntos válidos hay?
  const validCount = promedio.filter(v => v !== null && v !== undefined).length;
  const singlePoint = validCount <= 1;

  if (!labels.length || validCount === 0) {
    document.getElementById('empty').classList.remove('hidden');
    return;
  }
  document.getElementById('empty').classList.add('hidden');

  chart = new Chart(ctx, {
    type: 'line',
    data: {
      labels,
      datasets: [
        // Promedio por evaluación (si hay 1 punto, no dibujar línea)
        {
          label: 'Promedio',
          data: promedio,
          showLine: !singlePoint,   // ← clave para 1 punto
          tension: 0.25,
          borderWidth: 2,
          pointRadius: 4,
          pointHoverRadius: 6,
          spanGaps: false
        },

        // Media móvil (3) sólo si hay al menos 3 puntos
        ...(validCount >= 3 ? [{
          label: 'Media móvil (3)',
          data: ma3,
          showLine: true,
          borderWidth: 1,
          borderDash: [6, 4],
          pointRadius: 0,
          spanGaps: true
        }] : []),

        // Línea de referencia a 4.0
        {
          label: 'Referencia 4.0',
          data: labels.map(() => ref),
          showLine: true,
          borderWidth: 1,
          borderDash: [8, 6],
          pointRadius: 0
        }
      ]
    },
    options: {
      responsive: true,
      interaction: { mode: 'index', intersect: false },
      elements: { point: { hitRadius: 8 } },
      scales: {
        y: {
          min: 0, max: 5,
          title: { display: true, text: 'Promedio (0–5)' },
          grid: { color: '#e5e7eb' }
        },
        x: {
          // Con 1 punto, centra el tick y el punto
          offset: singlePoint,            // ← centra el único punto
          ticks: { minRotation: 45, maxRotation: 45 },
          title: { display: true, text: 'Fecha' },
          grid: { display: false }
        }
      },
      plugins: {
        legend: { position: 'top' },
        tooltip: {
          callbacks: {
            label: (ctx) => {
              const val = ctx.parsed.y;
              return `${ctx.dataset.label}: ${val != null ? val.toFixed(2) : '—'}`;
            }
          }
        }
      }
    }
  });
}

async function loadData() {
  const residente_id = document.getElementById('residente').value;
  const procedimiento_id = document.getElementById('procedimiento').value;
  const qs = new URLSearchParams({ residente_id, procedimiento_id }).toString();

  // Usa la ruta web autenticada por sesión
  const url = '{{ route('fellows.curva.data') }}' + '?' + qs;

  const res = await fetch(url, { headers: { 'Accept':'application/json' } });
  const data = await res.json();

  if (!data.ok) {
    buildChart([], [], []);
    return;
  }
  buildChart(data.labels, data.promedio, data.ma3, data.ref);
}

document.getElementById('filtrar').addEventListener('click', loadData);
window.addEventListener('DOMContentLoaded', loadData);
</script>
</body>
</html>
