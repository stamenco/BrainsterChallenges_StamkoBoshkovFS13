<?php

$divider = '<br><br><hr><br>';

//1.
echo $divider;

$name = 'Stamko';

if($name == 'Kathrin'){
    echo "Hello Katherin";
}
else{
    echo "Nice name.";
}

echo "<br /><br />";

$rating = 9;

if($rating>=1 && $rating<=10){
    echo "Thank you for rating.";
}
else{
    echo "Invalid rating, only numbers between 1 and 10.";
}

echo $divider;

//2.

$currentHour = date('H:i'); //for 24-hour time format

if ($currentHour < '12:00') {
    echo "Good morning {$name}.";
} elseif ($currentHour < '19:00') {
    echo "Good afternoon {$name}.";
} else {
    echo "Good evening {$name}.";
}

echo "<br /><br />";

$rated = true;

if(is_int($rating)){
    if($rating >= 1 && $rating <= 10){
        if($rated){
            echo ("You already voted.");
        }
        else{
            echo ("Thanks for voting.");
        }
    }
    else{
        echo "Invalid rating, only numbers between 1 and 10.";
    }
}else{
    echo "{$rating} is not an integer number.";
}

echo $divider;

//3.

$voters = [
    'John' => ['voted' => 'false', 'rating' => 8],
    'Alice' => ['voted' => 'true', 'rating' => 10],
    'Bob' => ['voted' => 'true', 'rating' => 5],
    'Emily' => ['voted' => 'false', 'rating' => 7],
    'David' => ['voted' => 'false', 'rating' => 12],
    'Sarah' => ['voted' => 'true', 'rating' => 9],
    'Michael' => ['voted' => 'false', 'rating' => 15],
    'Olivia' => ['voted' => 'true', 'rating' => 2],
    'James' => ['voted' => 'false', 'rating' => 4],
    'Emma' => ['voted' => 'true', 'rating' => 1]
];

foreach($voters as $voterName => $value){

    echo $voterName . " => " . "&quot" . $value['voted'] . "," . $value['rating'] . "&quot <br />";

    $currentTime = date('H:i');

    if ($currentTime < '12:00') {
        echo "Good morning {$voterName}.";
    } elseif ($currentTime < '19:00') {
        echo "Good afternoon {$voterName}.";
    } else {
        echo "Good evening {$voterName}.";
    }
    echo "<br />";

    if($value['voted'] == 'true'){
        echo "You already voted with {$value['rating']}.";
    }else{
        if($value['rating'] >= 1 && $value['rating'] <= 10){
            echo ("Thanks for voting with {$value['rating']}.");
        }
        else{
            echo "Invalid rating, only numbers between 1 and 10.";
        }
    }
    echo "<br /><br />";
}

echo $divider;

?>

