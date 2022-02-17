<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Registration_Model extends CI_Model
{
    public function registration($data)
    {
        if ($this->db->insert('user', $data)) {
            return $this->db->insert_id();
        } else {
            return 0;
        }
    }
}
