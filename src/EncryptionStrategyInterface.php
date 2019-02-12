<?php

/*
 * This file is part of the "CypherService" package.
 *
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App;

interface EncryptionStrategyInterface
{
    public function encrype(): string ;
    public function decrype();
}
