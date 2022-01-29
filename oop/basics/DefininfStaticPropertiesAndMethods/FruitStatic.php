<?php


class FruitStatic {

    public static function addFruit($apples,$oranges,$bananas)
    {
        $totalFruit = $apples + $oranges + $bananas;
        return $totalFruit;
    }

} 