<?php

namespace Nsommer89\PhpExecMeasure;

/**
 * Class MeasurementResult
 * @package Nsommer89\PhpExecMeasure
 */
class MeasurementResult implements MeasurementResultInterface
{
    /**
     * The start time of the measurement in unix time
     */
    private float $start;

    /**
     * The end time of the measurement in unix time
     */
    private float $end;

    /**
     * The start time of the measurement in unix time
     * @var int
     */
    private int $startUnixtime = 0;

    /**
     * The end time of the measurement in unix time
     * @var int
     */
    private int $endUnixtime = 0;

    /**
     * The captured duration
     * @var float
     */
    private float $duration;

    /**
     * The exception that was thrown
     * @var \Throwable|null
     */
    private ?\Throwable $exception = null;

    /**
     * MeasurementResult constructor.
     * @param float $duration
     */
    public function __construct(float $duration)
    {
        $this->duration = $duration;
    }

    /**
     * Get the start time of the measurement
     * @return float
     */
    public function getStart() : float
    {
        return $this->start;
    }

    /**
     * Set the start time of the measurement
     * @param float $start
     * @return void
     */
    public function setStart(float $start) : void
    {
        $this->start = $start;
    }

    /**
     * Get the end time of the measurement
     * @return float
     */
    public function getEnd() : float
    {
        return $this->end;
    }

    /**
     * Set the end time of the measurement
     * @param float $end
     * @return void
     */
    public function setEnd(float $end) : void
    {
        $this->end = $end;
    }

    /**
     * Set the exception
     * @param \Throwable $exception
     * @return void
     */
    public function setException(\Throwable $exception) : void
    {
        $this->exception = $exception;
    }

    /**
     * Get the exception
     * @return \Throwable|null
     */
    public function getException() : ?\Throwable
    {
        return $this->exception;
    }

    /**
     * Get the captured duration
     * @return float
     */
    public function getDuration() : float
    {
        return $this->duration;
    }

    /**
     * Set the duration
     * @param float $duration
     * @return void
     */
    public function setDuration(float $duration) : void
    {
        $this->duration = $duration;
    }

    /**
     * Get the start time of the measurement in unix time
     * @return int
     */
    public function getStartUnixtime() : int
    {
        return $this->startUnixtime;
    }

    /**
     * Set the start time of the measurement in unix time
     * @param int $startUnixtime
     * @return void
     */
    public function setStartUnixtime(int $startUnixtime) : void
    {
        $this->startUnixtime = $startUnixtime;
    }

    /**
     * Get the end time of the measurement in unix time
     * @return int
     */
    public function getEndUnixtime() : int
    {
        return $this->endUnixtime;
    }

    /**
     * Set the end time of the measurement in unix time
     * @param int $endUnixtime
     * @return void
     */
    public function setEndUnixtime(int $endUnixtime) : void
    {
        $this->endUnixtime = $endUnixtime;
    }

    /**
     * Get the duration of the execution in milliseconds
     * @return float
     */
    public function milliseconds() : float
    {
        return $this->duration * 1000;
    }

    /**
     * Get the duration of the execution in microseconds
     * @return float
     */
    public function microseconds() : float
    {
        return $this->duration * 1000000;
    }

    /**
     * Get the duration of the execution in seconds
     * @return float
     */
    public function seconds(): float
    {
        return $this->duration;
    }

    /**
     * Get the duration of the execution as an array
     * @return array
     */
    public function toArray() : array
    {
        return [
            'milliseconds'   => $this->milliseconds(),
            'microseconds'   => $this->microseconds(),
            'seconds'        => $this->seconds(),
            'start'          => $this->getStart(),
            'end'            => $this->getEnd(),
            'start_unixtime' => $this->getStartUnixtime(),
            'end_unixtime'   => $this->getEndUnixtime(),
        ];
    }

    /**
     * Get the result of the execution as a json string
     * @return string
     */
    public function toJson() : string
    {
        return json_encode($this->toArray());
    }

    /**
     * Get the result of the execution as a string
     * @return string
     */
    public function __toString() : string
    {
        return $this->toJson();
    }
}