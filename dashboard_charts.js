// ===============================
// Função para buscar JSON do servidor
// ===============================
function fetchJson(file) {
  const url = "/adonnay/aulas_php/trabalho_banco_de_dados/" + file;

  return fetch(url)
    .then(r => {
      if (!r.ok) {
        console.error("Erro ao buscar:", file, "Status:", r.status);
        return [];
      }
      return r.json();
    })
    .catch(err => {
      console.error("Erro de JSON em:", file, err);
      return [];
    });
}

// ===============================
// 1) TOTAL DE ALUNOS
// ===============================
fetchJson("q1_total.php").then(data => {
  const total = data.total_alunos ?? 0;
  document.getElementById("card-total").textContent = total;
});

// ===============================
// 2) ALUNOS POR CURSO
// ===============================
fetchJson("q2_por_curso.php").then(rows => {
  if (!Array.isArray(rows)) return;

  const labels = rows.map(r => r.curso);
  const values = rows.map(r => Number(r.total));

  new Chart(document.getElementById("chartCursos"), {
    type: "doughnut",
    data: {
      labels,
      datasets: [{
        data: values,
        backgroundColor: ["#007bff", "#28a745", "#ffc107", "#dc3545"]
      }]
    },
    options: {
      responsive: true
    }
  });
});

// ===============================
// 3) CADASTROS DOS ÚLTIMOS 12 MESES
// ===============================
fetchJson("q4_mensal.php").then(rows => {
  if (!Array.isArray(rows)) return;

  const labels = rows.map(r => r.ym);
  const values = rows.map(r => Number(r.total));

  new Chart(document.getElementById("chartMensal"), {
    type: "line",
    data: {
      labels,
      datasets: [{
        label: "Cadastros",
        data: values,
        borderWidth: 2
      }]
    },
    options: {
      responsive: true
    }
  });
});

// ===============================
// 4) FAIXA ETÁRIA
// ===============================
fetchJson("q6_faixa_etaria.php").then(rows => {
  if (!Array.isArray(rows)) return;

  const labels = rows.map(r => r.faixa);
  const values = rows.map(r => Number(r.total));

  new Chart(document.getElementById("chartFaixa"), {
    type: "bar",
    data: {
      labels,
      datasets: [{
        label: "Alunos",
        data: values,
        borderWidth: 1
      }]
    },
    options: {
      responsive: true
    }
  });
});
