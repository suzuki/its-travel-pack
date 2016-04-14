#!/usr/bin/env php
<?php

$fontUrl = 'https://osdn.jp/frs/chamber_redir.php?m=iij&f=%2Fusers%2F8%2F8574%2Frounded-mplus-20150529.zip';
$fontDir = dirname(__DIR__) . '/fonts/unifont/';
$fontFilename = 'rounded-mplus-20150529.zip';
$fontArchivePath = $fontDir . $fontFilename;

file_put_contents($fontArchivePath, file_get_contents($fontUrl));

$zip = new ZipArchive();

if (true === $zip->open($fontArchivePath)) {
    $zip->extractTo($fontDir);
    $zip->close();
} else {
    echo $zip->getStatusString();
}
