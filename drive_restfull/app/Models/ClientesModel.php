<?php 

namespace App\Models;
use CodeIgniter\Model;

class ClientesModel extends Model{

	protected $table ='persona';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre','apellidos','id_sexo','id_tipo_doc','num_doc','email','password','celular','id_cargo','id_distrito','direccion','imagen','estado']; 
	 
}

