<?php

namespace Its;

use Its\Config;
use Its\Pdf\PdfWriter;
use fpdi\FPDI;

class TravelPack
{
    const KEY_EMBED_SETTINGS = 'embed_settings';

    protected $config;
    protected $pdfWriter;
    protected $travelPackPdf;
    protected $fpdi;
    protected $exportDir;
    protected $itsPdfUrl;
    protected $itsPdfFilename;

    public function __construct()
    {
        $dataPath = dirname(__DIR__) . '/config/data.yml';
        $this->config = new Config($dataPath);

        $pdfPath = dirname(__DIR__) . '/pdf';
        $this->travelPackPdf = $pdfPath . '/import/' . $this->config->get('pdf_filename');
        $this->exportDir = $pdfPath . '/export/';
    }

    public function reserve()
    {
        $this->fetchTravelPackPdf();
        $this->initializeFpdf();
        $this->render();
        $this->export();
    }

    public function fetchTravelPackPdf()
    {
        if (!file_exists($this->travelPackPdf)) {
            file_put_contents($this->travelPackPdf, file_get_contents($this->config->get('pdf_url')));
        }
    }

    public function initializeFpdf()
    {
        define('FPDF_FONTPATH', dirname(__DIR__) . '/fonts');

        $this->fpdi = new FPDI();
        $this->fpdi->setSourceFile($this->travelPackPdf);
        $templateIndex = $this->fpdi->importPage(3, '/MediaBox');

        $this->fpdi->addPage();
        $this->fpdi->useTemplate($templateIndex, 0, 0);

        $this->fpdi->addFont('mplus', '', 'rounded-mplus-2c-regular.ttf', true);
        $this->fpdi->setFont('mplus', '', '10');
    }

    public function render()
    {
        $pdfWriter = new PdfWriter($this->fpdi);

        $embed_settings = $this->config->get(self::KEY_EMBED_SETTINGS);
        $data = $this->config->get('data');
        foreach ($embed_settings as $index => $setting) {
            // TODO: move this process to Config.php
            if (isset($data[$index])) {
                $setting['value'] = $data[$index];
            }

            $writer = $pdfWriter->writerFactory($setting);
            $writer->write();
        }
    }

    public function export($filename = null)
    {
        $filename = $filename ?: $this->config->get('export_filename');
        $this->fpdi->output($this->exportDir . basename($filename));
    }

    public function send()
    {
        // not implement yet
    }
}