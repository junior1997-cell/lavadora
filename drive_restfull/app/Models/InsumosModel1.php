<?php 

namespace App\Models;
use CodeIgniter\Model;

class InsumosModel1 extends Model{

	protected $table ='insumos_lavado';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre','stock','imagen','descripcion','estado'];

}



