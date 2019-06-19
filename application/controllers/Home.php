<?php
require_once(APPPATH . 'controllers/K_main_controller.php');
/**
 * @property Edit_model $edit_model
 */
class Home extends K_main_controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('edit_model');
    }
    public function index()
    {
        $id= $_SESSION['id'];
        $productData = $this->edit_model->getDataByUserId($id);
        $data = [
            'additional_css_files' => [
                'pages/home/index'
            ],
            'productData'  => $productData,
            'user_id' => $id
        ];
        $this->render($data);
    }
    public function edit($id = 0){

        $pageTitle = $id ? 'Edit' : 'Add';
         $data = [
             'additional_css_files' => [
                'pages/home/index'
            ],
            'id' => $id,
            'pageTitle' => $pageTitle

        ];
        $data['user_id'] = $_SESSION['id'];
        if($id){
            $productData = $this->edit_model->getData($id);
            $data['title'] = $productData[0]['title'];
            $data['name'] = $productData[0]['name'];
            $data['description'] = $productData[0]['description'];
        }


        if (!empty($_POST)) {
            $message = empty($_POST['id']) ? MSG_SUCCESS_CREATE : MSG_SUCCESS_UPDATE;

            if (!empty($_FILES['image']['name'])) {
                $config = [
                    'upload_path' => UPLOADS_PATH_WRITE,
                    'allowed_types' => 'png|jpg|jpeg',
                    'max_size' => 1000,
                    'max_width' => 1600,
                    'max_height' => 600,
                    'encrypt_name' => true
                ];

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $this->session->set_flashdata('msg', ['status' => 'error', 'msg' => $this->upload->display_errors()]);
                    $id? redirect('home/edit/' . $id) :redirect('home/edit/') ;
                } else {
                    $upload_data = $this->upload->data();
                    $id = $this->edit_model->save($id, $upload_data['file_name']);
                    $this->session->set_flashdata('msg', ['status' => 'success', 'msg' => $message]);
                    redirect('home/edit/' . $id);
                }
            } else {
                $id = $this->edit_model->save($id);
                $this->session->set_flashdata('msg', ['status' => 'success', 'msg' => $message]);
                redirect('home/edit/' . $id);
            }

        }

        $this->render($data);
    }

    public function delete_product($id = null)
    {
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        $this->edit_model->delete($id);
        redirect(base_url('home'));
        echo json_encode(['status' => 'success']);
        die;
    }
    public function delete_user($id){
        if($this->edit_model->deleteUser($id)){
            redirect(base_url('login/logout'));
        }
    }

}