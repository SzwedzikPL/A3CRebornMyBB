<?php

namespace A3C\Core\Http;

class JsonResponse extends Response
{
    /**
     * @return false|mixed|string
     */
    public function __toString()
    {
        header("Content-type: application/json; charset=utf-8");
        return json_encode($this->content);
    }
}
