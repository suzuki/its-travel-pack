#!/usr/bin/env php
<?php

require_once './vendor/autoload.php';

use Its\TravelPack;

$travelPack = new TravelPack();
$travelPack->reserve();
