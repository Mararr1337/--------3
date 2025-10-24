<?php
namespace Tests;
use PHPUnit\Framework\TestCase;
require 'Задание 1\index.php';
require 'Задание 2\index.php';


class IndexTest extends TestCase
{
    public function testIndex1(): void
    {
     $str1 = "H1re Krishna Hare a вв kkd жжды :-O";
     $str2 = "H Krishna Kdna Krishna Krishna Hare Hare :-O";
       
       $result = countEqualWord($str1,$str2);
       self::assertEquals( ["Krishna", "Hare",":-O"],$result);
    }
    public function testIndex2(): void
    {
      $arr = [
          [
            'title' => 'Altair',
            'price' => 15000,
            'quantity' => 15,
          ],[
          'title' => 'Stels Focus',
          'price' => 11000,
          'quantity' => 5,
          ],[
          'title' => 'STARK Madness',
          'price' => 25000,
          'quantity' => 4,
          ],[
          'title' => 'FORWARD AZURE',
          'price' => 8000,
          'quantity' => 8,
        ]
        ];
       
       $result = storage($arr);
       self::assertEquals(['quantityCards' => 4,
          'maxPrice' => 25000,
          'minPrice' => 8000,
          'allQuantity' => 32,
          'allSumm' => 444000],$result);
    }
}

