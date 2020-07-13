<?php 

namespace App\Models;
use CodeIgniter\Model;

class TipoLavadoModel extends Model{

	protected $table ='tipo_lavado';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre','precio','estado'];

}



