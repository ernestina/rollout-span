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
        if ((int) $res[0] == 1) {
            Session::createSession();
            Session::set('loggedin', TRUE);
            Session::set('user', $user);
            Session::set('role', $res[1]);
            if (Session::get('role') == 1) {
                header('location:' . URL);
            } elseif (Session::get('role') == 2) {
                if (Session::get('user') == 'KPPN JAKARTA II') {
                    header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt2');
                } elseif (Session::get('user') == 'KPPN JAKARTA VI') {
                    header('location:' . URL . 'dataKppn/addDataKppnLvl3Jkt6');
                } else {
                    header('location:' . URL . 'auth/login');
                }
            } elseif (Session::get('role') == 4) {
                header('location:' . URL . 'dataBa/adddataBa');
            } elseif (Session::get('role') == 5) {
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
