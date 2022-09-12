<?php

    use PHPUnit\Framework\TestCase;

    require_once './controllers/AddNews.php';
    require_once './vendor/autoload.php';

    class AddNewsTest extends TestCase
    {

        /**
         * @return void
         */
        public function testEditNewsMock()
        {
            $mock = $this->createMock(AddNews::class);
            $mock->expects($this->once())->method('execute');
            $mock->execute();
        }

        /**
         * @return void
         */
        public function testEditNewsMockReturn()
        {
            $object = $this->createMock(AddNews::class);
            $this->assertNull($object->execute());
        }
    }