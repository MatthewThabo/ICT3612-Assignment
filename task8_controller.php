<?php
    Class Controller {
        private $db;
        public function __construct(Model $db) {
            $this->db = $db;
        }

        public function index()
        {
            if (isset($_POST['register']))
            {
                $id =  filter_input(INPUT_POST, 'id_number', FILTER_SANITIZE_SPECIAL_CHARS);
                $name =  filter_input(INPUT_POST, 'full_name', FILTER_SANITIZE_SPECIAL_CHARS);
               $center = filter_input(INPUT_POST, 'area_center', FILTER_SANITIZE_SPECIAL_CHARS);
                echo $this->db->register($id, $name, $center);
            } elseif (isset($_POST['check'])) {
                $id =  filter_input(INPUT_POST, 'id_number', FILTER_SANITIZE_SPECIAL_CHARS);
                $code = substr($id, 10);
                echo $this->db->checking($code);
            } elseif (isset($_POST['update'])) {
                $id =  filter_input(INPUT_POST, 'id_number', FILTER_SANITIZE_SPECIAL_CHARS);
                echo $this->db->updateBeneficiary($id);
            } elseif (isset($_POST['delete'])) {
                $id =  filter_input(INPUT_POST, 'id_number', FILTER_SANITIZE_SPECIAL_CHARS);
                echo $this->db->deleteBeneficiary($id);
            }
            require "task8_view.php";
        }
    }
?>