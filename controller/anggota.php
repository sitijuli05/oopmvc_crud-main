<?php

class Anggota {
    protected $model = '';

    public function __construct($model){
        $this->model=$model;
    }
    public function index(){
        $anggota = $this->model->getAnggota();
        require 'view/anggota/list.php';
    }
    public function detail($id){
        $anggota = $this->model->getAnggotabyId($id);
        require 'view/anggota/detail.php';
    }

    public function create(){
        if ($_POST) {
            $this->model->insert();
            header("location:http://localhost/oopmvc/index.php/anggota");
        } 
        else
        {
            require "view/anggota/input.php"; // ke form input anggota
        }
    }

    public function edit($id){
        if ($_POST) {
            $this->model->update($id);
            header("location:http://localhost/oopmvc/index.php/anggota");
        } else {
            $anggota = $this->model->getAnggotabyId($id);
            require "view/anggota/input.php";
        }
    }

    public function delete($id){
        if ($id) {
            $this->model->delete($id);
            header("location:http://localhost/oopmvc/index.php/anggota");
        }
    }
}
