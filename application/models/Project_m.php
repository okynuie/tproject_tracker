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

    public function getBy($field, $value)
    {
        return $this->db->get_where($this->_table, [$field => $value])->row_array();
    }

    public function save()
    {
        $post = $this->input->post();
        $this->id_proj=uniqid();
        $this->name_proj=$post['name_proj'];
        $this->desc=$post['desc'];
        $this->start_date=$post['start_date'];
        $this->end_date=$post['end_date'];
        
        return $this->db->insert($this->_table, $this);
    }

    public function update($id)
    {
        $post = $this->input->post();
        $this->id_proj=$id;
        $this->name_proj=$post['name_proj'];
        $this->desc=$post['desc'];
        $this->start_date=$post['start_date'];
        $this->end_date=$post['end_date'];

        return $this->db->update($this->_table, $this, array('id_proj' => $id));
    }

    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_proj' => $id));
    }
}