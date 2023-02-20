<?php

namespace Nsommer89\PhpExecMeasure;

/**
 * Class Measurement
 * @package Nsommer89\PhpExecMeasure
 */
interface MeasurementInterface
{
    /**
     * Measurement constructor.
     * @param array $options
     */
    public function __construct(array $options = []);

    /**
     * Start the measurement
     * @return void
     */
    public function start() : void;

    /**
     * End the measurement
     * @return void
     */
    public function end() : void;

    /**
     * Get the start time of the measurement in unix time
     * @return float
     */
    public function getStartUnixtime() : int;

    /**
     * Set the start time of the measurement in unix time
     * @param int $startUnixtime
     * @return void
     */
    public function setStartUnixtime(int $startUnixtime) : void;

    /**
     * Get the end time of the measurement in unix time
     * @return int
     */
    public function getEndUnixtime() : int;

    /**
     * Set the end time of the measurement in unix time
     * @param int $endUnixtime
     * @return void
     */
    public function setEndUnixtime(int $endUnixtime) : void;

    /**
     * Get the duration of the measurement
     * @return float
     */
    public function getDuration() : float;

    /**
     * Get the start time of the measurement
     * @return MeasurementResultInterface
     */
    public function fn(callable $fn) : MeasurementResultInterface;

    /**
     * Get the start time of the measurement
     * @return void
     */
    public function setResult(MeasurementResultInterface $result) : void;

    /**
     * Get the start time of the measurement
     * @return MeasurementResultInterface
     */
    public function getResult() : MeasurementResultInterface;
}