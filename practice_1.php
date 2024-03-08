<?php

/**
 * Calculates the total price of items in a shopping cart.
 *
 * @param array $items An array of items with 'name' and 'price' keys.
 *
 * @return float The total price of all items.
 */
function calculateTotalPrice(array $items): float
{
    $total = 0;

    foreach ($items as $item) {
        $total += $item['price'];
    }

    return $total;
}

// Example usage:
$items = [
    ['name' => 'Widget A', 'price' => 10],
    ['name' => 'Widget B', 'price' => 15],
    ['name' => 'Widget C', 'price' => 20],
];
echo "Total price: $" . calculateTotalPrice($items);

/**
 * Modifies a given string by removing spaces and converting it to lowercase.
 *
 * @param string $inputString The input string to be modified.
 *
 * @return string The modified string.
 */
function modifyString(string $inputString): string
{
    $modifiedString = str_replace(' ', '', $inputString);
    $modifiedString = strtolower($modifiedString);

    return $modifiedString;
}

// Example usage:
$string = "This is a poorly written program with little structure and readability.";
echo "\nModified string: " . modifyString($string);

/**
 * Checks if a number is even or odd and displays the result.
 *
 * @param int $number The number to be checked.
 *
 * @return string The result indicating whether the number is even or odd.
 */
function checkEvenOrOdd(int $number): string
{
    return ($number % 2 == 0) ? "The number {$number} is even." : "The number {$number} is odd.";
}

// Example usage:
$number = 42;
echo "\n" . checkEvenOrOdd($number);
