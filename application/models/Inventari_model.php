<?php
Class Inventari_model extends CI_Model
{
  function TampilData() 
    {
        $this->db->order_by('id', 'ASC');
        return $this->db->from('stk_barang')
          ->join('out_barang', 'out_barang.id=stk_barang.out_barang')
          ->get()
          ->result();
    }  
}
?>