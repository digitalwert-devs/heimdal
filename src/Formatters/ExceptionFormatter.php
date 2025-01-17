<?php

namespace DigitalwertDevs\Heimdal\Formatters;

use Throwable;
use Illuminate\Http\JsonResponse;
use DigitalwertDevs\Heimdal\Formatters\BaseFormatter;

class ExceptionFormatter extends BaseFormatter
{
    public function format(JsonResponse $response, Throwable $e, array $reporterResponses)
    {
        $response->setStatusCode(500);
        $data = $response->getData(true);

        if ($this->debug) {
            $data = array_merge($data, [
                'code'   => $e->getCode(),
                'message'   => $e->getMessage(),
                'exception' => (string) $e,
                'line'   => $e->getLine(),
                'file'   => $e->getFile()
            ]);
        } else {
            $data['message'] = $this->config['server_error_production'];
        }

        $response->setData($data);
    }
}
