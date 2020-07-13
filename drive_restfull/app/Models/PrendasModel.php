<?php 

namespace App\Models;
use CodeIgniter\Model;

class PrendasModel extends Model{

	protected $table ='prenda';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre','imagen','precio','estado'];

}



