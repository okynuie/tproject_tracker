<?php defined('BASEPATH') or exit('No direct script access allowed');

class Time_m extends CI_Model
{
    private $_table = "total_time";

    public $id_ttime;
    public $id_proj;
    public $total_ttime;
    public $id_user;

    public function __construct()
    {
      parent::__construct();
      $this->load->library('Project_m');
      $this->load->library('Time_m');
      $this->load->library('LogTime');
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
        $alocation = $this->time_m;
        $time = $this->LogTime;
        $this->id_ttime=uniqid();
        $this->id_proj= $post['name_proj'];
        $remaintime = $alocation['alocation_time'] - $time['total_count'];
        $totaltime = $this->total_ttime + $remaintime;
        $this->total_ttime=$totaltime;

        $this->id_user=$post['user'];
        
        return $this->db->insert($this->_table, $this);
    }


    public function delete($id)
    {
        return $this->db->delete($this->_table, array('id_ttime' => $id));
    }
}