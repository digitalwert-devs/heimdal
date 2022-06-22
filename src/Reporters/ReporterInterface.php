<?php

namespace DigitalwertDevs\Heimdal\Reporters;

use Throwable;

interface ReporterInterface
{
    public function report(Throwable $e);
}
