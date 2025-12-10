<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - Sistema</title>

  <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="dashboard.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="wrapper">

    <!-- MENU -->
    <aside id="sidebar">
      <div class="d-flex align-items-center px-3">
        <button class="toggle-btn" type="button"><i class="lni lni-grid-alt"></i></button>
        <div class="sidebar-logo ms-2"><a href="#">CodzSword</a></div>
      </div>

      <ul class="sidebar-nav mt-4">
        <li class="sidebar-item">
          <a href="#" class="sidebar-link"><i class="lni lni-user"></i><span>Profile</span></a>
        </li>

        <li class="sidebar-item">
          <a href="formulario.html" class="sidebar-link"><i class="lni lni-pencil-alt"></i><span>Cadastro</span></a>
        </li>

        <li class="sidebar-item">
          <a href="#" class="sidebar-link"><i class="lni lni-agenda"></i><span>Task</span></a>
        </li>
      </ul>

      <div class="sidebar-footer px-3">
        <a href="#" class="sidebar-link"><i class="lni lni-exit"></i><span>Logout</span></a>
      </div>
    </aside>

    <!-- CONTEÚDO -->
    <div class="main">

      <nav class="navbar navbar-expand px-4 py-3">
        <div class="navbar-collapse collapse">
          <ul class="navbar-nav ms-auto"><li class="nav-item"><a class="nav-link">Sistema Escolar</a></li></ul>
        </div>
      </nav>

      <main class="content px-4 py-4">
        <div class="container-fluid">

          <h3 class="fw-bold fs-4 mb-3">Painel</h3>

          <!-- CARDS / GRÁFICOS -->
          <div class="row g-3">
            <div class="col-md-3">
              <div class="card p-3">
                <small>Total de alunos</small>
                <h2 id="card-total">...</h2>
              </div>
            </div>

            <div class="col-md-9">
              <div class="card p-3">
                <small>Alunos por curso</small>
                <canvas id="chartCursos" height="120"></canvas>
              </div>
            </div>
          </div>

          <div class="row g-3 mt-3">
            <div class="col-md-6">
              <div class="card p-3">
                <small>Cadastros últimos 12 meses</small>
                <canvas id="chartMensal" height="150"></canvas>
              </div>
            </div>

            <div class="col-md-6">
              <div class="card p-3">
                <small>Faixa etária</small>
                <canvas id="chartFaixa" height="150"></canvas>
              </div>
            </div>
          </div>

          <!-- TABELA -->
          <div class="row g-3 mt-4">
            <div class="col-12">
              <div class="card p-3">

                <small>Lista de cadastros</small>

                <div class="d-flex mb-2">
                  <a href="formulario.html" class="btn btn-primary me-2">Novo Cadastro</a>
                  <button id="limpar" class="btn btn-outline-danger">Limpar todos</button>
                </div>

                <div class="table-responsive">
                  <table class="table table-striped" id="tabelaCadastros">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>Data Nasc</th>
                        <th>Endereço</th>
                        <th>Responsável</th>
                        <th>Tipo</th>
                        <th>Curso</th>
                        <th>Ações</th>
                      </tr>
                    </thead>
                    <tbody></tbody>
                  </table>
                </div>

              </div>
            </div>
          </div>

        </div>
      </main>

    </div>
  </div>

<!-- ==== SCRIPTS ==== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- SEUS SCRIPTS (IMPORTANTE: NO FINAL!) -->
<script src="dashboard.js"></script>
<script src="dashboard_charts.js"></script>

</body>
</html>
