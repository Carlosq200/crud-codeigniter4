<?php /* app/Views/cursos/create.php */ ?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Crear Curso</title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet"/>
</head>
<body class="grey lighten-4">
  <?php echo view('layouts/navbar'); ?>
  <div class="container" style="margin-top:24px;">
    <div class="card">
      <div class="card-content">
        <span class="card-title">Nuevo Curso</span>
        <?php if(session('errors')): ?>
          <div class="card-panel red lighten-4 red-text text-darken-4">
            <ul style="margin:0;">
              <?php foreach(session('errors') as $e): ?>
                <li><?= esc($e) ?></li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>
        <form method="post" action="<?= base_url('cursos/store') ?>">
          <?= csrf_field() ?>
          <div class="input-field">
            <input type="text" id="nombre" name="nombre" value="<?= old('nombre') ?>">
            <label for="nombre">Nombre</label>
          </div>
          <div class="input-field">
            <input type="text" id="profesor" name="profesor" value="<?= old('profesor') ?>">
            <label for="profesor">Profesor</label>
          </div>
          <p>
            <label>
              <input type="checkbox" name="inactivo" value="1" <?= old('inactivo') ? 'checked' : '' ?> />
              <span>Inactivo</span>
            </label>
          </p>
          <div class="section">
            <button class="btn" type="submit">Guardar</button>
            <a class="btn-flat" href="<?= base_url('cursos') ?>">Cancelar</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
