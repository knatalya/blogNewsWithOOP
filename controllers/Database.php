<?php
    require_once __DIR__ . '/../vendor/autoload.php';
    require_once __DIR__ . '/DatabaseProvider.php';

    class Database
    {

        /**
         * Добавление новости
         *
         * @param string $date
         * @param string $name
         * @param string $new
         * @param string $announcement
         * @return void
         */
        public function addNews(string $date, string $name, string $new, string $announcement): void
        {
            $data = array( 'date' => $date, 'name' => $name, 'new' => $new, 'announcement' => $announcement);
            $query = DatabaseProvider::getDb()->prepare("INSERT INTO news (date, name, new, announcement) values (:date, :name, :new, :announcement)");
            $query->execute($data);
        }

        /**
         * Редактирование новости
         *
         * @param int $id
         * @param string $name
         * @param string $new
         * @param string $announcement
         * @return void
         */
        public function editNews(int $id, string $name, string $new, string $announcement): void
        {
            $data = array( 'id' => $id, 'name' => $name, 'new' => $new, 'announcement' => $announcement);
            $stmt = DatabaseProvider::getDb()->prepare("UPDATE news SET name = :name, new = :new, announcement = :announcement  WHERE id = :id");
            $stmt->execute($data);
        }

        /**
         * Удаление новости
         *
         * @param int $id
         * @return void
         */
        public function deleteNews(int $id): void
        {
            $stmt = DatabaseProvider::getDb()->prepare("DELETE FROM news WHERE id = :id");
            $stmt->bindValue(":id", $id);
            $stmt->execute();
        }
    }