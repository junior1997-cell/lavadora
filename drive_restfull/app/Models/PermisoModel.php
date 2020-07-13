<?php 

namespace App\Models;
use CodeIgniter\Model;

class PermisoModel extends Model{

	protected $table ='permiso';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['id','nombre'];
}



