<?php
    use PHPUnit\Framework\TestCase;

    require_once './controllers/Show.php';
    require_once './vendor/autoload.php';

    class ShowTest extends TestCase
    {

        /**
         * @var int
         */
        private $getPage;

        /**
         * @var float|int
         */
        private $ShowPagination;

        /**
         * @var false|PDOStatement
         */
        private $GetAllNews;

        /**
         * @return void
         */
        protected function setUp()
        {
            $this->getPage = Show::GetPage();
            $this->ShowPagination = Show::ShowPagination();
            $this->GetAllNews = Show::GetAllNews();
        }

        /**
         * @return void
         */
        public function testGetPageInt() {
            self::assertIsInt($this->getPage);
        }

        /**
         * @return void
         */
        public function testGetPageNotEmpty() {
            self::assertNotEmpty($this->getPage);
        }

        /**
         * @return void
         */
        public function testGetPageEquals() {
            if (isset($_GET['page'])) {
                self::assertEquals($_GET['page'], $this->getPage);
            } else
            {
                self::assertEquals(1, $this->getPage);
            }
        }

        /**
         * @return void
         */
        public function testShowPaginationInt() {
            self::assertIsInt($this->ShowPagination);
        }

        /**
         * @return void
         */
        public function testShowPaginationGreater() {
            self::assertGreaterThan(0, $this->ShowPagination);
        }

        /**
         * @return void
         */
        public function testShowPaginationNotEmpty() {
            self::assertNotEmpty($this->ShowPagination);
        }

        /**
         * @return void
         */
        public function testGetAllNewsNotEmpty()
        {
            self::assertNotEmpty($this->GetAllNews);
        }
    }