<?php

$divider = '<br><br><hr><br>';

//Part 1

echo $divider . "Part 1" . $divider;

//Funtion 1
function decimalToBinary($number)
{
    if ($number == 0) {
        return '0';
    }

    $binary = "";
    if ($number < 0) {
        $number *= -1;
    }

    while (floor($number) > 0) {
        $binary .= $number % 2;
        $number /= 2;
    }
    return strrev($binary);
}

$testNumber = 85;
$convertedNumber = decimalToBinary($testNumber);
echo "The decimal number <b>{$testNumber}</b> converted to binary is: <b>{$convertedNumber}</b>";
echo "<br /><br />";

//Funtion 2
function decimalToRoman($number)
{
    if ($number <= 0 || $number >= 3999) {
        return "Error: The number <b>{$number}</b> is out of range! (0-3999)";
    } else {
        $romanMap = [
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        ];

        $romanNumber = '';
        while ($number > 0) {
            foreach ($romanMap as $roman => $value) {
                if ($number >= $value) {
                    $number -= $value;
                    $romanNumber .= $roman;
                    break;
                }
            }
        }
        return $romanNumber;
    }
}

$testNumber = 1985;
$convertedNumber = decimalToRoman($testNumber);
echo "The decimal number <b>{$testNumber}</b> converted to Roman is: <b>{$convertedNumber}</b>";

//Part 2

echo $divider . "Part 2" . $divider;

//Function 3
function binaryToDecimal($binNumber)
{
    $digits = str_split($binNumber);
    $digitsCount = count($digits);
    $decimalNumber = 0;

    for ($i = $digitsCount - 1; $i >= 0; $i--) {
        if ($digits[$i] == '1') {
            $decimalNumber += pow(2, $digitsCount - $i - 1);
        }
    }

    return $decimalNumber;
}

$testNumber = 1010101;
$convertedNumber = binaryToDecimal($testNumber);
echo "The binary number <b>{$testNumber}</b> converted to decimal is: <b>{$convertedNumber}</b>";
echo "<br /><br />";

//Funtion 4
function romanToDecimal($romanNumber)
{
    //
    $romanNumber = strtoupper($romanNumber);
    $decimalNumber = 0;

    $romanMap = [
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    ];

    foreach ($romanMap as $key => $value) {
        while (strpos($romanNumber, $key) === 0) {
            $decimalNumber += $value;
            $romanNumber = substr($romanNumber, strlen($key));
        }
    }
    return $decimalNumber;
}

$testNumber = 'MCMLXXXV';
$convertedNumber = romanToDecimal($testNumber);
echo "Roman number <b>{$testNumber}</b> converted to decimal is: <b>{$convertedNumber}</b>";

//Part 3

echo $divider . "Part 3" . $divider;

//Extended Funtion 2 -> decimalToRoman
function decimalToRomanExtended($number)
{
    if ($number <= 0 || $number >= 3999999) {
        return "Error: The number <b>{$number}</b> is out of range! (0-3999999)";
    } else {
        $romanMap = [
            '(M)' => 1000000,
            '(D)' => 500000,
            '(C)' => 100000,
            '(L)' => 50000,
            '(X)' => 10000,
            '(V)' => 5000,
            'M'  => 1000,
            'CM' => 900,
            'D'  => 500,
            'CD' => 400,
            'C'  => 100,
            'XC' => 90,
            'L'  => 50,
            'XL' => 40,
            'X'  => 10,
            'IX' => 9,
            'V'  => 5,
            'IV' => 4,
            'I'  => 1
        ];

        $romanNumber = '';
        while ($number > 0) {
            foreach ($romanMap as $roman => $value) {
                if ($number >= $value) {
                    $number -= $value;
                    $romanNumber .= $roman;
                    break;
                }
            }
        }
        return $romanNumber;
    }
}

$testNumber = 3456753;
$convertedNumber = decimalToRomanExtended($testNumber);
echo "The decimal number <b>{$testNumber}</b> converted to Roman is: <b>{$convertedNumber}</b>";
echo "<br /><br />";

$exampleNumbers = ['100', '+4', 'M', '545', '-700', '+1879', 'XXI', '+024', '+4999999', '111', '+990', 'CMXC'];

function checkingArray(array $arr)
{
    //
    foreach ($arr as $key => $value) {

        echo "<br>";
        if (preg_match('~^[01]+$~', $value)) {
            $decimalNumber = binaryToDecimal($value);
            $romanNumber = decimalToRoman($decimalNumber);
            echo  $value . " is binary. Converted to decimal is: \r\n" . $decimalNumber . " and to Roman is " . $romanNumber . "<br />";
        } elseif (preg_match('~^[XLCIM]|[xlcim]~', $value)) {
            $decimalNumber = romanToDecimal($value);
            $binaryNumber = decimalToBinary($decimalNumber);
            echo   $value . " is Roman. Converted to decimal is " . $decimalNumber . " and to binary is " . $binaryNumber . "<br />";
        } elseif (($value[0] == "+" || $value[0] == "-") && !preg_match('~^(?:0|00)\d+$~', substr($value, 1))) {
            $binaryNumber = decimalToBinary($value);
            $romanNumber =  decimalToRomanExtended($value);
            echo  $value . " is decimal. Converted to binary is " . $binaryNumber . "  and to roman is " . $romanNumber . "<br />";
        } elseif (preg_match('~^[0123456789]+$~', $value)) {
            $binaryNumber = decimalToBinary($value);
            $romanNumber =  decimalToRomanExtended($value);
            echo  $value . " is decimal. Converted to binary is " . $binaryNumber . "  and to roman is " . $romanNumber . "<br />";
        } else {
            echo  "ERROR! {$value} is not a valid input" . "<br />";
        }
    }
}

checkingArray($exampleNumbers);

echo $divider;
