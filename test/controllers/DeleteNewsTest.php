<?php

    use PHPUnit\Framework\TestCase;

    require_once './controllers/DeleteNews.php';
    require_once './vendor/autoload.php';


    class DeleteNewsTest extends TestCase
    {

        /**
         * @return void
         */
        public function testEditNewsMock()
        {
            $mock = $this->createMock(DeleteNews::class);
            $mock->expects($this->once())->method('execute');
            $mock->execute();
        }


        /**
         * @return void
         */
        public function testDeleteNewsMockReturn()
        {
            $object = $this->createMock(DeleteNews::class);
            $this->assertNull($object->execute());
        }
    }