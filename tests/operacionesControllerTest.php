<?php
use App\Controllers\OperacionesController;
use PHPUnit\Framework\TestCase;

class OperacionesControllerTest extends TestCase
{
    public function test_suma_de_los_numeros()
    {
        $obj = new OperacionesController();
        $expected = 11;
        $actual = $obj->suma(5, 6);
        $this->assertEquals($expected, $actual);
    }
}