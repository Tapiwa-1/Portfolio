<?php

namespace App\Models;

use CodeIgniter\Database\Config;
use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table = 'myprojects';
    protected $primary = 'id';
    protected $allowedFields = ['name', 'details', 'githublink', 'details', 'finishdate',  'status', 'moredetails', 'img'];
    protected $returnType = 'array';
    public function countProjects()
    {
        $db = Config::connect();
        $builder = $db->table('myprojects')
            ->select('*');
        $result = $builder->get();
        return count($result->getResultArray());
    }
}

class BlogsModel extends Model
{
    protected $table = 'myblog';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'heading', 'introduction', 'body'];
    protected $useTimpstamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $returnType = 'array';
    protected $validationRules = [
        'heading' => 'required',
        'introduction' => 'required',
        'body' => 'required'
    ];
    public function countBlogs()
    {
        $db = Config::connect();
        $builder = $db->table('myblog')
            ->select('*');
        $result = $builder->get();
        return count($result->getResultArray());
    }
}
class AboutModel extends Model
{
    protected $table = 'myself';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'fullname', 'introduction', 'history', 'email', 'phone', 'experience'];
    protected $useTimpstamps = true;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    protected $returnType = 'array';
    public function countRows()
    {
        $db = Config::connect();
        $builder = $db->table('myself')
            ->select('*');
        $result = $builder->get();
        if (count($result->getResultArray()) >= 1) {
            return false;
        } else {
            return true;
        }
    }
}
class ServiceModel extends Model
{
    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $allowedFields = ['img', 'heading', 'description'];
    protected $useTimpstamps = true;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    protected $returnType = 'array';
    public function countRows()
    {
        $db = Config::connect();
        $builder = $db->table('services')
            ->select('*');
        $result = $builder->get();
        if (count($result->getResultArray()) == 4) {
            return false;
        } else {
            return true;
        }
    }
}
class Register extends Model
{
    public function createUser($data)
    {
        $db = Config::connect();
        $builder = $this->db->table('users');
        $builder = $this->db->table('users');
        $builder->select('*');
        $result = $builder->get();
        if (count($result->getResultArray()) < 1) {
            $res = $builder->insert($data);
            if ($res >= 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public function verifyUniid($id)
    {
        $db = Config::connect();
        $builder = $this->db->table('users');
        $builder->select('activation_date, uniid, status')
            ->where('uniid', $id);
        $result = $builder->get();
        if (count($result->getResultArray()) == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }
    public function updateStatus($id)
    {
        $db = Config::connect();
        $builder = $this->db->table('users')
            ->where("uniid", $id)
            ->update(["status" => "active"]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}
class LoginModel extends Model
{
    public function verifyEmail($email)
    {
        $builder = $this->db->table('users')
            ->select("uniid,status,firstname,lastname,password")
            ->where('email', $email);
        $results = $builder->get();
        if (count($results->getResultArray()) == 1) {
            return (array)$results->getRow();
        } else {
            return false;
        }
    }
    public function saveLoginInfo($loginInfo)
    {
        $builder = $this->db->table('login_activity')
            ->insert($loginInfo);
        if ($this->db->affectedRows() == 1) {
            return $this->db->insertID();
        } else {
            return false;
        }
    }
    public function updatedAt($uniid)
    {
        $builder = $this->db->table('users')
            ->where('uniid', $uniid)
            ->update(['updated_at' => date('Y-m-d h:i:s')]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function verifyTocken($token)
    {
        $builder = $this->db->table('users')
            ->select("uniid,username,updated_at")
            ->where("uniid", $token);
        $results = $builder->get();
        if (count($results->getResultArray()) == 1) {
            return $results->getRowArray();
        } else {
            return false;
        }
    }
    public function updatePassword($token, $pwd)
    {
        $builder = $this->db->table('users')
            ->where('uniid', $token)
            ->update(['password' => $pwd]);
        if ($this->db->affectedRows() == 1) {
            return true;
        } else {
            return false;
        }
    }
    public function CheckUsers()
    {
        $builder = $this->db->table('users')
            ->select('*');
        $result = $builder->get();
        if (count($result->getResultArray()) >= 1) {
            return false;
        } else {
            return true;
        }
    }
}
class CommentModel extends Model
{
    protected $table = 'comments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['blog', 'username', 'comment', 'reply'];
    protected $useTimpstamps = true;
    //protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    protected $returnType = 'array';
    public function countComments()
    {
        $db = Config::connect();
        $builder = $db->table('comments')
            ->select('*');
        $result = $builder->get();
        return count($result->getResultArray());
    }
    public function displayComments($id)
    {
        $db      = \Config\Database::connect();
        $builder = $db->table('comments')->where('blog', $id);
        $query   = $builder->get();
        return $query->getResult();
    }
}
class ContactModel extends Model
{
    protected $table = 'contact';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'subject', 'message'];
    protected $useTimpstamps = true;
    protected $createdField = 'created_at';
    //protected $updatedField = 'updated_at';
    protected $returnType = 'array';
}
