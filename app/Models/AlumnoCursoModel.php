<?php
namespace App\Models;

use CodeIgniter\Model;

class AlumnoCursoModel extends Model
{
    protected $table = 'detalle_alumno_curso';
    protected $primaryKey = 'id';
    protected $allowedFields = ['alumno_id', 'curso_id', 'created_at'];
    protected $useTimestamps = false;
}
