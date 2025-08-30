<?php /* app/Views/cursos/index.php */ ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Cursos</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet"/>
</head>
<body class="grey lighten-4">
  <?php echo view('layouts/navbar'); ?>
  <div class="container" style="margin-top:24px;">
    <div class="row">
      <div class="col s12">
        <?php if(session('message')): ?>
          <div class="card-panel green lighten-4 green-text text-darken-4"><?= esc(session('message')) ?></div>
        <?php endif; ?>
        <a href="<?= base_url('cursos/create') ?>" class="btn waves-effect">➕ Nuevo Curso</a>
        <div class="card" style="margin-top:16px;">
          <div class="card-content">
            <span class="card-title">Listado de Cursos</span>
            <table class="striped responsive-table">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Profesor</th>
                  <th>Inactivo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach($cursos as $row): ?>
                <tr>
                  <td><?= $row['curso'] ?></td>
                  <td><?= esc($row['nombre']) ?></td>
                  <td><?= esc($row['profesor']) ?></td>
                  <td><?= $row['inactivo'] ? 'Sí' : 'No' ?></td>
                  <td>
                    <a class="btn-small blue" href="<?= base_url('cursos/edit/'.$row['curso']) ?>">✏️ Editar</a>
                    <a class="btn-small red" href="<?= base_url('cursos/delete/'.$row['curso']) ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">🗑️ Eliminar</a>
                  </td>
                </tr>
              <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
