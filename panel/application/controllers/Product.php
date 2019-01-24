<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "product_v";
        $this->load->model("product_model");
    }

    public function index(){

        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->product_model->get_all();

        /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items         = $items;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function new_form(){

        $viewData = new stdClass();

        /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function save(){
        $this->load->library("form_validation");

        // kurallar yazılır
        $this->form_validation->set_rules("title","Başlık","required|trim");

        $this->form_validation->set_message(
            array(
                "required" => "<strong>{field}</strong> alanı boş bırakılamaz"
            )
        );

        // form_validation çalıştırılır
        $validate = $this->form_validation->run();

        if($validate){
            // başarılı ise
            //kayıt işlemi başlar

            echo "Kayıt işlemleri başalar";
        }else{
            // başarısız ise
            // Hata ekranına yönlendirilir
            echo validation_errors();
        }







    }

}