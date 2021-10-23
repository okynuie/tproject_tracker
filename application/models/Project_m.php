<?php defined('BASEPATH') or exit('No direct script access allowed');

class Project_m extends CI_Model
{
    private $_table = "project";

    public $id_proj;
    public $name_proj;
    public $decs;
    public $start_date;
    public $end_date;

    public function rules()
    {
      return [
        ['field' => 'name_proj',
         'label' => 'Name Project',
         'rules' => 'required'],

        ['field' => 'desc',
         'label' => 'Description',
         'rules' => 'required'],

        ['field' => 'start_date',
         'label' => 'Start Date',
         'rules' => 'numeric | required'],
         
        ['field' => 'end_date',
         'label' => 'End Date',
         'rules' => 'numeric | required']
      ];
    }

    public function getAll()
    {
      return $this->db->get($this->_table)->result_array();
    }
}