<?php
namespace Its\Pdf\Writer;

use fpdi\FPDI;

interface FpdiInterface
{
    /**
     * @param FPDI $fpdi
     */
    public function setFpdi(FPDI $fpdi);

    /**
     * @return FPDI
     */
    public function getFpdi();

    /**
     * @param string
     */
    public function setValue($value);

    /**
     * @return string
     */
    public function getValue();

    /**
     * @param int $x
     */
    public function setX($x);

    /**
     * @return int
     */
    public function getX();

    /**
     * @param int $y
     */
    public function setY($y);

    /**
     * @return int
     */
    public function getY();

    /**
     * @param int $x
     * @param int $y
     */
    public function setXY($x, $y);
}
