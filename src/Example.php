<?php
/**
 * Created by PhpStorm.
 * User: Vilkazz
 * Date: 4/23/2015
 * Time: 5:25 PM
 */

namespace forevermore;


class Example
{
    public function run()
    {
        return 1;
    }

    public function countSum($n)
    {
//        $sum = 0;
//        for($i=0;$i<=$n;$i++){
//            $sum+=$i;
//        }
//        return $sum;

        return $n * ($n + 1) / 2;

    }

    public function countJumps($x, $y, $d)
    {
        return ceil(($y - $x) / $d);
//        return ($y - $x - 1 +$d)/$d;
    }

    public function findMissing($numbers)
    {
        $maxNumber = max($numbers);
        $sum = $maxNumber * ($maxNumber + 1) / 2;

        return ($sum - array_sum($numbers) == 0) ? $maxNumber + 1 : $sum - array_sum($numbers);
    }

    public function findDublicates($numbers)
    {
        $distinctCount = 0;
        $numbers = array_count_values($numbers);
        foreach ($numbers as $key => $number) {
            if ($numbers[$key] == 1) {
                $distinctCount++;
            }
        }

        return $distinctCount;
    }

    public function findProfit($days)
    {
//        asort($days, SORT_ASC);
//        $daysAsc = $days;
//        asort($days, SORT_DESC);
//        $daysDesc = $days;
        $maxProfit = 0;
        $maxProfitBuyPrice = $days[0];
        $tempBuyPrice = $days[0];

        foreach ($days as $day => $price) {
            if ($price < $maxProfitBuyPrice) {
                $tempBuyPrice = $price;
            }
            if ($maxProfit < $price - $maxProfitBuyPrice) {
                $maxProfit = $price - $maxProfitBuyPrice;
            }
            if ($maxProfitBuyPrice != $tempBuyPrice) {
                if ($maxProfit < $price - $tempBuyPrice) {
                    $maxProfit = $price - $tempBuyPrice;
                    $maxProfitBuyPrice = $tempBuyPrice;
                }
            }

        }
//        foreach($daysDesc as $day => $price)
//        {
//            foreach($daysAsc as $daya => $pricea)
//            {
//                if($daya > $day)
//                {
//                    $profit = $pricea - $price;
//                    if ($profit > $maxProfit)
//                    {
//                        $maxProfit = $profit;
////                        break;
//                    }
//                }
//            }
//        }
        return $maxProfit;
    }

    function calculateSelfies($towers)
    {
        $previousTowerHeight = 0;
        $previousTowerIndex = 0;
        $highestTowers = null;
        $distanceToThePreviousTower = null;

        for ($i = 0; $i < count($towers); $i++) { //o(n) gauname auksciausius bokstus
            if ($towers[$i] > $previousTowerHeight) {
                if ($i != count($towers) - 1) {
                    if ($towers[$i] > $towers[$i + 1]) {
                        $highestTowers[] = $i;
                        if ($previousTowerIndex != 0) {
                            $distanceToThePreviousTower[] = $i - $previousTowerIndex - 1;
                        }
                        $previousTowerIndex = $i;
                    }
                } else {
                    $highestTowers[] = $i;
                    $distanceToThePreviousTower[] = $i - $previousTowerIndex - 1;
                }
            }
            $previousTowerHeight = $towers[$i];
        }

        if ($highestTowers == null) { //jei auksciuasiu bokstu nera
            $selfieCount = 0;
        } else {
            if (count($highestTowers) == 1) {//jei tik vienas auksciausias bokstas
                $selfieCount = 1;
            } else {
                $maxSelfieCount = count($highestTowers);
                $selfieCount = count($highestTowers);
                $allowedSelfieCount = min($distanceToThePreviousTower);

                while ($allowedSelfieCount < $maxSelfieCount && count($distanceToThePreviousTower) > 1) {
                    $minDistanceKey = array_search(min($distanceToThePreviousTower), $distanceToThePreviousTower);

                    while (key($distanceToThePreviousTower) != $minDistanceKey) { //iteracija, kadangi dirbame su keys
                        next($distanceToThePreviousTower);
                    }

                    if ($this->has_next($distanceToThePreviousTower)) {
                        next($distanceToThePreviousTower);
                        $distanceToThePreviousTower[key($distanceToThePreviousTower)] += $distanceToThePreviousTower[$minDistanceKey] + 1;
                    } else {
                        prev($distanceToThePreviousTower);
                        $distanceToThePreviousTower[key($distanceToThePreviousTower)] += $distanceToThePreviousTower[$minDistanceKey] + 1;
                    }

                    reset($distanceToThePreviousTower);

                    unset($distanceToThePreviousTower[$minDistanceKey]);
                    unset($highestTowers[$minDistanceKey + 1]);

                    $maxSelfieCount--;
                    $selfieCount--;
                    $allowedSelfieCount = min($distanceToThePreviousTower);
                }
            }
        }
        return $selfieCount;
    }

    function has_next($array) {
        if (is_array($array)) {
            if (next($array) === false) {
                return false;
            } else {
                return true;
            }
        } else {
            return false;
        }
    }

    function findTallest($towers){
        $previousTowerHeight = 0;
        $highestTowers = null;
        for ($i = 0; $i < count($towers); $i++){
            if ($towers[$i] > $previousTowerHeight){
                if ($i != count($towers) - 1){
                    if ($towers[$i] > $towers[$i+1]){
                        $highestTowers[] = $i;
                    }
                }
                else {
                    $highestTowers[] = $i;
                }
            }
            $previousTowerHeight = $towers[$i];
        }
        return $highestTowers;
    }
}