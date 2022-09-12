<?php

    use PHPUnit\Framework\TestCase;

    require_once './controllers/EditNews.php';
    require_once './vendor/autoload.php';

    class EditNewsTest extends TestCase
    {

        /**
         * @return void
         */
        public function testEditNewsMock()
        {
            $mock = $this->createMock(EditNews::class);
            $mock->expects($this->once())->method('execute');
            $mock->execute();
        }

        /**
         * @return void
         */
        public function testEditNewsMockReturn()
        {
            $object = $this->createMock(EditNews::class);
            $this->assertNull($object->execute());
        }
    }