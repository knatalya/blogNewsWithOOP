<?php

    use PHPUnit\Framework\TestCase;

    require_once './controllers/DatabaseProvider.php';
    require_once './vendor/autoload.php';

    class DatabaseProviderTest extends TestCase
    {

        /**
         * @var PDO|null
         */
        private $db;

        /**
         * @return void
         */
        protected function setUp()
        {
            $this->db = DatabaseProvider::getDb();
        }

        /**
         * @return void
         */
        public function testDbPDO()
        {
           self::assertInstanceOf(PDO::class, $this->db);
        }

        /**
         * @return void
         */
        public function testDbNotEmpty()
        {
            self::assertNotEmpty($this->db);
        }
    }