<?php

namespace Nsommer89\PhpExecMeasure;

/**
 * Class Measurement
 * @package Nsommer89\PhpExecMeasure
 */
abstract class Measurement implements MeasurementInterface
{
    /**
     * The start time of the measurement
     * @var float
     */
    private float $start = 0;

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
     * The end time of the measurement
     * @var float
     */
    private float $end = 0;

    /**
     * The options of the measurement
     * @var array
     */
    private array $options = [];

    /**
     * The default options of the measurement
     * @var array
     */
    private array $_defaults = [];

    /**
     * The result of the measurement
     * @var MeasurementResultInterface
     */
    private MeasurementResultInterface $result;
    
    /**
     * Measurement constructor.
     * @param array $options
     */
    public function __construct(array $options = [])
    {
        $this->options = array_merge($this->_defaults, $options);
    }

    /**
     * Recieve a callback of code to be measured
     * @param callable $fn
     * @return MeasurementResultInterface
     */
    public function fn(callable $fn) : MeasurementResultInterface {
        try {
            $this->start();
            $fn([
                'start' => $this->getStart(),
                'start_unix_time' => $this->getStartUnixtime(),
            ]);
            $this->end();
            $result = new MeasurementResult($this->getDuration());
            $result->setStart($this->getStart());
            $result->setEnd($this->getEnd());
            $result->setStartUnixtime($this->getStartUnixtime());
            $result->setEndUnixtime($this->getEndUnixtime());
        } catch (\Exception $e) {
            throw $e;
        }
        $this->setResult($result);
        return $result;
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
     * Start the measurement
     * @return void
     */
    public function start() : void
    {
        $this->start = microtime(true);
        $this->setStartUnixtime(time());
    }

    /**
     * End the measurement
     * @return void
     */
    public function end() : void
    {
        $this->end = microtime(true);
        $this->setEndUnixtime(time());
    }

    /**
     * Get the duration of the measurement
     * @return float
     */
    public function getDuration() : float
    {
        return $this->end - $this->start;
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
     * Get the end time of the measurement
     * @return float
     */
    public function getEnd() : float {
        return $this->end;
    }

    /**
     * Set the result of the measurement
     * @param MeasurementResultInterface $result
     * @return void
     */
    public function setResult(MeasurementResultInterface $result) : void
    {
        $this->result = $result;
    }

    /**
     * Get the result of the measurement
     * @return MeasurementResultInterface
     */
    public function getResult() : MeasurementResultInterface
    {
        if (isset($this->result) && null !== $this->result->getException()) {
            if ($this->result->getException() instanceof \Exception) {
                throw $this->result->getException();
            }
        }
        return $this->result;
    }
}