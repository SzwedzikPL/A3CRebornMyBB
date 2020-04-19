<?php

namespace A3C;

class Response
{
    /**
     * Response constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param int $statusCode
     * @return Response
     */
    public function setStatus(int $statusCode)
    {
        http_response_code($statusCode);
        return $this;
    }
}
