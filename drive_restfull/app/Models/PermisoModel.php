<?php 

namespace App\Models;
use CodeIgniter\Model;

class PermisoModel extends Model{

	protected $table ='permiso';
	protected $primaryKey ='idpermiso';
	protected $returnType='array';
	protected $allowedFields = ['nombre_permiso'];
}



