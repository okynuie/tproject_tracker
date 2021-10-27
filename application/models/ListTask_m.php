<?php defined('BASEPATH') or exit('No direct script access allowed');

class Time_m extends CI_Model
{
    private $_table = "list_task";

    public $id_task;
    public $item_task;
    public $desc_task;
    public $id_proj;
    public $created;
    public $modified;
    public $due_date;
    public $status;
    public $priority;
    public $id_user;

    public function __construct()
    {
      parent::__construct();
      $this->load->library('Project_m');
    }

    public function rules()
    {
      return [
        ['field' => 'item_task',
         'label' => 'Item Task',
         'rules' => 'required'],

        ['field' => 'desc_task',
         'label' => 'Desc Task',
         'rules' => 'required'],

        ['field' => 'status',
         'label' => 'Status',
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

    public function save($field)
    {
        $post = $this->input->post();
        $this->id_time=uniqid();
        $this->id_proj= $post['name_proj'];
        $this->alocation_time=$post['alocation_time'];
        $this->work_time=$post['work_time'];
        $this->day=$post['day'];
        $this->id_user=$post['user'];
        
        return $this->db->insert($this->_table, $this);
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_time' => $id));
    }
}