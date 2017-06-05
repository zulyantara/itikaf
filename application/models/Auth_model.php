<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{
    /*
     * @author zulyantara <zulyantara@gmail.com>
     * @copyright copyright 2016 zulyantara
     */

    function __construct()
    {
        parent::__construct();
    }

    function validate($username, $userpassword)
    {
        // $hashAndSalt = $this->get_password($username);
        // $password_hash = password_hash($userpassword, PASSWORD_BCRYPT, array("cost" => 12));

        $this->db->select("user_id, user_username, user_password, peserta_id, peserta_nama, peserta_email, peserta_foto, peserta_ktp, peserta_insert_date, user_ur, ur_ket");
        $this->db->join('peserta', 'peserta_id = user_peserta', 'left');
        $this->db->join('users_role','user_ur=ur_id','left');
        $this->db->where('user_username', $username);
        $this->db->where("user_active", 1);
        $query = $this->db->get('users');
        // echo $this->db->last_query();exit;
        $row_user = $query->num_rows() > 0 ? $query->row() : FALSE;
        if ($row_user !== FALSE)
        {
            if (password_verify($userpassword,$row_user->user_password))
            {
                return $query->row();
                // return array("user_id"=>$row_user->user_id,"user_name"=>$row_user->user_name,"user_email"=>$row_user->user_email);
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function get_ha($select, $where)
    {
        foreach ($where as $key => $val)
        {
            $this->db->where($key, $val);
        }
        $this->db->select($select);
        $this->db->join('hak_akses', 'ha_menu = menu_id', 'left');
        // echo $this->db->get_compiled_select('menu');exit;
        $qry = $this->db->get('menu');
        return $qry->num_rows() > 0 ? $qry->row() : FALSE;
    }

    function check_password($pwd)
    {
        $this->db->where('user_id', $this->session->userdata('userId'));
        $this->db->where("user_active", 1);
        $query = $this->db->get('users');
        // echo $this->db->last_query();exit;
        $row_user = $query->num_rows() > 0 ? $query->row() : FALSE;
        if ($row_user !== FALSE)
        {
            if (password_verify($pwd, $row_user->user_password))
            {
                // return $query->row();
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
    }

    function update_password($data)
    {
        $this->db->where('user_id', $this->session->userdata('userId'));
        $this->db->update("users", $data);
    }

    function count_data()
    {
        $this->db->from("slider");
        return $this->db->count_all_results();
    }

    function get_fheader()
    {
        $qry = $this->db->get('footer_header_link');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }

    function count_fheader()
    {
        $qry = $this->db->get('footer_header_link');
        return $qry->num_rows();
    }

    function get_flink($id)
    {
        $this->db->where('fl_fhl', $id);
        $qry = $this->db->get('footer_link');
        return $qry->num_rows() > 0 ? $qry->result() : FALSE;
    }
}
