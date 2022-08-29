<?php

namespace App\Models;
use CodeIgniter\I18n\Time;
use CodeIgniter\Model;

class ModelSekolah extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'sekolah';
    
    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table($this->table);
    }

    public function get_province()
    {
        $query = $this->builder->select('kode_prop, propinsi')->groupBy('propinsi')->get();
        return $query->getResult();
    }
    public function get_city($kode_prop)
    {
        $query = $this->builder->select('kode_kab_kota, kabupaten_kota')->groupBy('kabupaten_kota')->where('kode_prop',$kode_prop)->get();
        return $query->getResult();
    }
    public function get_districts($kode_kab_kota)
    {
        $query = $this->builder->select('kode_kec, kecamatan')->groupBy('kecamatan')->where('kode_kab_kota',$kode_kab_kota)->get();
        return $query->getResult();
    }
    public function get_school($kode_kec,$level)
    {
        $query = $this->builder->select('id, sekolah')->where('kode_kec',$kode_kec)->where('bentuk',$level)->get();
        return $query->getResult();
    }
}