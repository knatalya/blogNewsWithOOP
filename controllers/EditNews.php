<?php
    require_once  __DIR__ . '/Database.php';
    require_once __DIR__ . '/../vendor/autoload.php';

    class EditNews
    {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        /**
         * Редактирование новости
         *
         * @return void
         */
        public function execute(): void
        {
            if (isset($_POST['id'])
                && $_POST['name'] != ""
                && strlen($_POST['name']) <= 50
                && $_POST['new'] != ""
                && $_POST['announcement'] != "")
            {
                $this->db->editNews($_POST["id"], $_POST['name'], $_POST['new'], $_POST['announcement']);
                header('Location: /news.php?new='.$_POST["id"]);
            } else {
                header('Location: /news.php?new='.$_POST["id"].'#openModal');
            }
        }
    }