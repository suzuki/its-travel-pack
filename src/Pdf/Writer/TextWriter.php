<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

class TextWriter implements FpdiInterface, WriterInterface
{
    use WriterTrait;

    public function __construct(array $settings, FPDI $fpdi)
    {
        $this->setX($settings['x']);
        $this->setY($settings['y']);
        $this->setValue($settings['value']);
        $this->setFpdi($fpdi);
    }

    public function write()
    {
        $this->fpdi->setXY($this->getX(), $this->getY());
        $this->fpdi->write(0, $this->getValue());
    }
}
