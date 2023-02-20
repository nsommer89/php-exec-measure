<?php
use PHPUnit\Framework\TestCase;

class SimpleMeasurementTest extends TestCase {

    public function testCanMeasureCode() {
        $measurement = new \Nsommer89\PhpExecMeasure\SimpleMeasurement();
        $measurement->fn(function () {
            $a = 1;
            $b = 2;
            $c = $a + $b;
        });
        $result = $measurement->getResult();
        $this->assertIsFloat($result->getDuration());
    }

    public function testCanMeasureFile() {
        exec('php ' . __DIR__ . '/../bin/measure -f tests/SimpleMeasurementTest.php', $output, $return_var);

        $this->assertEquals(0, $return_var);
    }

    public function testToJson() {
        $measurement = new \Nsommer89\PhpExecMeasure\SimpleMeasurement();
        $measurement->fn(function () {
            $a = 1;
            $b = 2;
            $c = $a + $b;
        });
        $result = $measurement->getResult();
        $this->assertJson($result->toJson());
    }

    public function testToArray() {
        $measurement = new \Nsommer89\PhpExecMeasure\SimpleMeasurement();
        $measurement->fn(function () {
            $a = 1;
            $b = 2;
            $c = $a + $b;
        });
        $result = $measurement->getResult();
        $this->assertIsArray($result->toArray());
    }
}