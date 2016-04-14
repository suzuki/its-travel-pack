<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

trait WriterTrait
{
    protected $fpdi;
    protected $x;
    protected $y;
    protected $value;

    /**
     * @param fpdi/FPDI $fpdi
     */
    public function setFpdi(FPDI $fpdi)
    {
        $this->fpdi = $fpdi;
    }

    /**
     * @return fpdi/FPDI
     */
    public function getFpdi()
    {
        return $this->fpdi;
    }

    /**
     * @param int $x
     */
    public function setX($x)
    {
        $this->x = $x;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @param int $y
     */
    public function setY($y)
    {
        $this->y = $y;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * @param int $x
     * @param int $y
     */
    public function setXY($x, $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * @param string $value
     */
    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}
