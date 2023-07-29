<?php
declare(strict_types=1);

$a = 42;
$b = 3;

// поменять местами переменную
$c = list($a, $b) = array($b, $a);

echo $a;
echo $b;
echo "<br>";

$a = 0.2 + 0.4;
var_dump($a);

echo "<br>";
var_dump((boolean)0 === true);
echo ", ";
var_dump((boolean)0 == true);
echo "<br>";
var_dump("false" === true);
echo ", ";
var_dump("false" == true);
echo "<br>";
var_dump(1 === true);
echo ", ";
var_dump(1 == true);
echo "<br>";
var_dump((boolean)42 === true);
echo ", ";
var_dump((boolean)42 == true);

class Cat {

    private $name;
    public $color;
    public $weight;

    public function __construct(string $name, string $color, int $weight)
    {
        $this->name = $name;
        $this->color = $color;
        $this->weight = $weight;
    }

    public function sayHello()
    {
        echo 'Привет! Меня зовут '. $this->name . '.<br>';
        echo 'Цвет '. $this->color . '.<br>';
        echo 'Вес '. $this->weight . '.<br>';
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string{
        return $this->name;
    }

    public function getColor(): string{
        return $this->color;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): int{
        return $this->weight;
    }
}

$cat1= new Cat('Снежок', 'белый', 3);
$cat1->sayHello();

echo '<br>';

class Post{
    protected $title;
    protected $text;
    public function __construct(string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle ($title): void{
        $this->title = $title;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text): void{
        $this->text = $text;
    }
}

class Lesson extends Post{
    private $homework;
    public function __construct (string $title, string $text, string $homework)
    {
        parent :: __construct($title, $text);
        $this->homework = $homework;
    }

    public function getHomework(): string{
        return $this->homework;
    }

    public function setHomework (string$homework): void{
        $this->homework = $homework;
    }
}

class paidLesson extends Lesson {
    private $price;
    public function __construct (string $title, string $text, string $homework, int $price)
    {
        parent :: __construct($title, $text, $homework, $price);
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setPrice (int $price): void
    {
        $this->price = $price;
    }
}
    $lesson= new Lesson('Заголовок', 'Текст', 'Домашка');
echo '<br>';
echo '<br>';
    $lessonPaid= new paidLesson('Заголовок', 'Текст', 'Домашка', 23);
    var_dump($lesson);
    var_dump($lessonPaid);

echo '<br><br>';

interface CalculateSquare
{
    public function calculateSquare(): float;
}

class Circle implements CalculateSquare {
    const PI = 3.1416;
    private $r;

    public function __construct(float $r)
    {
        $this->r = $r;
    }

    public function calculateSquare(): float{
        return self::PI * ($this->r ** 2);
    }

}

class Rectangle implements CalculateSquare {
    private $x;
    private $y;
    public function __construct (float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }
    public function calculateSquare(): float{
        return $this->x * $this->y;
    }
}

class Square {
    private $x;

    public function __construct (float $x)
    {
        $this->x = $x;
    }

    public function calculateSquare(): float{
        return $this->x ** 2;
    }
}
$objects = [
    new Square(5),
    new Rectangle(2, 4),
    new Circle(5)
];

foreach($objects as $object) {
    if($object instanceof CalculateSquare) {
        echo 'Объект '. get_class($object) .' реализует интерфейс CalculateSquare. Площадь: '. $object->calculateSquare();
        echo '<br>';
    } else {
        echo 'Объект '. get_class($object) .' не реализует интерфейс CalculateSquare. Площадь: '. $object->calculateSquare();
        echo '<br>';
    }
}

