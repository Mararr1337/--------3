<?php
//В массиве хранятся следующие данные о товарах интернет магазина:
//наименование, цена, количество на складе.
//Вывести на экран сводную информацию о товарах в виде массива с данными: количество наименований товара,
//самый дешевый и самый дорогой товар, общее количество всех товаров на складе и общая стоимость всех товаров.
//Напишите функцию storage($arr), принимающую параметром массив и
//возращающую массив со сводной информацией.
//Входной массив создайте по образцу.
/* пример входного массива
$arr = [
  [
    'title' => 'Altair',
    'price' => 15000,
    'quantity' => 15,
  ]
];
Результ работы функции должен быть с такими полями (образец)
[
 'quantityCards' => 10,
 'maxPrice' => 20000,
 'minPrice' => 100,
 'allQuantity' => 30,
 'allSumm' => 75000
]
*/
function storage($arr) {
    $result= [
        'quantityCards' => count($arr),
        'maxPrice' => 0,
        'minPrice' => PHP_INT_MAX,
        'allQuantity' => 0,
        'allSum' => 0
    ];

    foreach ($arr as $product) {
        if ($product['price'] > $result['maxPrice']) {
            $result['maxPrice'] = $product['price'];
        }
        if ($product['price'] < $result['minPrice']) {
            $result['minPrice']  = $product['price'];
        }
        $result['allQuantity'] += $product['quantity'];
        $result['allSum'] += $product['price']  * $product['quantity'];
    }
    return $result;
}
$arr = [
      [
        'title' => 'Altair',
        'price' => 15000,
        'quantity' => 15,
      ],[
      'title' => 'Stels',
      'price' => 11000,
      'quantity' => 5,
      ],[
      'title' => 'Stark',
      'price' => 25000,
      'quantity' => 4,
      ],[
      'title' => 'FORWARD ',
      'price' => 8000,
      'quantity' => 8,
    ]
];
$result = storage($arr);

echo "Количество наименований: " .
$result['quantityCards'] . "<br>";
echo "Самый дорогой товар: " .
$result['maxPrice'] . "<br>";
echo "Самый дешевый товар: " .
$result['minPrice'] . "<br>";
echo "Общее количество товаров: " .
$result['allQuantity'] . "<br>";
echo "Общая стоимость: " .
$result['allSum'] . "<br>";
?>