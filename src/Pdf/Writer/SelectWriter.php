<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

class SelectWriter implements WriterInterface
{
    protected $writer;

    public function __construct(array $settings, FPDI $fpdi)
    {
        $value = $settings['value'];
        $data = $settings['list'][$value];

        $this->writer = new RectWriter($data, $fpdi);
    }

    public function write()
    {
        $this->writer->write();
    }
}
