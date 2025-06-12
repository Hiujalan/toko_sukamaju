<?php

namespace App\Models;

use CodeIgniter\Model;

class BoModel extends Model
{
    // PRODUCT
    public function getAllProduct()
    {
        return $this->db->table('product a')
            ->join('suplier b', 'a.suplier_idx=b.suplier_idx', 'INNER JOIN')
            ->orderBy('a.created_at', 'DESC')
            ->get()
            ->getResultArray();
    }

    public function getSelectedProduct(String $idx)
    {
        return $this->db->table('product a')
            ->join('suplier b', 'a.suplier_idx=b.suplier_idx', 'INNER JOIN')
            ->where('a.product_idx', $idx)
            ->orderBy('a.created_at', 'DESC')
            ->get()
            ->getRowArray();
    }

    // TRANSACTION
    public function getNetIncome()
    {
        return $this->db->table('transaction')
            ->selectSum('transaction_price')
            ->get()
            ->getRowArray();
    }
    public function getAllTransaction()
    {
        return $this->db->table('transaction a')
            ->join('auth b', 'a.transaction_employees=b.auth_idx', 'INNER JOIN')
            ->orderBy('a.created_at', 'DESC')
            ->get()
            ->getResultArray()
        ;
    }
    public function getAllProductSold(String $idx)
    {
        return $this->db->table('transaction_product a')
            ->select('b.product_name, b.product_variant, b.product_series')
            ->join('product b', 'a.product_idx=b.product_idx', 'INNER JOIN')
            ->where('a.transaction_idx', $idx)
            ->get()
            ->getResultArray()
        ;
    }

    // USER
    public function getAllUser(int $access_id)
    {
        return $this->db->table('auth a')
            ->join('auth_access b', 'a.auth_access=b.auth_access_id', 'INNER JOIN')
            ->like('b.auth_access_id', $access_id)
            ->get()
            ->getResultArray()
        ;
    }
}
