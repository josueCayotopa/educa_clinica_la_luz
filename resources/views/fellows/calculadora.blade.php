<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>IOL OCR Step 1</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 20px;
      background: #f5f7fb;
      color: #333;
    }
    h1 {
      font-size: 20px;
      margin-bottom: 10px;
    }
    .controls {
      margin-bottom: 15px;
    }
    .controls button {
      margin-right: 8px;
      padding: 8px 14px;
      border: none;
      border-radius: 4px;
      background-color: #007acc;
      color: #fff;
      cursor: pointer;
    }
    .controls button:disabled {
      background-color: #7aaed6;
      cursor: not-allowed;
    }
    #previewImage {
      max-width: 100%;
      max-height: 300px;
      border: 1px solid #ccc;
      margin-bottom: 10px;
      display: block;
    }
    #videoContainer {
      display: none;
      margin-bottom: 10px;
    }
    #videoContainer video {
      width: 100%;
      max-height: 300px;
      border: 1px solid #ccc;
    }
    #results {
      margin-top: 15px;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 12px;
    }
    #results label {
      font-weight: bold;
      display: block;
      margin-bottom: 3px;
    }
    #results input {
      width: 100%;
      padding: 4px 6px;
      border: 1px solid #ccc;
      border-radius: 4px;
      background-color: #fff;
    }
    #ocrText {
      width: 100%;
      height: 120px;
      margin-top: 10px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-family: monospace;
      background-color: #fafafa;
    }
    #status {
      margin-top: 10px;
      font-style: italic;
      color: #555;
    }

    /* Styles for Paso 2 */
    .calc-select {
      margin-top: 20px;
    }
    .calc-btn {
      margin-right: 8px;
      padding: 8px 14px;
      border: none;
      border-radius: 4px;
      background-color: #6c757d;
      color: #fff;
      cursor: pointer;
    }
    .calc-btn.active {
      background-color: #495057;
    }

    /* Botón de exportación de datos */
    .export-btn {
      margin-left: 12px;
      padding: 8px 14px;
      border: none;
      border-radius: 4px;
      background-color: #28a745;
      color: #fff;
      cursor: pointer;
    }
  </style>
  <!-- Load Tesseract.js from CDN.  
       We use version 4.x to keep the API stable.  
       Languages will be fetched automatically when needed. -->
  <script src="https://cdn.jsdelivr.net/npm/tesseract.js@4.0.2/dist/tesseract.min.js"></script>
