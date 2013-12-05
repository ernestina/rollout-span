<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AuthController extends BaseController {

    public function __construct($registry) {
        parent::__construct($registry);
    }

    public function index() {
        $this->view->load('admin/login');
    }

    public function login() {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $pwd = $pass;
        $cuser = new User($this->registry);
        $res = $cuser->login($user, $pwd);
        var_dump($res);
        if ((int) $res[0] == 1) {
            Session::createSession();
            Session::set('loggedin', TRUE);
            Session::set('user', $user);
            Session::set('role', $res[1]);
            Session::set('id_user',$res[3]);
            if (Session::get('role') == ADMIN) {
                header('location:' . URL);
            } elseif (Session::get('role') == KPPN) {
                //if (Session::get('user') == 'KPPN JAKARTA II') {
                header('location:' . URL . 'dataKppn/addDataKppnLvl3');
                //} elseif (Session::get('user') == 'KPPN JAKARTA VI') {
                    //header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt6');
                //} else {
                    //header('location:' . URL . 'auth/login');
                //}
            } elseif (Session::get('role') == BA999) {
                header('location:' . URL . 'dataBa/adddataBa');
            } elseif (Session::get('role') == PKN) {
                header('location:' . URL . 'dataPkn/addDataPkn');
            } else {
                header('location:' . URL . 'auth/login');
            }
        } else if ((int) $res[0] == 0) {
            $this->view->error = "user tidak ditemukan!";
            $this->view->load('admin/login');
        } else {
            $this->view->error = "database tidak valid!";
            $this->view->load('admin/login');
        }
    }

    public function logout() {
        Session::createSession();
        Session::destroySession();
        $this->view->load('admin/login');
    }

    public function __destruct() {
        parent::__destruct();
    }

}

?>
