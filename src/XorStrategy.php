<?php

/*
 * This file is part of the "CypherService" package.
 *
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App;

class XorStrategy implements EncryptionStrategyInterface
{
    public function encrype(): string
    {
        $string = 'Я, Кадиров Джезар Серверович, студент групи 342.';
        echo 'Введите ключ:';
        $key = \readline();
        $result = $string ^ \str_pad('', \strlen($string), $key);
        $cypher = \bin2hex($result);
        echo $cypher;
        \file_put_contents('data/cypher2', $cypher);

        return $cypher;
    }

    public function decrype()
    {
        $text = \file_get_contents('data/cypher2');
        $result = \pack('H*', $text);
        echo 'Введите ключ:';
        $key = \readline();
        $string = $result ^ \str_pad('', \strlen($result), $key);
        \file_put_contents('data/open2', $string);
        echo $string;
    }
}
