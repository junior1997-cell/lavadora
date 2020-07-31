<?php 

namespace App\Models;
use CodeIgniter\Model;

class DetallepedidoprendaModel extends Model{

	protected $table ='detalle_pedido_prenda';
	protected $primaryKey ='iddetalle_pedido_prenda';
	protected $returnType='array';
	protected $allowedFields = ['cantidad_detalle_pedido_prenda','id_prenda','id_color','id_pedido_prenda','descuento_detalle_pedido_prenda']; 

	public function getDetallepedidoAll(){
    	return $this->db->table('detalle_pedido_prenda dpp')
    	->join('prenda p', 'p.idprenda = dpp.id_prenda')  	
    	->join('color c', 'c.idcolor = dpp.id_color')
    	->join('pedido_prenda pp', 'pp.idpedido_prenda = dpp.id_pedido_prenda')
        ->orderby('dpp.iddetalle_pedido_prenda','DESC')
    	->get()->getResultArray();
    }

    public function getDetallepedidoOne($idpedido){
        return $this->db->table('detalle_pedido_prenda dpp')
    	->join('prenda p', 'p.idprenda = dpp.id_prenda')  	
    	->join('color c', 'c.idcolor = dpp.id_color')
    	->join('pedido_prenda pp', 'pp.idpedido_prenda = dpp.id_pedido_prenda')
        ->where('pp.idpedido_prenda',$idpedido)
    	->get()->getResultArray();
    }  

    // public function getClienteAll($id){
    //    return $this->db->table('persona p')
    //    ->where('p.id_cargo',$id)
    //     ->join('sexo s', 'p.id_sexo = s.idsexo')
    //     ->join('tipo_doc td', 'td.idtipo_doc = p.id_tipo_doc')
    //     ->join('cargo c', 'c.idcargo = p.id_cargo')
    //     ->join('distrito d', 'd.iddistrito = p.id_distrito')
    //     ->orderby('p.idpersona','DESC')
    //     ->get()->getResultArray();
    // }  

    //  public function getCargoPersona($id){
    //    return $this->db->table('cargo c')
    //    ->where('c.idcargo >',$id)   
    //    ->where('c.nombre_cargo !=','Cliente')   
    //    ->where('c.nombre_cargo !=','Proveedores')    
    //     ->orderby('c.idcargo','ASC')
    //     ->get()->getResultArray();
    // }  
   
    
}