</head>
<body>
  <h1>Paso 1: Capturar imagen y extraer datos biométricos</h1>
  <div class="controls">
    <!-- Hidden file input for gallery uploads. -->
    <input id="fileInput" type="file" accept="image/*" style="display:none">
    <button id="selectBtn">Subir / Galería</button>
    <!-- Se eliminó el botón de apertura de cámara a solicitud del usuario -->
    <button id="ocrBtn">Extraer datos (OCR)</button>
  </div>
  <!-- Preview image -->
  <img id="previewImage" src="" alt="Imagen previsualizada">
  <!-- Video container for camera capture -->
  <div id="videoContainer">
    <video id="video" autoplay></video>
    <button id="captureBtn">Capturar</button>
    <button id="closeCameraBtn">Cerrar cámara</button>
  </div>
  <div id="status"></div>
  <!-- OCR text output for debugging -->
  <textarea id="ocrText" placeholder="Texto OCR..." readonly></textarea>
  <!-- Results grid -->
  <div id="results">
    <div>
      <label for="al">AL (mm)</label>
      <input id="al" type="text" disabled>
    </div>
    <div>
      <label for="acd">ACD (mm)</label>
      <input id="acd" type="text" disabled>
    </div>
    <div>
      <label for="lt">LT (mm)</label>
      <input id="lt" type="text" disabled>
    </div>
    <div>
      <label for="wtw">WTW (mm)</label>
      <input id="wtw" type="text" disabled>
    </div>
    <div>
      <label for="k1">K1 (D)</label>
      <input id="k1" type="text" disabled>
    </div>
    <div>
      <label for="k2">K2 (D)</label>
      <input id="k2" type="text" disabled>
    </div>
    <div>
      <label for="tk1">TK1 (D)</label>
      <input id="tk1" type="text" disabled>
    </div>
    <div>
      <label for="tk2">TK2 (D)</label>
      <input id="tk2" type="text" disabled>
    </div>
    <div>
      <label for="avgk">Avg K (D)</label>
      <input id="avgk" type="text" disabled>
    </div>
    <div>
      <label for="avgtk">Avg TK (D)</label>
      <input id="avgtk" type="text" disabled>
    </div>
  </div>

  <!-- Paso 2: Seleccionar la plataforma de cálculo -->
  <h2>Paso 2: Seleccionar calculadora</h2>
  <div class="calc-select">
    <button class="calc-btn" data-url="https://iolcalculator.escrs.org/">ESCRS</button>
    <button class="calc-btn" data-url="https://eyecalc.org/srk-t/">EyeCalc SRK/T</button>
    <button class="calc-btn" data-url="https://rbfcalculator.com/online/index.html">Hill‑RBF</button>
    <!-- Botón de exportación de datos para copiar la biometría al portapapeles -->
    <button id="exportBtn" class="export-btn">Exportar datos</button>
  </div>
  <div id="calcContainer">
    <iframe id="calcFrame" src="" style="width:100%; height:600px; border: 1px solid #ccc; margin-top:10px;"></iframe>
  </div>
  <script>
    // Global state
    let imageData = null;
    let videoStream = null;

    const fileInput = document.getElementById('fileInput');
    const selectBtn = document.getElementById('selectBtn');
    // const cameraBtn = document.getElementById('cameraBtn');
    const ocrBtn = document.getElementById('ocrBtn');
    const previewImage = document.getElementById('previewImage');
    const ocrText = document.getElementById('ocrText');
    const statusEl = document.getElementById('status');
    const videoContainer = document.getElementById('videoContainer');
    const video = document.getElementById('video');
    const captureBtn = document.getElementById('captureBtn');
    const closeCameraBtn = document.getElementById('closeCameraBtn');

    // File selection handler
    selectBtn.addEventListener('click', () => {
      fileInput.click();
    });

    fileInput.addEventListener('change', event => {
      const file = event.target.files[0];
      if (!file) return;
      const reader = new FileReader();
      reader.onload = () => {
        imageData = reader.result;
        previewImage.src = imageData;
        statusEl.textContent = 'Imagen cargada. Listo para OCR.';
      };
      reader.onerror = err => {
        console.error(err);
        statusEl.textContent = 'Error al leer la imagen.';
      };
      reader.readAsDataURL(file);
    });

    // Camera capture
    // Se eliminó el botón de apertura de cámara. Para futuras extensiones, la lógica de acceso a la cámara se
    // mantiene comentada aquí. Si fuera necesario volver a habilitarla, descomente las siguientes líneas y
    // asegúrese de que exista un elemento con id="cameraBtn" en el DOM.
    /*
    cameraBtn.addEventListener('click', async () => {
      if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
        alert('La cámara no es compatible con este navegador.');
        return;
      }
      try {
        videoStream = await navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } });
        video.srcObject = videoStream;
        videoContainer.style.display = 'block';
        statusEl.textContent = 'Cámara abierta. Captura una imagen.';
      } catch (err) {
        console.error(err);
        alert('No se pudo acceder a la cámara: ' + err.message);
      }
    });
    */

    captureBtn.addEventListener('click', () => {
      if (!videoStream) return;
      // Create a canvas to capture current video frame
      const canvas = document.createElement('canvas');
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;
      const ctx = canvas.getContext('2d');
      ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
      imageData = canvas.toDataURL('image/png');
      previewImage.src = imageData;
      statusEl.textContent = 'Imagen capturada. Listo para OCR.';
      // Stop camera
      if (videoStream) {
        videoStream.getTracks().forEach(track => track.stop());
        videoStream = null;
        videoContainer.style.display = 'none';
      }
    });

    closeCameraBtn.addEventListener('click', () => {
      if (videoStream) {
        videoStream.getTracks().forEach(track => track.stop());
        videoStream = null;
      }
      videoContainer.style.display = 'none';
      statusEl.textContent = 'Cámara cerrada.';
    });

    // OCR button
    ocrBtn.addEventListener('click', async () => {
      if (!imageData) {
        alert('Primero cargue o capture una imagen.');
        return;
      }
      // Disable the button to avoid multiple clicks
      ocrBtn.disabled = true;
      statusEl.textContent = 'Reconociendo...';
      ocrText.value = '';
      try {
        const { data } = await Tesseract.recognize(imageData, 'spa+eng', { logger: m => {
          // Show progress
          statusEl.textContent = m.status + (m.progress ? ' ' + Math.round(m.progress * 100) + '%' : '');
        } });
        const text = data.text;
        ocrText.value = text;
        statusEl.textContent = 'OCR completado. Analizando datos...';
        const results = parseBiometry(text);
        // Fill fields
        for (const key in results) {
          const el = document.getElementById(key);
          if (el) el.value = results[key] !== null && results[key] !== undefined ? results[key] : '';
        }
        statusEl.textContent = 'Datos extraídos (campos llenados)';
      } catch (err) {
        console.error(err);
        statusEl.textContent = 'Error OCR: ' + err.message;
        alert('Se produjo un error durante el OCR. Revise la consola.');
      } finally {
        ocrBtn.disabled = false;
      }
    });

    // Parsing function for biometric values
    function parseBiometry(rawText) {
      const fields = {
        al: null,
        acd: null,
        lt: null,
        wtw: null,
        k1: null,
        k2: null,
        tk1: null,
        tk2: null,
        avgk: null,
        avgtk: null,
      };
      if (!rawText) return fields;
      const text = rawText.replace(/\r/g, '\n');
      // Replace long spaces with single space
      const lines = text.split(/\n/).map(l => l.trim()).filter(l => l.length > 0);
      // Combine lines back to single string for easier regex search
      const unified = lines.join('\n');
      // Helper to clean numeric string
      // Convert a textual numeric representation into a JavaScript number.
      // This helper is deliberately forgiving: it handles decimals with commas,
      // numbers written with spaces as decimal separators (e.g. "42 77" -> 42.77),
      // and ignores extraneous characters. If no sensible number is found,
      // it returns null.
      const cleanNumber = (str) => {
        if (!str) return null;
        // Normalize commas to dots and remove any characters except digits, dots and spaces.
        let s = str.replace(/,/g, '.');
        s = s.replace(/[^0-9\.\s]/g, '');
        // If the string already contains a dot, use the first floating point number found.
        if (s.includes('.')) {
          const m = s.match(/\d+\.\d+/);
          if (m) {
            const val = parseFloat(m[0]);
            return isNaN(val) ? null : parseFloat(val.toFixed(3));
          }
        }
        // Otherwise, interpret spaces as decimal separators. Combine the parts after the first
        // space as the decimal portion. Example: "43 68" -> 43.68, "43 9 55" -> 43.955.
        const parts = s.trim().split(/\s+/).filter(p => p.length > 0);
        if (parts.length > 1) {
          const integerPart = parts[0];
          const decimalPart = parts.slice(1).join('');
          const combined = `${integerPart}.${decimalPart}`;
          const num = parseFloat(combined);
          return isNaN(num) ? null : parseFloat(num.toFixed(3));
        }
        // Fallback: remove any remaining spaces and parse normally.
        s = s.replace(/\s+/g, '');
        const num = parseFloat(s);
        return isNaN(num) ? null : parseFloat(num.toFixed(3));
      };
      // Patterns for each field
      const patterns = {
        al: /\bAL\b[^\d]*([\d.,\s]+)/i,
        acd: /\bACD\b[^\d]*([\d.,\s]+)/i,
        lt: /\bLT\b[^\d]*([\d.,\s]+)/i,
        wtw: /\bWTW\b[^\d]*([\d.,\s]+)/i,
        k1: /\bK1\b[^\d]*([\d.,\s]+)/i,
        k2: /\bK2\b[^\d]*([\d.,\s]+)/i,
        tk1: /\bTK1\b[^\d]*([\d.,\s]+)/i,
        tk2: /\bTK2\b[^\d]*([\d.,\s]+)/i,
        avgk: /\bAvg(?:\.|)\s*K\b[^\d]*([\d.,\s]+)/i,
        avgtk: /\bAvg(?:\.|)\s*TK\b[^\d]*([\d.,\s]+)/i,
      };
      for (const key in patterns) {
        const regex = patterns[key];
        const match = unified.match(regex);
        if (match && match[1]) {
          const value = cleanNumber(match[1]);
          fields[key] = value;
        }
      }
      // Fallback for avgk when not captured
      if (!fields.avgk) {
        const multiAvgK = /Avg\s*K\s*\n?\s*([\d.,\s]+)/i.exec(unified);
        if (multiAvgK) fields.avgk = cleanNumber(multiAvgK[1]);
      }
      // Fallback for avgtk
      if (!fields.avgtk) {
        const multiAvgTK = /Avg\s*TK\s*\n?\s*([\d.,\s]+)/i.exec(unified);
        if (multiAvgTK) fields.avgtk = cleanNumber(multiAvgTK[1]);
      }
      // Ajuste de valores K y TK que se analizan sin separadores decimales. Los valores
      // values range between 30 and 60 D. Sometimes OCR merges the decimal point and
      // returns values like 4368 instead of 43.68. To correct this, repeatedly divide by 10
      // until the value is below 100. We apply this only to K and TK related fields.
      const adjustIfNeeded = (val, key) => {
        if (val === null || val === undefined) return val;
        // Only adjust for keratometric values
        if ([ 'k1', 'k2', 'tk1', 'tk2', 'avgk', 'avgtk' ].includes(key)) {
          let adjusted = val;
          // Divide by 10 until the value is within a plausible range (<100)
          while (adjusted >= 100) {
            adjusted = adjusted / 10;
          }
          return parseFloat(adjusted.toFixed(3));
        }
        return val;
      };
      for (const k in fields) {
        fields[k] = adjustIfNeeded(fields[k], k);
      }
      // Extraer género (Sexo) y calcular edad a partir de la fecha de nacimiento
      // Buscar género en el texto (Femenino/Masculino o Female/Male)
      let gender = null;
      const genderMatch = unified.match(/Sexo\s*([A-Za-z]+)/i);
      if (genderMatch) {
        const g = genderMatch[1].toLowerCase();
        if (g.startsWith('f') || g.startsWith('m')) {
          // Spanish Femenino/Masculino or English Female/Male
          gender = g.startsWith('f') ? 'Femenino' : 'Masculino';
        }
      }
      // Buscar todas las fechas en formato dd/mm/yyyy, dd-mm-yy, etc.
      let age = null;
      const dateMatches = unified.match(/\b\d{1,2}[\/\.\-]\d{1,2}[\/\.\-]\d{2,4}\b/g);
      if (dateMatches) {
        let birthDate = null;
        dateMatches.forEach(ds => {
          // Normalizar separadores
          const parts = ds.split(/[\/\.\-]/);
          if (parts.length === 3) {
            let [d, m, y] = parts;
            d = parseInt(d, 10);
            m = parseInt(m, 10) - 1;
            let year = parseInt(y, 10);
            // Ajustar año de 2 dígitos a siglo XX
            if (y.length === 2) {
              year += year <= (new Date().getFullYear() % 100) ? 2000 : 1900;
            }
            const dateObj = new Date(year, m, d);
            // Considerar la fecha de nacimiento como la fecha más antigua
            if (!birthDate || dateObj < birthDate) {
              birthDate = dateObj;
            }
          }
        });
        if (birthDate) {
          const today = new Date();
          let computedAge = today.getFullYear() - birthDate.getFullYear();
          const mDiff = today.getMonth() - birthDate.getMonth();
          if (mDiff < 0 || (mDiff === 0 && today.getDate() < birthDate.getDate())) {
            computedAge--;
          }
          age = computedAge;
        }
      }
      fields.age = age;
      fields.gender = gender;
      return fields;
    }

    // Configuración de los botones de selección de calculadora (Paso 2)
    (function() {
      const calcBtns = document.querySelectorAll('.calc-btn');
      const calcFrame = document.getElementById('calcFrame');
      calcBtns.forEach(btn => {
        btn.addEventListener('click', function() {
          // Desactivar todos los botones y activar el seleccionado
          calcBtns.forEach(b => b.classList.remove('active'));
          this.classList.add('active');
          const url = this.getAttribute('data-url');
          // Asignar la URL al iframe para cargar la calculadora
          calcFrame.src = url;
        });
      });
    })();

    // Botón Exportar datos: copia los valores biométricos y, si la calculadora seleccionada es ESCRS, genera un bookmarklet para autocompletar.
    (function() {
      const exportBtn = document.getElementById('exportBtn');
      exportBtn.addEventListener('click', () => {
        // Recoger campos de la biometría
        const data = {
          AL: document.getElementById('al').value,
          ACD: document.getElementById('acd').value,
          LT: document.getElementById('lt').value,
          WTW: document.getElementById('wtw').value,
          K1: document.getElementById('k1').value,
          K2: document.getElementById('k2').value,
          TK1: document.getElementById('tk1').value,
          TK2: document.getElementById('tk2').value,
          AvgK: document.getElementById('avgk').value,
          AvgTK: document.getElementById('avgtk').value,
          // Datos adicionales con valores por defecto
          Surgeon: 'FS',
          Initials: 'NN',
          ID: '777',
          Age: null,
          Gender: null
        };
        // Obtener edad y género desde el OCR si es posible
        try {
          const raw = ocrText.value;
          const parsed = parseBiometry(raw);
          if (parsed.age != null) data.Age = parsed.age;
          if (parsed.gender) data.Gender = parsed.gender;
        } catch (err) {
          console.warn('No se pudo analizar edad/género:', err);
        }
        // Detectar cuál calculadora está seleccionada
        let selectedCalc = null;
        const activeBtn = document.querySelector('.calc-btn.active');
        if (activeBtn) {
          selectedCalc = activeBtn.getAttribute('data-url');
        }
        // Si ESCRS está seleccionada, construir un bookmarklet para rellenar sus campos.
        if (selectedCalc && selectedCalc.includes('iolcalculator.escrs.org')) {
          // Construir la función de autollenado; usa heurísticas por etiqueta y por texto en celdas
          const bookmarkletFn = `(function(){\n` +
            ` var data = ${JSON.stringify(data)};\n` +
            ` // Intenta hacer clic en el botón de aceptación de términos si está presente\n` +
            ` function clickAgree() {\n` +
            `   var btns = document.querySelectorAll('button, a');\n` +
            `   for (var i = 0; i < btns.length; i++) {\n` +
            `     var txt = (btns[i].textContent || '').trim().toUpperCase();\n` +
            `     if (txt.includes('I AGREE') || txt.includes('ACEPTO')) { btns[i].click(); return true; }\n` +
            `   }\n` +
            `   return false;\n` +
            ` }\n` +
            ` function fillByLabel(label, value) {\n` +
            `   var tds = document.querySelectorAll('td');\n` +
            `   for (var i = 0; i < tds.length; i++) {\n` +
            `     var td = tds[i];\n` +
            `     if (td.textContent && td.textContent.trim().toUpperCase() === label.toUpperCase()) {\n` +
            `       var next = td.nextElementSibling;\n` +
            `       if (next) {\n` +
            `         var input = next.querySelector('input, select, textarea');\n` +
            `         if (input) {\n` +
            `           input.value = value !== undefined && value !== null ? value : '';\n` +
            `           input.dispatchEvent(new Event('input', { bubbles: true }));\n` +
            `           input.dispatchEvent(new Event('change', { bubbles: true }));\n` +
            `         }\n` +
            `       }\n` +
            `     }\n` +
            `   }\n` +
            ` }\n` +
            ` function fillByPlaceholder(placeholder, value) {\n` +
            `   var input = document.querySelector('input[placeholder*="' + placeholder + '"]');\n` +
            `   if (input) {\n` +
            `     input.value = value !== undefined && value !== null ? value : '';\n` +
            `     input.dispatchEvent(new Event('input', { bubbles: true }));\n` +
            `     input.dispatchEvent(new Event('change', { bubbles: true }));\n` +
            `   }\n` +
            ` }\n` +
            ` // Función para rellenar todos los campos una vez que el formulario esté disponible\n` +
            ` function tryFill() {\n` +
            `   // Datos generales\n` +
            `   fillByPlaceholder('Surgeon', data.Surgeon);\n` +
            `   fillByPlaceholder('Patient Initials', data.Initials);\n` +
            `   fillByPlaceholder('Id', data.ID);\n` +
            `   fillByPlaceholder('Age', data.Age);\n` +
            `   // Género (intenta seleccionar en un select)\n` +
            `   var genderSelect = document.querySelector('select[name*="gender"], select[aria-label*="Gender"], select[placeholder*="Gender"]');\n` +
            `   if (genderSelect && data.Gender) {\n` +
            `     var letter = data.Gender.charAt(0).toLowerCase();\n` +
            `     var opts = Array.from(genderSelect.options);\n` +
            `     var match = opts.find(o => o.textContent.trim().charAt(0).toLowerCase() === letter);\n` +
            `     if (match) { genderSelect.value = match.value; genderSelect.dispatchEvent(new Event('change', { bubbles: true })); }\n` +
            `   }\n` +
            `   // Campos biométricos por etiqueta\n` +
            `   fillByLabel('AL', data.AL);\n` +
            `   fillByLabel('ACD', data.ACD);\n` +
            `   fillByLabel('LT', data.LT);\n` +
            `   fillByLabel('WTW', data.WTW);\n` +
            `   fillByLabel('K1', data.K1);\n` +
            `   fillByLabel('K2', data.K2);\n` +
            `   fillByLabel('TK1', data.TK1);\n` +
            `   fillByLabel('TK2', data.TK2);\n` +
            `   fillByLabel('AVG K', data.AvgK);\n` +
            `   fillByLabel('AVG TK', data.AvgTK);\n` +
            ` }\n` +
            ` // Primero intentamos aceptar los términos; luego rellenamos\n` +
            ` if (clickAgree()) {\n` +
            `   setTimeout(tryFill, 1500);\n` +
            ` } else {\n` +
            `   tryFill();\n` +
            ` }\n` +
            `})();`;
          const bookmarklet = 'javascript:' + encodeURIComponent(bookmarkletFn);
          // Intento de autollenado automático:
          // Abrimos la calculadora ESCRS en una ventana nueva y, tras unos segundos,
          // navegamos esa ventana al bookmarklet. Esto ejecutará el script en ese contexto.
          try {
            const newWin = window.open(selectedCalc, '_blank');
            if (newWin) {
              // Es posible que la página tarde en cargar. Usamos un retardo para asegurar que
              // el documento esté listo. Navegamos al bookmarklet sin necesidad de acceso a DOM.
              setTimeout(() => {
                try {
                  newWin.location = bookmarklet;
                  statusEl.textContent = 'Se abrió la calculadora ESCRS en una nueva ventana y se inició el autollenado.';
                } catch (e) {
                  console.warn('No se pudo ejecutar bookmarklet en la nueva ventana:', e);
                  // Si no logramos cambiar la ubicación, recurrimos al método de portapapeles
                  if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(bookmarklet).then(() => {
                      alert('No se pudo ejecutar el autollenado automático. El bookmarklet se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página ESCRS.');
                    }).catch(() => {
                      alert('Bookmarklet generado:\n' + bookmarklet);
                    });
                  } else {
                    alert('Bookmarklet generado:\n' + bookmarklet);
                  }
                }
              }, 4000);
            } else {
              // Si el navegador bloqueó la ventana emergente, caemos al método de portapapeles
              if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(bookmarklet).then(() => {
                  alert('El navegador bloqueó la apertura automática. El bookmarklet se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página ESCRS.');
                }).catch(() => {
                  alert('Bookmarklet generado:\n' + bookmarklet);
                });
              } else {
                alert('Bookmarklet generado:\n' + bookmarklet);
              }
            }
          } catch (err) {
            console.warn('Fallo en la apertura automática:', err);
            if (navigator.clipboard && navigator.clipboard.writeText) {
              navigator.clipboard.writeText(bookmarklet).then(() => {
                alert('Hubo un problema con la apertura automática. El bookmarklet se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página ESCRS.');
              }).catch(() => {
                alert('Bookmarklet generado:\n' + bookmarklet);
              });
            } else {
              alert('Bookmarklet generado:\n' + bookmarklet);
            }
          }
          return;
        }
        // Si Hill-RBF está seleccionada, generar bookmarklet para autollenar sus campos
        if (selectedCalc && selectedCalc.includes('rbfcalculator.com')) {
          // Extraemos datos específicos para Hill-RBF (solo campos más relevantes)
          const hillData = {
            AL: data.AL,
            ACD: data.ACD,
            LT: data.LT,
            WTW: data.WTW,
            K1: data.K1,
            K2: data.K2
          };
          // Función autop-run: intenta aceptar los términos y rellenar los primeros campos de texto
          const hillFn = `(function(){\n` +
            ` var d=${JSON.stringify(hillData)};\n` +
            ` function clickAgree(){var btns=document.querySelectorAll('button,a');for(var i=0;i<btns.length;i++){var txt=(btns[i].textContent||'').trim().toUpperCase();if(txt.includes('I AGREE')||txt.includes('ACEPTO')){btns[i].click();return true;}}return false;}\n` +
            ` function fill(){var values=[d.AL,d.ACD,d.LT,d.WTW,d.K1,d.K2];var inputs=document.querySelectorAll('input');var idx=0;for(var i=0;i<inputs.length&&idx<values.length;i++){var inp=inputs[i];if(inp.type==='text'&& !inp.readOnly && inp.offsetParent!==null){if(values[idx]!==undefined&&values[idx]!==null){inp.value=values[idx];inp.dispatchEvent(new Event('input',{bubbles:true}));inp.dispatchEvent(new Event('change',{bubbles:true}));}idx++;}}\n` +
            ` }\n` +
            ` if(clickAgree()){setTimeout(fill,1500);}else{fill();}\n` +
          `})();`;
          const hillBookmark = 'javascript:' + encodeURIComponent(hillFn);
          try {
            const newWin = window.open(selectedCalc, '_blank');
            if (newWin) {
              setTimeout(() => {
                try {
                  newWin.location = hillBookmark;
                  statusEl.textContent = 'Se abrió la calculadora Hill-RBF en una nueva ventana y se inició el autollenado.';
                } catch (e) {
                  console.warn('No se pudo ejecutar bookmarklet en Hill-RBF:', e);
                  if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(hillBookmark).then(() => {
                      alert('No se pudo ejecutar el autollenado automático en Hill-RBF. El bookmarklet se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página Hill-RBF.');
                    }).catch(() => {
                      alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
                    });
                  } else {
                    alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
                  }
                }
              }, 4000);
            } else {
              if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(hillBookmark).then(() => {
                  alert('El navegador bloqueó la apertura automática. El bookmarklet para Hill-RBF se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página Hill-RBF.');
                }).catch(() => {
                  alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
                });
              } else {
                alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
              }
            }
          } catch (err) {
            console.warn('Fallo en la apertura automática para Hill-RBF:', err);
            if (navigator.clipboard && navigator.clipboard.writeText) {
              navigator.clipboard.writeText(hillBookmark).then(() => {
                alert('Hubo un problema con la apertura automática para Hill-RBF. El bookmarklet se ha copiado al portapapeles. Cree un marcador con este URL y ejecútelo en la página Hill-RBF.');
              }).catch(() => {
                alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
              });
            } else {
              alert('Bookmarklet Hill-RBF generado:\n' + hillBookmark);
            }
          }
          return;
        }
        // Si no es ESCRS o Hill-RBF o no hay calculadora seleccionada, exportar como JSON por defecto
        const payload = JSON.stringify(data, null, 2);
        if (navigator.clipboard && navigator.clipboard.writeText) {
          navigator.clipboard.writeText(payload).then(() => {
            alert('Datos exportados y copiados al portapapeles.');
          }).catch(() => {
            alert('Datos exportados: ' + payload);
          });
        } else {
          alert('Datos exportados: ' + payload);
        }
      });
    })();
  </script>
</body>
</html>
