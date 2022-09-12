<?php
    require_once  __DIR__ . '/Database.php';
    require_once __DIR__ . '/../vendor/autoload.php';

    class AddNews
    {
        private $db;

        public function __construct()
        {
            $this->db = new Database();
        }

        /**
         * Добавление новости
         *
         * @return void
         */
        public function execute(): void
        {
            if(isset($_POST['name'])
                && isset($_POST['new'])
                && isset($_POST['announcement'])
                && $_POST['name'] != ""
                && $_POST['new'] != ""
                && strlen($_POST['name']) <= 50
                && $_POST['announcement'] <= 750
                && $_POST['announcement'] != "")
            {
                $this->db->addNews(date("Y-m-d H:i:s"), $_POST['name'], $_POST['new'],  $_POST['announcement']);
                header('Location: /index.php#close ');
            } else {
                header('Location: /index.php#openModal ');
            }
        }
    }