<?php
    require_once  __DIR__ . '/DatabaseProvider.php';
    require_once __DIR__ . '/../vendor/autoload.php';

    class Show
    {

        /**
         * Получение номера текущей страницы
         *
         * @return int
         */
        public static function GetPage(): int
        {
            return $_GET['page'] ?? 1;
        }

        /**
         * Получение всех новостей на выбранной странице
         *
         * @return false|PDOStatement
         */
        public static function GetAllNews()
        {
            if (self::GetPage() == 1) {
				$kol = 5;
				$art = 0;
			} else {
				$kol = 6;
				$art = 5 + (self::GetPage() - 2) * 6;
			}
            return DatabaseProvider::getDb()->query("SELECT * FROM news ORDER BY date DESC LIMIT $art,$kol");
        }

        /**
         * Пагинация
         *
         * @return int
         */
        public static function ShowPagination(): int
        {
            $rows = DatabaseProvider::getDb()->query("SELECT COUNT(*) FROM news")->fetch();
            return (int)ceil(($rows[0] - 5) / 6) + 1;
        }

        /**
         * Показ выбранной новости
         *
         * @param int $id
         * @return mixed
         */
        public static function ShowNew(int $id)
        {
            $stmt = DatabaseProvider::getDb()->query("SELECT * FROM news WHERE id=$id");
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }