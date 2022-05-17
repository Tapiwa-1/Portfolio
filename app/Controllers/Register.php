<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogsModel;
use App\Models\DashboardModel;
use App\Models\LoginModel;
use App\Models\Register as ModelsRegister;

class Register extends BaseController
{
    public $lModel;
    public $dmodel;
    public $bmodel;
    public $amodel;
    public $rModel;
    public function __construct()
    {
        helper("form");

        $this->dmodel = new DashboardModel();
        $this->bmodel = new BlogsModel();
        $this->amodel = new AboutModel();
        $this->lModel = new LoginModel();
        $this->rModel = new ModelsRegister();
        $this->session = \Config\Services::session();
        $this->email = \Config\Services::email();
    }
    public function index()
    {
        $data = [];
        if ($this->request->getMethod() == "post") {
            $rules = [
                'email' => 'required|valid_email',
                'password' => 'required|min_length[6]|max_length[16]'
            ];
            if ($this->validate($rules)) {
                $email = $this->request->getVar('email');
                $password = $this->request->getVar('password');

                $throttler = \config\services::throttler();
                $allow = $throttler->check('login', 4, MINUTE);

                if ($allow) {
                    $userdata = $this->lModel->verifyEmail($email);
                    if ($userdata) {
                        if (password_verify($password, $userdata['password'])) {
                            if ($userdata['status'] == 'active') {
                                $loginInfo = [
                                    'uniid' => $userdata['uniid'],
                                    'agent' => $this->getUserAgentInfo(),
                                    'ip' => $this->request->getIPAddress(),
                                    'login_time' => date('Y-m-d h:i:s'),
                                ];
                                $la_id = $this->lModel->saveLoginInfo($loginInfo);
                                if ($la_id) {
                                    $this->session->set('logged_info', $la_id);
                                }
                                $this->session->set('logged_user', $userdata['uniid']);
                                return redirect()->to(base_url() . '/dashboard');
                            }
                        } else {
                            $this->session->setTempdata('error', 'Sorry! wrong password entered', 1);
                            return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setTempdata('error', 'Sorry! no email matched', 1);
                        return redirect()->to(current_url());
                    }
                } else {
                    $this->session->setTempdata('Max number of attempts try after a minute', 1);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validattion'] = $this->validator;
            }
        }

        return view('Register/login-view', $data);
    }
    public function getUserAgentInfo()
    {
        $agent = $this->request->getUserAgent();
        if ($agent->isBrowser()) {
            $currentAgent = $agent->getBrowser() . ' ' . $agent->getVersion();
        } elseif ($agent->isRobot()) {
            $currentAgent = $agent->getRobot();
        } elseif ($agent->isMobile()) {
            $currentAgent = $agent->getMobile();
        } else {
            $currentAgent = 'Unidentified User Agent';
        }
        return $currentAgent;
    }

    public function register()
    {
        $data = [];

        if ($this->request->getMethod() == "post") {
            $rules = [
                'firstname' => 'required|min_length[4]|max_length[20]',
                'lastname' => 'required|min_length[4]|max_length[20]',
                'email' => 'required|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[16]',
                'confirmpassword' => 'required|matches[password]',
            ];
            if ($this->validate($rules)) {
                if ($this->request->getMethod() == 'post') {
                    $uniid = str_shuffle('abcdefghijkmnopqrtuvwxyz' . time());
                    $userdata = [
                        'firstname' => $this->request->getVar('firstname'),
                        'lastname' => $this->request->getVar('lastname'),
                        'email' => $this->request->getVar('email'),
                        'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                        'uniid' => $uniid,
                        'activation_date' => date("Y-m-d h:i:s"),
                    ];

                    $status = $this->rModel->createUser($userdata);
                    if ($status) {
                        $to = $this->request->getVar('email');
                        $subject = "Account Activation link - Sample Test";
                        $message = base_url() . "/register/activate/" . $uniid;
                        $this->email->setTo($to);
                        $this->email->setFrom("tmotsi10@gmail.com", "info");
                        $this->email->setSubject($subject);
                        $this->email->setMessage($message);
                        $filepath = "public/assets/portfolio/img/logo.png";
                        $this->email->attach($filepath);
                        if ($this->email->send()) {
                            $this->session->setTempdata('success', 'Account Created successfully. please activate your account', 2);
                            return redirect()->to(current_url());
                        } else {
                            $this->session->setTempdata('error', 'Account Created successfully. Sorry unable to send activation link contact admin', 2);
                            //return redirect()->to(current_url());
                            //$datar = $this->email->printDebugger(['header']);
                            //print_r($datar);
                            //return redirect()->to(current_url());
                        }
                    } else {
                        $this->session->setTempdata('error', 'sorry unable to create account try again', 3);
                        return redirect()->to(current_url());
                    }
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('Register/register-view', $data);
    }
    public function activate($uniid = null)
    {
        $data = [];

        if (!empty($uniid)) {
            $userdata = $this->rModel->verifyUniid($uniid);
            if ($userdata) {
                if ($this->verifyExpiryTime($userdata->activation_date)) {
                    if ($userdata->status == 'inactive') {
                        $status = $this->rModel->updateStatus($uniid);
                        if ($status == true) {
                            $data['success'] == "Account activated successfully";
                        }
                    } else {
                        $data['success'] = "Your account is already activated";
                    }
                } else {
                    $data['error'] = "Sorry activation link was expered";
                }
            } else {
                $data['error'] = "Sorry unable to process your record";
            }
        } else {
            $data['error'] = "Sorry unable to process your request";
        }

        return view("Register/activate-view", $data);
    }
    public function verifyExpiryTime($regTime)
    {
        $curTime = (int)time();
        $regTime = (int)strtotime($regTime);
        $diffTime = (int)$curTime - (int)$regTime;
        if (3600 > $diffTime) {
            return true;
        } else {
            return false;
        }
    }
}
