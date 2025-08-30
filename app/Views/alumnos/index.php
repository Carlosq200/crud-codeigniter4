<!DOCTYPE html>
<html>
<head>
    <title>Lista de Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>
  <?= view('layouts/navbar'); ?>
    <div class="container">
    <h4>Alumnos</h4>
    <a class="btn waves-effect" href="<?= site_url('alumnos/create') ?>">➕ Nuevo Alumno</a>
    <table class="striped highlight responsive-table">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dirección</th>
            <th>Móvil</th>
            <th>Email</th>
            <th>Detalle</th>
            <th>Inactivo</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?= $alumno['alumno'] ?></td>
            <td><?= $alumno['nombre'] ?></td>
            <td><?= $alumno['apellido'] ?></td>
            <td><?= $alumno['direccion'] ?></td>
            <td><?= $alumno['movil'] ?></td>
            <td><?= $alumno['email'] ?></td>
            <td><i class="material-icons">list</i></td>
            <td><?= $alumno['inactivo'] ? 'Sí' : 'No' ?></td>
            <td>
                <a class="btn-small blue" href="<?= site_url('alumnos/edit/' . $alumno['alumno']) ?>">✏️ Editar</a>
                <a class="btn-small red" href="<?= site_url('alumnos/delete/' . $alumno['alumno']) ?>" onclick="return confirm('¿Seguro que quieres eliminar?')">🗑️ Eliminar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>

<!-- Modales y scripts de asignación -->
<div id="modal-asignar" class="modal">
  <div class="modal-content">
    <h4>Asignar cursos al alumno <span id="alumnoNombre"></span></h4>
    <form id="formAsignacion">
      <div id="listaCursos" class="section" style="max-height:300px; overflow:auto;"></div>
      <div class="modal-footer" style="padding-top:16px;">
        <a href="#!" class="modal-close btn-flat">Cancelar</a>
        <button class="btn" type="submit">Guardar</button>
      </div>
    </form>
  </div>
</div>
<div id="modal-ver" class="modal">
  <div class="modal-content">
    <h4>Cursos asignados</h4>
    <ul id="listaAsignados" class="collection"></ul>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close btn-flat">Cerrar</a>
  </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
  var elems = document.querySelectorAll('.modal');
  M.Modal.init(elems);
  document.body.addEventListener('click', async function(e){
    const btn = e.target.closest('[data-accion]');
    if(!btn) return;
    const accion = btn.dataset.accion;
    const alumnoId = btn.dataset.id;
    const alumnoNombre = btn.dataset.nombre || '';
    if(accion === 'asignar'){
      document.getElementById('alumnoNombre').textContent = alumnoNombre;
      const res = await fetch('<?= base_url('alumnos') ?>/'+alumnoId+'/asignaciones');
      const json = await res.json();
      const cont = document.getElementById('listaCursos');
      cont.innerHTML = json.cursos.map(c => {
        const checked = json.asignados.includes(c.curso) ? 'checked' : '';
        return `<p><label><input type="checkbox" name="cursos[]" value="${c.curso}" ${checked}><span>${c.nombre} — ${c.profesor||''}</span></label></p>`;
      }).join('');
      M.Modal.getInstance(document.getElementById('modal-asignar')).open();
      const form = document.getElementById('formAsignacion');
      form.onsubmit = async function(ev){
        ev.preventDefault();
        const fd = new FormData(form);
        const resp = await fetch('<?= base_url('alumnos') ?>/'+alumnoId+'/asignaciones', {method:'POST', body:fd});
        if(resp.ok){
          M.toast({html:'Asignaciones guardadas'});
          btn.classList.add('teal-text');
          M.Modal.getInstance(document.getElementById('modal-asignar')).close();
        }
      }
    } else if(accion === 'ver'){
      const res = await fetch('<?= base_url('alumnos') ?>/'+alumnoId+'/asignaciones');
      const json = await res.json();
      const ul = document.getElementById('listaAsignados');
      ul.innerHTML = json.cursos
        .filter(c => json.asignados.includes(c.curso))
        .map(c => `<li class="collection-item">${c.nombre} — ${c.profesor||''}</li>`).join('') || '<li class="collection-item">Sin cursos</li>';
      M.Modal.getInstance(document.getElementById('modal-ver')).open();
    }
  });
});
</script>
