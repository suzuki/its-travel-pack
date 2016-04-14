<?php

namespace Its\Pdf;

use fpdi\FPDI;

class PdfWriter
{
    protected $fpdi;

    public function __construct(FPDI $fpdi)
    {
        $this->fpdi = $fpdi;
    }

    /**
     * @param array $settings
     */
    public function writerFactory(array $settings)
    {
        if (!isset($settings['type'])) {
            throw new \LogicException('type is not found.');
        }

        $namespace = __NAMESPACE__ . '\\Writer\\';
        $className = strtr(ucwords($settings['type'], '_'), ['_' => '']) . 'Writer';
        $class = $namespace . $className;

        return new $class($settings, $this->fpdi);
    }
}
