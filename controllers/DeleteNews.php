<?php
    require_once  __DIR__ . '/Database.php';
    require_once __DIR__ . '/../vendor/autoload.php';

    class DeleteNews
    {
        private $db;

        public function __construct(){
            $this->db = new Database();
        }

        /**
         * Удаление новости
         *
         * @return void
         */
        public function execute(): void
        {
            if (isset($_GET['new'])) {
                $this->db->deleteNews($_GET['new']);
                header('Location: /index.php ');
            }
        }
    }


