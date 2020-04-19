<?php

namespace A3C;

use MyBB;

class Application
{
    /**
     * Resolve route
     * Create controller object
     * Run controller method
     * Request and required classes are passed to controller method
     * Return Response
     */

    /**
     * @var
     */
    private MyBB $mybb;

    /**
     * Application constructor.
     * @param $mybb
     */
    public function __construct(MyBB $mybb)
    {
        $this->mybb = $mybb;
    }

    /**
     * @return Response
     */
    public function dispatchRequest(): Response
    {
        return new Response();
    }
}
