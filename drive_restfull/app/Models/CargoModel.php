<?php 

namespace App\Models;
use CodeIgniter\Model;

class CargoModel extends Model{

	protected $table ='cargo';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre','estado'];
}



