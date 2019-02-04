<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galleries extends CI_Controller{

    public $viewFolder = "";

    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "galleries_v";

        $this->load->model("gallery_model");
        $this->load->model("image_model");
        $this->load->model("video_model");
        $this->load->model("file_model");
    }

    public function index(){

        $viewData = new stdClass();


        /** tablodan verilerin getirilmesi */
        $items = $this->gallery_model->get_all(
            array(),"rank ASC"
        );

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
        $this->form_validation->set_rules("title","Galeri Adı","required|trim");

        //Hata mesajlarının Oluşturulması
        $this->form_validation->set_message(
            array(
                "required" => "<strong>{field}</strong> alanı boş bırakılamaz"
            )
        );

        // form_validation çalıştırılır
        $validate = $this->form_validation->run();

        if($validate){

            $gallery_type = $this->input->post("gallery_type");
            $path           = "uploads/{$this->viewFolder}/";

            if ($gallery_type == "image"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path        = $path."images/".$folder_name;

            }else if ($gallery_type == "file"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path        = $path."files/".$folder_name;

            }

            if ($gallery_type != "video"){
                if (!mkdir($path,0755)){

                    $alert = [
                        "title"    => "Bir Hata Oluştu!!!",
                        "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                        "type"     => "error"
                    ];

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }

            $insert = $this->gallery_model->add(
                array(
                    "title"        => $this->input->post("title"),
                    "gallery_type" => $this->input->post("gallery_type"),
                    "url"          => convertToSEO($this->input->post("title")),
                    "folder_name"  => $folder_name,
                    "rank"         => 0,
                    "isActive"     => 1,
                    "createdAt"    => date("Y-m-d H:i:s ")
                )
            );

            //TODO alert sistemi eklenecek
            if($insert){

                $alert = [
                    "title"    => "İşlem Başarılı",
                    "message"  => "İşleminiz Başarılı Bir Şekilde Yapıldı",
                    "type"     => "success"
                ];

            }else{

                $alert = [
                    "title"    => "Bir Hata Oluştu!!!",
                    "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                    "type"     => "error"
                ];

            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));

        }else{
            $viewData = new stdClass();

            /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "add";
            $viewData->form_error = true;

            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function update_form($id){
        $viewData = new stdClass();

        /** Tablodan verilerin getirilmesi ..*/
        $item  =  $this->gallery_model->get(
            array(
                "id" => $id
            )
        );

        /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function update($id, $gallery_type, $oldFolderName = ""){
        $this->load->library("form_validation");

        // kurallar yazılır
        $this->form_validation->set_rules("title","Galeri Adı","required|trim");


        //Hata mesajlarının Oluşturulması
        $this->form_validation->set_message(
            array(
                "required" => "<strong>{field}</strong> alanı boş bırakılamaz"
            )
        );

        // form_validation çalıştırılır
        $validate = $this->form_validation->run();

        if($validate){

            $path           = "uploads/{$this->viewFolder}/";

            if ($gallery_type == "image"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path        = $path."images";

            }else if ($gallery_type == "file"){

                $folder_name = convertToSEO($this->input->post("title"));
                $path        = $path."files";

            }

            if ($gallery_type != "video"){
                if (!rename("{$path}/{$oldFolderName}","{$path}/{$folder_name}")){

                    $alert = [
                        "title"    => "Bir Hata Oluştu!!!",
                        "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                        "type"     => "error"
                    ];

                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }


            $update = $this->gallery_model->update(
                array(
                    "id"          => $id
                ),
                array(
                    "title"       => $this->input->post("title"),
                    "folder_name" => $folder_name,
                    "url"         => convertToSEO($this->input->post("title")),
                )
            );

            if($update){
                //TODO alert sistemi eklenecek
                $alert = [
                    "title"    => "İşlem Başarılı",
                    "message"  => "İşleminiz Başarılı Bir Şekilde Yapıldı",
                    "type"     => "success"
                ];
            }else{

                $alert = [
                    "title"    => "Bir Hata Oluştu!!!",
                    "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                    "type"     => "error"
                ];

            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        }else{
            $viewData = new stdClass();


            /** Tablodan verilerin getirilmesi ..*/
            $item  =  $this->gallery_model->get(
                array(
                    "id" => $id
                )
            );

            /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;


            $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
        }
    }

    public function delete($id){

        $gallery = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );

        if ($gallery){

            if ($gallery->gallery_type != "video" ){

                if ($gallery->gallery_type == "image")
                    $path = "uploads/" . $this->viewFolder . "/images/" . $gallery->folder_name;
                if ($gallery->gallery_type == "file")
                    $path = "uploads/" . $this->viewFolder . "/files/" . $gallery->folder_name;

                if (!rmdir($path)){
                    $alert = [
                        "title"    => "Bir Hata Oluştu!!!",
                        "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                        "type"     => "error"
                    ];
                    $this->session->set_flashdata("alert", $alert);
                    redirect(base_url("galleries"));
                    die();
                }
            }

            $delete = $this->gallery_model->delete(
                array(
                    "id" => $id
                )
            );

            if($delete){
                //TODO alert sistemi eklenecek
                $alert = [
                    "title"    => "İşlem Başarılı",
                    "message"  => "İşleminiz Başarılı Bir Şekilde Yapıldı",
                    "type"     => "success"
                ];
            }else{

                $alert = [
                    "title"    => "Bir Hata Oluştu!!!",
                    "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                    "type"     => "error"
                ];

            }

            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("galleries"));
        }
    }

    public function imageDelete($id, $parent_id){
        $fileName =  $this->product_image_model->get(
            array(
                "id" => $id
            )
        );

        $delete = $this->product_image_model->delete(
            array(
                "id" => $id
            )
        );

        if($delete){
            //TODO alert sistemi eklenecek
            $alert = [
                "title"    => "İşlem Başarılı",
                "message"  => "İşleminiz Başarılı Bir Şekilde Yapıldı",
                "type"     => "success"
            ];
            unlink("uploads/{$this->viewFolder}/{$fileName->img_url}");
        }else{

            $alert = [
                "title"    => "Bir Hata Oluştu!!!",
                "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                "type"     => "error"
            ];

        }

        $this->session->set_flashdata("alert", $alert);
        redirect(base_url("galleries/image_form/{$parent_id}"));
    }

    public function isActiveSetter($id){
        if ($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->gallery_model->update(
                array(
                    "id" => $id,
                ),
                array(
                    "isActive" => $isActive,
                )
            );
        }
    }

    public function imageIsActiveSetter($id){
        if ($id){
            $isActive = ($this->input->post("data") === "true") ? 1 : 0;

            $this->product_image_model->update(
                array(
                    "id" => $id,
                ),
                array(
                    "isActive" => $isActive,
                )
            );
        }
    }

    public function isCoverSetter($id, $parend_id){
        if ($id && $parend_id){
            $isCover = ($this->input->post("data") === "true") ? 1 : 0;

            // Kapak Yapılmak istenen kayıt
            $this->product_image_model->update(
                array(
                    "id"         => $id,
                    "product_id" => $parend_id
                ),
                array(
                    "isCover" => $isCover,
                )
            );

            //kapak yapılmayan diğer kayıtlar
            $this->product_image_model->update(
                array(
                    "id !="      => $id,
                    "product_id" => $parend_id
                ),
                array(
                    "isCover" => 0,
                )
            );

            $viewData = new stdClass();

            /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
            $viewData->viewFolder    = $this->viewFolder;
            $viewData->subViewFolder = "image";

            $viewData->item_images = $this->product_image_model->get_all(
                array(
                    "product_id" => $parend_id
                ),"rank ASC"
            );

            $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
            echo $render_html;

        }
    }

    public function rankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order['ord'];

        foreach ($items as $rank => $id ){
            $update = $this->gallery_model->update(
                array(
                    "id"      => $id,
                    "rank !=" =>  $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

    public function imageRankSetter(){
        $data = $this->input->post("data");
        parse_str($data, $order);
        $items = $order['ord'];

        foreach ($items as $rank => $id ){
            $update = $this->product_image_model->update(
                array(
                    "id"      => $id,
                    "rank !=" => $rank
                ),
                array(
                    "rank" => $rank
                )
            );
        }
    }

    public function image_form($id){
        $viewData = new stdClass();

        /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item = $this->gallery_model->get(
            array(
                "id" => $id
            )
        );

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function image_update($id){
        $file_name = convertToSEO(pathinfo($_FILES['file']['name'], PATHINFO_FILENAME)) . "." . pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        $config["allowed_types"] = "jpg|jpeg|png";
        $config["upload_path"]   = "uploads/{$this->viewFolder}/";
        $config["file_name"]     = $file_name;

        $this->load->library("upload", $config);

        $upload = $this->upload->do_upload("file");

        if($upload){
            $uploaded_file = $this->upload->data("file_name");

            $this->product_image_model->add(
                array(
                    "product_id" => $id,
                    "img_url" => $uploaded_file,
                    "rank" => 0,
                    "isActive" => 1,
                    "createdAt" => date("Y-m-d H:i:s")
                )
            );

        }else{
            $alert = [
                "title"    => "Bir Hata Oluştu!!!",
                "message"  => "İşleminiz Tamamlanamadı Lütfen Tekrar Deneyiniz",
                "type"     => "error"
            ];
            echo "üzgünün lütfen tekrar dene";
        }
    }

    public function refresh_image_list($id){
        $viewData = new stdClass();

        /** View'e Gönderilecek değişkenlerin set edilmesi ..*/
        $viewData->viewFolder    = $this->viewFolder;
        $viewData->subViewFolder = "image";

        $viewData->item_images = $this->product_image_model->get_all(
            array(
                "product_id" => $id
            ),"rank ASC"
        );

        $render_html = $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_elements/image_list_v", $viewData, true);
        echo $render_html;
    }

}