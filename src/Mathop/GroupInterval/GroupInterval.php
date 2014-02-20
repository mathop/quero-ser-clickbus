<?php

namespace Mathop\GroupInterval;

class GroupInterval
{
    public static function group($range, array $numberSet)
    {
        $result = [];

        foreach (self::sort($numberSet) as $number) {
            if (!is_numeric($number)) {
                throw new \InvalidArgumentException();
            }
            $index = floor(($number - 1) / $range);
            if (!isset($result[$index])) {
                $result[$index] = [];
            }
            $result[$index][] = $number;
        }

        return array_values($result);
    }

    public static function sort(array $values)
    {
        $tmp = null;
        $size = count($values);

        for ($i = 0; $i < $size; $i++) {
            for ($j = 0; $j < $size - 1 - $i; $j++) {
                if ($values[$j + 1] < $values[$j]) {
                    $tmp = $values[$j];
                    $values[$j] = $values[$j + 1];
                    $values[$j+1] = $tmp;
                }
            }
        }

        return $values;
    }
}
