<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogsModel;
use App\Models\CommentModel;
use App\Models\ContactModel;
use App\Models\DashboardModel;
use App\Models\ServiceModel;

class Dashboard extends BaseController
{
    public $dmodel;
    public $bmodel;
    public $amodel;
    public $smodel;
    public $cmodel;
    public $cntmodel;
    public $session;
    public function __construct()
    {
        helper("form");
        $this->session = session();
        $this->dmodel = new DashboardModel();
        $this->bmodel = new BlogsModel();
        $this->amodel = new AboutModel();
        $this->smodel = new ServiceModel();
        $this->cmodel = new CommentModel();
        $this->cntmodel = new ContactModel();
    }
    public function index()
    {
        if (session()->has('logged_user')) {
            if (session()->has('logged_user')) {
                $data = [];
                $data['projects'] = $this->dmodel->countProjects();
                $data['blogs'] =  $this->bmodel->countBlogs();
                $data['comments'] =  $this->cmodel->countComments();
                $data['contact'] = $this->cntmodel->findAll();
                return view("dashboard/dashboard-view", $data);
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function uploadBlog()
    {

        if (session()->has('logged_user')) {
            $data = [];
            if ($this->request->getMethod() == 'post') {
                $file = $this->request->getFile('cover');
                $rules = [
                    'img' => 'uploaded[cover]'
                        . '|is_image[cover]'
                        . '|mime_in[cover,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[cover,10000]',
                ];
                if ($this->validate($rules)) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        if ($file->move(FCPATH . 'public\projecticons', $file->getRandomName())) {
                            $data = [
                                'img' => base_url() . '/public/projecticons/' . $file->getName(),
                                'heading' => $this->request->getVar('heading'),
                                'introduction' => $this->request->getVar('introduction'),
                                'body' => $this->request->getVar('body'),
                            ];
                            if ($this->bmodel->save($data) == true) {
                                $this->session->setTempdata('success', 'Blog has been successfully added', 1);
                                return redirect()->to(current_url());
                            } else {
                                $data['errors'] = $this->empModel->errors();
                            }
                        } else {
                            session()->setTempdata('error', $file->getErrorString(), 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        session()->setTempdata('error', $file->getErrorString(), 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/upload-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function readcomments($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['comments'] = $this->cmodel->displayComments($id);
            return view("dashboard/readcomments-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function deletecomments($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $status = $this->cmodel->where('id', $id)->delete();
            if ($status == true) {
                session()->setTempdata('success', 'comment deleted successfully', 3);
                return redirect()->to(base_url() . "/dashboard/uploads");
            } else {
                session()->setTempdata('error', 'Critical error occured', 3);
                return redirect()->to(base_url() . "/dashboard/uploads");
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function replycomments($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['comment'] = $this->cmodel->find($id);
            if ($this->request->getMethod() == 'post') {

                $data = [
                    'reply' => $this->request->getVar('reply'),
                ];
                if ($this->cmodel->update($id, $data) == true) {
                    $this->session->setTempdata('success', 'You have responded to the comment', 1);
                    return redirect()->to(current_url());
                } else {
                    $data['errors'] = $this->empModel->errors();
                }
            }
            return view("dashboard/replycomment-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }

    public function readblog($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['blogs'] = $this->bmodel->find($id);
            return view("dashboard/readblog-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }

    public function editblog($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['blog'] = $this->bmodel->find($id);
            if ($this->request->getMethod() == 'post') {

                $data = [
                    'heading' => $this->request->getVar('heading'),
                    'introduction' => $this->request->getVar('introduction'),
                    'body' => $this->request->getVar('body'),
                ];
                if ($this->bmodel->update($id, $data) == true) {
                    $this->session->setTempdata('success', 'Blog has been successfully added', 1);
                    return redirect()->to(current_url());
                } else {
                    $data['errors'] = $this->empModel->errors();
                }
            }
            return view("dashboard/editblog-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function deleteblog($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $status = $this->bmodel->where('id', $id)->delete();
            if ($status == true) {
                session()->setTempdata('success', 'You project deleted successfully', 3);
                return redirect()->to(base_url() . "/dashboard/uploads");
            } else {
                session()->setTempdata('error', 'Critical error occured', 3);
                return redirect()->to(base_url() . "/dashboard/uploads");
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function uploads()
    {
        if (session()->has('logged_user')) {
            $data['blogs'] = $this->bmodel->findAll();
            return view("dashboard/uploads-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function project()
    {
        if (session()->has('logged_user')) {
            $data['projects'] = $this->dmodel->findAll();
            return view("dashboard/project-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function uploadproject()
    {
        if (session()->has('logged_user')) {
            $data = [];
            if ($this->request->getMethod() == 'post') {
                $file = $this->request->getFile('icon');
                $rules = [
                    'icon' => 'uploaded[icon]'
                        . '|is_image[icon]'
                        . '|mime_in[icon,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[icon,10000]',
                    'projectname' => 'required',
                    'details' => 'required',
                    'moredetails' => 'required',
                    'githublink' => 'required'
                ];
                if ($this->validate($rules)) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        if ($file->move(FCPATH . 'public\projecticons', $file->getRandomName())) {
                            $userdata = [
                                'name' => $this->request->getVar('projectname'),
                                'finishdate' => $this->request->getVar('finishdate'),
                                'details' => $this->request->getVar('details'),
                                'moredetails' => $this->request->getVar('moredetails'),
                                'githublink' => $this->request->getVar('githublink'),
                                'status' => $this->request->getVar('all') . " " . $this->request->getVar('latest') . " " . $this->request->getVar('upcoming') . " " . $this->request->getVar('finished'),
                                'img' => base_url() . '/public/projecticons/' . $file->getName()
                            ];
                            $status = $this->dmodel->save($userdata);
                            if ($status) {
                                session()->setTempdata('success', 'You project updated successfully', 3);
                                return redirect()->to(current_url());
                            } else {
                                session()->setTempdata('error', 'Critical error occured', 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            session()->setTempdata('error', $file->getErrorString(), 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        session()->setTempdata('error', 'You have uploaded an invalid file', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/uploadproject-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function editproject($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['project'] = $this->dmodel->find($id);
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'projectname' => 'required',
                    'details' => 'required',
                    'moredetails' => 'required',
                    'githublink' => 'required'
                ];
                if ($this->validate($rules)) {
                    $userdata = [
                        'name' => $this->request->getVar('projectname'),
                        'finishdate' => $this->request->getVar('finishdate'),
                        'details' => $this->request->getVar('details'),
                        'moredetails' => $this->request->getVar('moredetails'),
                        'githublink' => $this->request->getVar('githublink'),
                        'status' => $this->request->getVar('all') . " " . $this->request->getVar('latest') . " " . $this->request->getVar('upcoming') . " " . $this->request->getVar('finished'),
                    ];
                    $status = $this->dmodel->update($id, $userdata);
                    if ($status == true) {
                        session()->setTempdata('success', 'You project updated successfully', 3);
                        return redirect()->to(current_url());
                    } else {
                        session()->setTempdata('error', 'Critical error occured', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/editproject-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function deleteproject($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $status = $this->dmodel->where('id', $id)->delete();
            if ($status == true) {
                session()->setTempdata('success', 'You project deleted successfully', 3);
                return redirect()->to(base_url() . "/dashboard/project");
            } else {
                session()->setTempdata('error', 'Critical error occured', 3);
                return redirect()->to(base_url() . "/dashboard/project");
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function services()
    {
        if (session()->has('logged_user')) {
            $data = [];
            if ($this->request->getMethod() == 'post') {
                $file = $this->request->getFile('icon');
                $rules = [
                    'icon' => 'uploaded[icon]'
                        . '|is_image[icon]'
                        . '|mime_in[icon,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[icon,10000]',
                    'heading' => 'required',
                    'description' => 'required',

                ];
                if ($this->validate($rules)) {
                    if ($file->isValid() && !$file->hasMoved()) {
                        if ($file->move(FCPATH . 'public\projecticons', $file->getRandomName())) {
                            $userdata = [
                                'heading' => $this->request->getVar('heading'),
                                'description' => $this->request->getVar('description'),
                                'img' => base_url() . '/public/projecticons/' . $file->getName()
                            ];
                            $status = $this->smodel->countRows();
                            if ($status) {
                                $status = $this->smodel->save($userdata);
                                if ($status == true) {
                                    session()->setTempdata('success', 'You service updated successfully', 3);
                                    return redirect()->to(current_url());
                                } else {
                                    session()->setTempdata('error', 'Critical error occured', 3);
                                    return redirect()->to(current_url());
                                }
                            } else {
                                session()->setTempdata('error', 'Only 4 rows  should be entered', 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            session()->setTempdata('error', $file->getErrorString(), 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        session()->setTempdata('error', 'You have uploaded an invalid file', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/services-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function viewservices()
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['projects'] = $this->smodel->findAll();
            return view('dashboard/serviceview-view', $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function deleteservice($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $status = $this->smodel->where('id', $id)->delete();
            if ($status == true) {
                session()->setTempdata('success', 'Your viewabout deleted successfully', 3);
                return redirect()->to(base_url() . "/dashboard/viewservices");
            } else {
                session()->setTempdata('error', 'Critical error occured', 3);
                return redirect()->to(base_url() . "/dashboard/viewservices");
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function editservice($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['project'] = $this->smodel->find($id);
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'heading' => 'required',
                    'description' => 'required',
                ];
                if ($this->validate($rules)) {
                    $userdata = [
                        'heading' => $this->request->getVar('heading'),
                        'description' => $this->request->getVar('description')
                    ];
                    $status = $this->smodel->update($id, $userdata);
                    if ($status == true) {
                        session()->setTempdata('success', 'You project updated successfully', 3);
                        return redirect()->to(current_url());
                    } else {
                        session()->setTempdata('error', 'Critical error occured', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/editservice-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function about()
    {
        if (session()->has('logged_user')) {
            $data = [];
            if ($this->request->getMethod() == 'post') {
                $file = $this->request->getFile('profile');
                $rules = [
                    'profile' => 'uploaded[profile]'
                        . '|is_image[profile]'
                        . '|mime_in[profile,image/jpg,image/jpeg,image/gif,image/png,image/webp]'
                        . '|max_size[profile,10000]',
                    'fullname' => 'required|alpha_space',
                    'introduction' => 'required',
                    'history' => 'required|',
                    'email' => 'required|valid_email',
                    'phonenumber' => 'required',
                    'workexperience' => 'required|numeric'
                ];
                if ($this->validate($rules)) {
                    $status = $this->amodel->countRows();
                    if ($status) {
                        if ($file->isValid() && !$file->hasMoved()) {
                            if ($file->move(FCPATH . 'public\projecticons', $file->getRandomName())) {
                                $userdata = [
                                    'img' => base_url() . '/public/projecticons/' . $file->getName(),
                                    'fullname' => $this->request->getVar('fullname'),
                                    'introduction' => $this->request->getVar('introduction'),
                                    'history' => $this->request->getVar('history'),
                                    'email' => $this->request->getVar('email'),
                                    'phone' => $this->request->getVar('phonenumber'),
                                    'experience' => $this->request->getVar('workexperience'),
                                ];
                                $status = $this->amodel->save($userdata);
                                if ($status == true) {
                                    session()->setTempdata('success', 'You project updated successfully', 3);
                                    return redirect()->to(current_url());
                                } else {
                                    session()->setTempdata('error', 'Critical error occured', 3);
                                    return redirect()->to(current_url());
                                }
                            } else {
                                session()->setTempdata('error', $file->getErrorString(), 3);
                                return redirect()->to(current_url());
                            }
                        } else {
                            session()->setTempdata('error', 'You have uploaded an invalid file', 3);
                            return redirect()->to(current_url());
                        }
                    } else {
                        session()->setTempdata('error', 'You only allowed to enter once now edit', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/about-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function viewabout()
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['about'] = $this->amodel->findAll();
            return view('dashboard/aboutview-view', $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function deleteabout($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $status = $this->amodel->where('id', $id)->delete();
            if ($status == true) {
                session()->setTempdata('success', 'Your viewabout deleted successfully', 3);
                return redirect()->to(base_url() . "/dashboard/viewabout");
            } else {
                session()->setTempdata('error', 'Critical error occured', 3);
                return redirect()->to(base_url() . "/dashboard/viewabout");
            }
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function editabout($id = null)
    {
        if (session()->has('logged_user')) {
            $data = [];
            $data['project'] = $this->amodel->find($id);
            if ($this->request->getMethod() == 'post') {
                $rules = [
                    'fullname' => 'required|alpha_space',
                    'introduction' => 'required',
                    'history' => 'required',
                    'email' => 'required|valid_email',
                    'phonenumber' => 'required',
                    'workexperience' => 'required|numeric'
                ];
                if ($this->validate($rules)) {
                    $userdata = [
                        'fullname' => $this->request->getVar('fullname'),
                        'introduction' => $this->request->getVar('introduction'),
                        'history' => $this->request->getVar('history'),
                        'email' => $this->request->getVar('email'),
                        'phone' => $this->request->getVar('phonenumber'),
                        'experience' => $this->request->getVar('workexperience'),
                    ];

                    $status = $this->amodel->update($id, $userdata);
                    if ($status == true) {
                        session()->setTempdata('success', 'Your about updated successfully', 3);
                        return redirect()->to(current_url());
                    } else {
                        session()->setTempdata('error', 'Critical error occured', 3);
                        return redirect()->to(current_url());
                    }
                } else {
                    $data['validation'] = $this->validator;
                }
            }
            return view("dashboard/editabout-view", $data);
        } else {
            return redirect()->to(base_url() . "/register");
        }
    }
    public function logout()
    {
        if (session()->has('logged_info')) {
            $la_id = session()->get('logged_info');
            $this->dmodel->updateLogoutTime($la_id);
        }
        session()->remove('logged_user');
        session()->destroy();
        return redirect()->to(base_url() . "/register");
    }
}
