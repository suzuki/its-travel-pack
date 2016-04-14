<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

class TextSeparatedHyphenWriter implements WriterInterface
{
    protected $writers = [];

    public function __construct(array $settings, FPDI $fpdi)
    {
        $date = $settings['value'];
        $splittedValues = $this->split($date);

        $positions = $settings['positions'];
        for ($i = 0; $i < count($positions); ++$i) {
            if (isset($splittedValues[$i])) {
                $positions[$i]['value'] = $splittedValues[$i];
            } else {
                $positions[$i]['value'] = null;
            }
            $this->writers[] = new TextWriter($positions[$i], $fpdi);
        }
    }

    public function write()
    {
        foreach ($this->writers as $writer) {
            $writer->write();
        }
    }

    /**
     * @param string|null $str
     * @return array
     */
    protected function split($str)
    {
        if ($str === null) {
            return [];
        }

        return explode('-', $str);
    }
}
