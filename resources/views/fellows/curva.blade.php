
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
<script>
const ctx = document.getElementById('curve').getContext('2d');
let chart;
let curveBands = { low: 3.5, high: 4.5, max: 5, ylabel: 'Promedio (0–5)' }; // default

// Bandas de color usando valores dinámicos
const bandsPlugin = {
  id: 'bands',
  beforeDraw(chart) {
    const {ctx, chartArea, scales} = chart;
    if (!chartArea) return;
    const {left, right} = chartArea;
    const y = scales.y, toY = v => y.getPixelForValue(v);

    ctx.save();
    // Rojo: 0–low
    ctx.fillStyle = 'rgba(239, 68, 68, 0.12)';
    ctx.fillRect(left, toY(curveBands.low), right-left, toY(0) - toY(curveBands.low));
    // Amarillo: low–high
    ctx.fillStyle = 'rgba(234, 179, 8, 0.12)';
    ctx.fillRect(left, toY(curveBands.high), right-left, toY(curveBands.low) - toY(curveBands.high));
    // Verde: high–max
    ctx.fillStyle = 'rgba(34, 197, 94, 0.12)';
    ctx.fillRect(left, toY(curveBands.max), right-left, toY(curveBands.high) - toY(curveBands.max));
    ctx.restore();
  }
};

function setEmpty(msg) {
  const el = document.getElementById('empty');
  el.textContent = msg;
  el.classList.remove('hidden');
}

function buildChart(cases, scores, dates) {
  if (chart) chart.destroy();

  const s = (scores || []).map(v => (v==null || v==='') ? null : Number(v));
  const c = (cases && cases.length) ? cases : s.map((_,i)=>i+1);

  const valid = s.filter(v => v !== null).length;
  const singlePoint = valid === 1;

  if (!c.length || valid === 0) {
    setEmpty('No hay suficientes evaluaciones para graficar.');
    return;
  }
  document.getElementById('empty').classList.add('hidden');

  chart = new Chart(ctx, {
    type: 'line',
    data: { labels: c, datasets: [{
      label: curveBands.ylabel,
      data: s,
      showLine: !singlePoint,
      tension: 0.25,
      borderWidth: 2,
      pointRadius: singlePoint ? 6 : 4,
      pointHoverRadius: singlePoint ? 8 : 6,
      spanGaps: false,
    }]},
    options: {
      responsive: true,
      interaction: { mode: 'index', intersect: false },
      elements: { point: { hitRadius: 8 } },
      scales: {
        y: {
          min: 0, max: curveBands.max,
          title: { display: true, text: curveBands.ylabel },
          grid: { color: '#e5e7eb' }
        },
        x: {
          offset: singlePoint,
          title: { display: true, text: 'Número de caso (experiencia acumulada)' },
          ticks: { autoSkip: true }, grid: { display: false }
        }
      },
      plugins: {
        legend: { position: 'top' },
        tooltip: { callbacks: {
          afterLabel: (ctx) => {
            const i = ctx.dataIndex;
            const d = (dates && dates[i]) ? dates[i] : null;
            return d ? `Fecha: ${d}` : undefined;
          }
        }}
      }
    },
    plugins: [bandsPlugin]
  });
}

async function loadData() {
  const residente_id = document.getElementById('residente').value;
  const procedimiento_id = document.getElementById('procedimiento').value;
  const url = '{{ route('fellows.curva.data') }}' + '?' + new URLSearchParams({ residente_id, procedimiento_id });

  try {
    const res  = await fetch(url, { headers: { 'Accept':'application/json' }, credentials:'same-origin' });
    if (res.status === 401) { setEmpty('No autenticado. Inicia sesión.'); return; }

    const data = await res.json();
    if (!data.ok) { setEmpty('Respuesta no OK del backend.'); return; }

    // Actualiza bandas y etiqueta desde backend
    if (data.bands) curveBands = {
      low: Number(data.bands.low ?? 3.5),
      high: Number(data.bands.high ?? 4.5),
      max: Number(data.bands.max ?? 5),
      ylabel: data.bands.ylabel ?? 'Promedio (0–5)',
    };

    buildChart(data.cases || [], data.scores || [], data.dates || []);
  } catch (e) {
    console.error(e);
    setEmpty('Error al cargar datos.');
  }
}

document.getElementById('filtrar').addEventListener('click', loadData);
window.addEventListener('DOMContentLoaded', loadData);
</script>


</body>
</html>
