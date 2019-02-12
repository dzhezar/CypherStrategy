<?php

/*
 * This file is part of the "CypherService" package.
 *
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

require_once 'vendor/autoload.php';
require_once 'src/console_helper.php';

use App\CypherService;

writeln('Begin Testing');
$strategyContext1 = new CypherService('Xor');
$strategyContext2 = new CypherService('Caesar');

writeln('test 1 - XOR');
writeln($strategyContext1->encrype());
$strategyContext1->decrype();
writeln('');
writeln('test 2 - Caesar');
writeln($strategyContext2->encrype());
$strategyContext2->decrype();
