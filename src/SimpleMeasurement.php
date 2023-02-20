<?php

namespace Nsommer89\PhpExecMeasure;

class SimpleMeasurement extends Measurement
{
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    public function fn(callable $fn) : MeasurementResultInterface
    {
        return parent::fn($fn);
    }

    public function start(): void
    {
        parent::start();
    }

    public function end(): void
    {
        parent::end();
    }
}