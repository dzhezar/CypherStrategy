<?php

/*
 * This file is part of the "CypherService" package.
 *
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App;

class CypherService
{
    private $strategy;

    public function __construct(string $strategy)
    {
        switch ($strategy) {
            case 'Caesar':
                $this->strategy = new CaesarStrategy();
                break;
            case 'Xor':
                $this->strategy = new XorStrategy();
                break;
            default:
                echo 'No such Strategy' . \PHP_EOL;
        }
    }

    public function encrype()
    {
        return $this->strategy->encrype();
    }

    public function decrype()
    {
        $this->strategy->decrype();
    }
}
