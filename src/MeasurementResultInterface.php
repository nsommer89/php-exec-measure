<?php

namespace Nsommer89\PhpExecMeasure;

/**
 * Interface MeasurementResultInterface
 * @package Nsommer89\PhpExecMeasure
 */
interface MeasurementResultInterface
{
    /**
     * MeasurementResult constructor.
     * @param float $duration
     */
    public function __construct(float $duration);

    /**
     * Set the exception
     * @param \Throwable $exception
     * @return void
     */
    public function setException(\Throwable $exception): void;

    /**
     * Get the exception if present
     * @return \Throwable|null
     */
    public function getException(): ?\Throwable;

    /**
     * Get the start time of the measurement in unix time
     * @return int
     */
    public function getStartUnixtime(): int;

    /**
     * Set the start time of the measurement in unix time
     * @return void
     */
    public function setStartUnixtime(int $startUnixtime): void;

    /**
     * Get the end time of the measurement in unix time
     * @return int
     */
    public function getEndUnixtime(): int;

    /**
     * Set the end time of the measurement in unix time
     * @return void
     */
    public function setEndUnixtime(int $endUnixtime): void;

    /**
     * Get the captured duration
     * @return float
     */
    public function getDuration(): float;

    /**
     * Get the duration of the execution in milliseconds
     * @return float
     */
    public function milliseconds(): float;

    /**
     * Get the duration of the execution in microseconds
     * @return float
     */
    public function microseconds(): float;

    /**
     * Get the duration of the execution in seconds
     * @return float
     */
    public function seconds(): float;

    /**
     * Get the result as array
     * @return array
     */
    public function toArray(): array;

    /**
     * Get the result as json
     * @return float
     */
    public function toJson(): string;

    /**
     * Get the result as string
     * @return float
     */
    public function __toString(): string;
}