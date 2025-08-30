<?php /* app/Views/cursos/edit.php */ ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Editar Curso</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet"/>
</head>
<body class="grey lighten-4">
  <?php echo view('layouts/navbar'); ?>
  <div class="container" style="margin-top:24px;">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Editar Curso #<?= $curso['curso'] ?></span>
        <?php if(session('errors')): ?>
          <div class="card-panel red lighten-4 red-text text-darken-4">
            <ul style="margin:0;">
              <?php foreach(session('errors') as $e): ?>
                <li><?= esc($e) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url('cursos/update/'.$curso['curso']) ?>">
          <?= csrf_field() ?>
          <div class="input-field">
            <input type="text" id="nombre" name="nombre" value="<?= set_value('nombre', $curso['nombre']) ?>">
            <label class="active" for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" id="profesor" name="profesor" value="<?= set_value('profesor', $curso['profesor']) ?>">
            <label class="active" for="profesor">Profesor</label>
          </div>
          <p>
            <label>
              <input type="checkbox" name="inactivo" value="1" <?= $curso['inactivo'] ? 'checked' : '' ?> />
              <span>Inactivo</span>
            </label>
          </p>
          <div class="section">
            <button class="btn" type="submit">Actualizar</button>
            <a class="btn-flat" href="<?= base_url('cursos') ?>">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
