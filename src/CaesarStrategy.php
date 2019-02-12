<?php

/*
 * This file is part of the "CypherService" package.
 *
 * (c) Dzhezar Kadyrov <dzhezik@gmail.com>
 */

namespace App;

class CaesarStrategy implements EncryptionStrategyInterface
{
    public function encrype(): string
    {
        $alph = 'АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ’ _.,0123456789' . \mb_strtolower('АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ');
        echo $alph . \PHP_EOL;

        echo 'Введите текст:';
        $text = \readline();

        echo 'Введите ключ:';
        $key = \readline();

        $arr_alph = \preg_split('//u', $alph, -1, \PREG_SPLIT_NO_EMPTY);
        $arr_text = \preg_split('//u', $text, -1, \PREG_SPLIT_NO_EMPTY);
        $count_alph = \count($arr_alph);
        $result = '';

        foreach ($arr_text as $letter) {
            $m = \array_search($letter, $arr_alph);

            if (false == $m) {
                $result .= $letter;
            } else {
                if ($m+$key<$count_alph) {
                    $new_letter = $arr_alph[$m + $key];
                } else {
                    $counter = 0;

                    while (isset($arr_alph[$m + $counter])) {
                        $counter++;
                        $start = $key - $counter;
                        $new_letter = $arr_alph[$start];
                    }
                }
                $result .= $new_letter;
            }
        }
        echo 'Закодированный шифр: ' . $result . \PHP_EOL;
        \file_put_contents('data/cypher1', $result);

        return $result;
    }

    public function decrype()
    {
        $text = \file_get_contents('data/cypher1');
        $alph = 'АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ’ _.,0123456789' . \mb_strtolower('АБВГҐДЕЄЖЗИІЇЙКЛМНОПРСТУФХЦЧШЩЬЮЯ');
        $arr_alph = \preg_split('//u', $alph, -1, \PREG_SPLIT_NO_EMPTY);
        $arr_text = \preg_split('//u', $text, -1, \PREG_SPLIT_NO_EMPTY);
        $count_alph = \count($arr_alph);

        echo $alph . \PHP_EOL;

        for ($key = 0; $key < $count_alph; $key++) {
            $result = '';

            foreach ($arr_text as $letter) {
                $m = \array_search($letter, $arr_alph);

                if (false == $m) {
                    $result .= $letter;
                } else {
                    if (($m - $key < $count_alph) && ($m - $key > 0)) {
                        $new_letter = $arr_alph[$m - $key];
                    } else {
                        $counter = 0;

                        while (isset($arr_alph[$m - $counter])) {
                            $counter++;
                            $end = $count_alph - $counter;
                            $new_letter = $arr_alph[$end];
                        }
                    }

                    $result .= $new_letter;
                }
            }
            $result = 'Раскодированный результат ' . $key . ':' . $result . \PHP_EOL;
            echo $result;
            \file_put_contents('data/open1', $result, \FILE_APPEND);
        }
    }
}
