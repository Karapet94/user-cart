<?php
abstract class K_main_controller extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->checkIsLoggedIn();
    }

    protected function render($data = [])
    {
        $controllerName = $this->router->fetch_class();
        $actionName = $this->router->fetch_method();
        $data['actionName'] = $actionName;
        $pageContent = $this->load->view(strtolower($controllerName) . '/' . strtolower($actionName), $data, true);
        $additionalJsFiles = (array_key_exists('additional_js_files', $data)) ? $data['additional_js_files'] : [];
        $additionalCssFiles = (array_key_exists('additional_css_files', $data)) ? $data['additional_css_files'] : [];
        $flMsg = $this->session->flashdata('msg');
        $flashMessage = !empty($flMsg) ? $flMsg : [];
        $this->load->view(strtolower($controllerName) . '/' .'layout.php', [
            'pageContent' => $pageContent,
            'additionalJsFiles' => $additionalJsFiles,
            'additionalCssFiles' => $additionalCssFiles,
            'flashMessage' => json_encode($flashMessage),
        ]);
    }

    protected function checkIsLoggedIn()
    {
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('login');
        }
    }
}