<?php
/**
 * Created by PhpStorm.
 * User: ikhsan
 * Date: 21/09/16
 * Time: 13:41
 */

namespace AppBundle\Service;


use Gos\Bundle\WebSocketBundle\Periodic\PeriodicInterface;

class Synchronize implements PeriodicInterface
{

    /**
     * Function excecuted n timeout.
     */
    public function tick()
    {
        echo "Executed every 10 seconds" . PHP_EOL;
    }

    /**
     * @return int (in second)
     */
    public function getTimeout()
    {
        return 10;
    }
}