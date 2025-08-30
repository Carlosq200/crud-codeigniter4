<?php /* app/Views/layouts/navbar.php */ ?>
<nav>
  <div class="nav-wrapper teal">
    <a href="<?= base_url('/') ?>" class="brand-logo" style="margin-left:12px;">UMG</a>
    <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li><a href="<?= base_url('alumnos') ?>">Alumnos</a></li>
      <li><a href="<?= base_url('cursos') ?>">Cursos</a></li>
    </ul>
  </div>
</nav>
