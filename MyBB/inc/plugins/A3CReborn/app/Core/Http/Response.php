<?php

namespace A3C\Core\Http;

class Response
{
    /**
     * @var
     */
    protected $content;

    /**
     * Response constructor.
     */
    public function __construct()
    {

    }

    /**
     * @param $content
     * @return Response
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
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

    /**
     * @return string
     */
    public function __toString()
    {
        return (string)$this->content;
    }
}
