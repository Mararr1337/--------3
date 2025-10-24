<?php
function storage($arr) {
    if (empty($arr)) return ['quantityCards'=>0, 'maxPrice'=>0, 'minPrice'=>0, 'allQuantity'=>0, 'allSumm'=>0];
    
    $quantityCards = count($arr);
    $maxPrice = $arr[0]['price'];
    $minPrice = $arr[0]['price'];
    $allQuantity = 0;
    $allSumm = 0;
    
    foreach ($arr as $product) {
        if ($product['price'] > $maxPrice) $maxPrice = $product['price'];
        if ($product['price'] < $minPrice) $minPrice = $product['price'];
        $allQuantity += $product['quantity'];
        $allSumm += $product['price'] * $product['quantity'];
    }
    
    return [
        'quantityCards' => $quantityCards,
        'maxPrice' => $maxPrice,
        'minPrice' => $minPrice,
        'allQuantity' => $allQuantity,
        'allSumm' => $allSumm
    ];
}

if ($_POST) {
    $products = [];
    for ($i = 0; $i < 3; $i++) {
        if ($_POST["title_$i"]) {
            $products[] = [
                'title' => $_POST["title_$i"],
                'price' => (float)$_POST["price_$i"],
                'quantity' => (int)$_POST["quantity_$i"]
            ];
        }
    }
    $result = storage($products);
}
?>

<form method="post">
    <h3>Товар 1</h3>
    Название: <input type="text" name="title_0"><br>
    Цена: <input type="number" name="price_0"><br>
    Количество: <input type="number" name="quantity_0"><br>

    <h3>Товар 2</h3>
    Название: <input type="text" name="title_1"><br>
    Цена: <input type="number" name="price_1"><br>
    Количество: <input type="number" name="quantity_1"><br>

    <h3>Товар 3</h3>
    Название: <input type="text" name="title_2"><br>
    Цена: <input type="number" name="price_2"><br>
    Количество: <input type="number" name="quantity_2"><br>

    <input type="submit" value="Анализировать">
</form>

<?php if (isset($result)): ?>
    <h2>Результат:</h2>
    Количество наименований: <?=$result['quantityCards']?><br>
    Максимальная цена: <?=$result['maxPrice']?><br>
    Минимальная цена: <?=$result['minPrice']?><br>
    Общее количество: <?=$result['allQuantity']?><br>
    Общая стоимость: <?=$result['allSumm']?><br>
<?php endif; ?>