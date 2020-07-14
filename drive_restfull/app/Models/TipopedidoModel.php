<?php 

namespace App\Models;
use CodeIgniter\Model;

class TipopedidoModel extends Model{

	protected $table ='tipo_pedido';
	protected $id ='id';
	protected $returnType='array';
	protected $allowedFields = ['nombre'];

}



