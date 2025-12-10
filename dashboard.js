document.addEventListener("DOMContentLoaded", () => {
  fetch("listar.php")
    .then(r => r.text())
    .then(txt => {
      console.log("RESPOSTA DO PHP:", txt);

      let dados;
      try {
        dados = JSON.parse(txt);
      } catch (e) {
        console.error("Erro ao converter JSON:", e);
        return;
      }

      const tbody = document.querySelector("#tabelaCadastros tbody");
      tbody.innerHTML = "";

      dados.forEach(a => {
        const tr = document.createElement("tr");
        tr.innerHTML = `
          <td>${a.id}</td>
          <td>${a.nome}</td>
          <td>${a.data_nascimento}</td>
          <td>${a.rua}, ${a.numero}, ${a.bairro}</td>
          <td>${a.responsavel}</td>
          <td>${a.tipo}</td>
          <td>${a.curso}</td>
        `;
        tbody.appendChild(tr);
      });
    })
    .catch(err => console.error("ERRO:", err));
});


