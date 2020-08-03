<?php 

namespace App\Models;
use CodeIgniter\Model;

class BalanceModel extends Model{

	public function gettotaldebe(){
        return $this->db->table('libro_diario') 
        ->select('round(sum(debe),2) as totaldebe')  
        //->where('p.idprenda', $idprenda)
        ->get()->getResultArray();
    }  


}



