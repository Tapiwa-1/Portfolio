<?php

namespace App\Controllers;

use App\Models\AboutModel;
use App\Models\BlogsModel;
use App\Models\CommentModel;
use App\Models\ContactModel;
use App\Models\DashboardModel;
use App\Models\ServiceModel;

class Home extends BaseController
{
    public $dmodel;
    public $bmodel;
    public $amodel;
    public $smodel;
    public $cmodel;
    public $cntmodel;
    public function __construct()
    {
        helper("form");
        $this->dmodel = new DashboardModel();
        $this->bmodel = new BlogsModel();
        $this->amodel = new AboutModel();
        $this->smodel = new ServiceModel();
        $this->cmodel = new CommentModel();
        $this->cntmodel = new ContactModel();
    }
    public function index()
    {

        return view('blog/home-view');
    }
    public function about()
    {
        $data = [];
        $data['about'] = $this->amodel->findAll();
        return view('blog/about-view', $data);
    }
    public function services()
    {
        $data = [];
        $data['projects'] = $this->smodel->findAll();
        return view('blog/service-view', $data);
    }
    public function portfolio()
    {
        $data = [];
        $data['projects'] = $this->dmodel->findAll();
        return view('blog/portfolio-view', $data);
    }
    public function portfoliodetails($id = null)
    {
        $data = [];
        $data['projects'] = $this->dmodel->find($id);

        return view('blog/portfoliodetails-view', $data);
    }
    public function blog()
    {
        $data = [];
        $data['blog'] = $this->bmodel->findAll();
        return view('blog/blog-view', $data);
    }
    public function blogdetails($id = null)
    {
        $data = [];
        $data['blog'] = $this->bmodel->find($id);
        $data['about'] = $this->amodel->findAll();
        $data['comments'] = $this->cmodel->findAll();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'username' => 'required',
                'comment' => 'required',
            ];
            if ($this->validate($rules)) {
                $userdata = [
                    'username' => $this->request->getVar('username'),
                    'comment' => $this->request->getVar('comment'),
                    'blog' => $id,
                ];
                $status = $this->cmodel->save($userdata);
                if ($status == true) {
                    session()->setTempdata('success', 'Comment Posted', 3);
                    return redirect()->to(current_url());
                } else {
                    session()->setTempdata('error', 'Critical error occured', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('blog/blog-details-view', $data);
    }
    public function contact()
    {
        $data = [];
        $data['about'] = $this->amodel->findAll();
        if ($this->request->getMethod() == 'post') {
            $rules = [
                'name' => 'required',
                'email' => 'required|valid_email',
                'subject' => 'required',
                'message' => 'required',
            ];
            if ($this->validate($rules)) {
                $userdata = [
                    'name' => $this->request->getVar('name'),
                    'email' => $this->request->getVar('email'),
                    'subject' => $this->request->getVar('subject'),
                    'message' => $this->request->getVar('message')
                ];
                $status = $this->cntmodel->save($userdata);
                if ($status == true) {
                    session()->setTempdata('success', 'Message sent successfully', 3);
                    return redirect()->to(current_url());
                } else {
                    session()->setTempdata('error', 'Critical error occured', 3);
                    return redirect()->to(current_url());
                }
            } else {
                $data['validation'] = $this->validator;
            }
        }
        return view('blog/contact-view', $data);
    }
}
