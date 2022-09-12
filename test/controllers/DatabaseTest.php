<?php

    use PHPUnit\Framework\TestCase;

    require_once './controllers/DatabaseProvider.php';
    require_once './controllers/DeleteNews.php';
    require_once './controllers/Database.php';
    require_once './vendor/autoload.php';

    class DatabaseTest extends TestCase
    {
        /**
         * @return void
         */
        public function testDatabaseAddMock()
        {
            $mock = $this->createMock(Database::class);
            $mock->expects($this->once())->method('addNews');
            $mock->addNews('22.12.2022 14:12', 'Arerwer', 'dsfsdfsdf', 'werwerwer');
        }

        /**
         * @return void
         */
        public function testDatabaseEditMock()
        {
            $mock = $this->createMock(Database::class);
            $mock->expects($this->once())->method('editNews');
            $mock->editNews(11, 'Asdasd', 'sdfsdfsdfsdf', 'sdfsdfsdfsdf');
        }

        /**
         * @return void
         */
        public function testDatabaseDeleteMock()
        {
            $mock = $this->createMock(Database::class);
            $mock->expects($this->once())->method('deleteNews');
            $mock->deleteNews(10);
        }
    }