<?php

namespace Its\Pdf\Writer;

use fpdi\FPDI;

interface WriterInterface
{
    /**
     * Call FPDI::write()
     */
    public function write();
}
