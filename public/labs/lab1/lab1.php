<?php
// 1. Створення базового PHP-скрипта
function task1() {
    echo "Hello, World!";
    echo PHP_EOL;
}

// 2. Змінні та типи даних
function task2() {
    $str = "It's a string";
    $int = 567;
    $float = 74.15;
    $bool = true;

    echo "String: $str" . PHP_EOL;
    echo "Integer: $int" . PHP_EOL; 
    echo "Float: $float" . PHP_EOL; 
    echo "Bool: " . ($bool ? 'true' : 'false') . PHP_EOL;

    var_dump($str);
    var_dump($int);
    var_dump($float);
    var_dump($bool);
    echo PHP_EOL;
    echo PHP_EOL;
}

// 3. Конкатенація рядків
function task3() {
    $first = "Cat and";
    $second = "dog";
    $word = $first . " " . $second;

    echo $word . PHP_EOL;
    echo PHP_EOL;
}

// 4. Умовні конструкції
function task4() {
    $number = 22;
    if ($number % 2 == 0) {
        echo "$number even number" . PHP_EOL;
    } else {
        echo "$number odd number" . PHP_EOL;
    }
    echo PHP_EOL;
}

// 5. Цикли
function task5() {
    echo "For" . PHP_EOL;
    for ($i = 1; $i <= 10; $i++) {
        echo "$i ";
    }
    echo PHP_EOL;
    echo PHP_EOL;

    echo "While:" . PHP_EOL;
    $j = 10;
    while ($j >= 1) {
        echo "$j ";
        $j--;
    }
    echo PHP_EOL;
    echo PHP_EOL;
}

// 6. Масиви
function task6() {
    $student = [
        "Name" => "Dan",
        "Surname" => "Smith",
        "Age" => 19,
        "Major" => "Computer Science"
    ];

    echo "Student:" . PHP_EOL;
    foreach ($student as $key => $value) {
        echo "$key: $value" . PHP_EOL;
    }

    $student["average score"] = 4.2;

    echo PHP_EOL;
    echo "Update:" . PHP_EOL;
    print_r($student);
    echo PHP_EOL;
}

task1();
task2();
task3();
task4();
task5();
task6();
?>
