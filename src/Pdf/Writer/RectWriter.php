<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

class RectWriter implements WriterInterface, FpdiInterface
{
    use WriterTrait;

    protected $width;
    protected $height;

    public function __construct(array $settings, FPDI $fpdi)
    {
        $this->setFpdi($fpdi);
        $this->setX($settings['x']);
        $this->setY($settings['y']);
        $this->setWidth($settings['width']);
        $this->setHeight($settings['height']);
    }

    /**
     * @param int $width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return int
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param int $height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getHeight()
    {
        return $this->height;
    }

    public function write()
    {
        $this->fpdi->rect($this->getX(), $this->getY(), $this->getWidth(), $this->getHeight());
    }
}
