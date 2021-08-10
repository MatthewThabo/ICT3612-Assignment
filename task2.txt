<!DOCTYPE html>
<html>
<head>
    <title>Task 2</title>
</head>

<body>
<?php
    include 'menu.inc';
////////////////////////////// Task2 (a) //////////////////////////
    class Car {
        private $make, $year, $colour;
        private static $count;

        //constructor
        function __construct($make, $year, $colour){
            $this->make = $make;
            $this->year = $year;
            $this->colour = $colour;
            self::$count++;
        }

        public function setColour($colour)
        {
            $this->colour = $colour;
        }
        public function getColour()
        {
            return $this->colour;
        }

        public function setYear($year)
        {
            $this->year = $year;
        }
        public function getYear()
        {
            return $this->year;
        }

        public function getMake()
        {
            return $this->make;
        }
        public function setMake($make)
        {
            $this->make = $make;
        }


        public static function getCountObject()
        {
            return self::$count;
        }

        public function _toString(){
            return "$this->make:$this->year:$this->colour";
        }

        public function oldestCar($car){
            return $car->getYear() < $this->getYear() ? $car : $this;
        }

    }

    $hyundai = new Car("Volester",2013, "Charcoal");

    echo "Before using set functions:<br> ".$hyundai->_toString();
    echo "<br>";
    $hyundai->setMake("i30N");
    $hyundai->setYear(2018);
    $hyundai->setColour("Lime blue");
    echo "<br>";
    echo "Using set functions:<br> ".$hyundai->_toString();
    echo "<br><br>";

    $bmw = new Car("325IS",1996, "White");
    echo "Get functions<br>";
    echo "Make - ".$bmw->getMake()."</br>Year - ".$bmw->getYear()."</br>Colour - ".$bmw->getColour();
    echo "<br><br>";

    $oldestCar = $hyundai->oldestCar($bmw);
    echo "Number of cars created is ".Car::getCountObject()." <br>Oldest car is ".$oldestCar->_toString();

    echo "<br><br>";
////////////////////////////// Task2 (a) //////////////////////////
    abstract class Bonus {
        protected $salary, $type;

        public function __construct($salary, $type)
        {
            $this->salary = $salary;
            $this->type = $type;
        }

        public function getType()
        {
            return $this->type;
        }

        abstract protected function calculate();
    }

    class BirthdayBonus extends Bonus {
        private $months;

        public function __construct($salary, $months)
        {
            parent::__construct($salary, "BirthdayBonus");
            $this->months = $months;
        }

        public function calculate()
        {
            return ($this->months == 12) ? $this->salary : ($this->months / 12 * $this->salary);
        }
    }

    class LongServiceBonus extends Bonus {
        private $startDate;

        public function __construct($salary, $startDate)
        {
            parent::__construct($salary, "LongServiceBonus");
            $this->startDate = $startDate;
        }

        public function calculate()
        {
            $now = new DateTime("now");
            $years = $this->startDate->diff($now)->y;

            //check if start date is not future year and check if duration worked is a multiple of 5
            if ($this->startDate < $now && $years % 5 == 0){
                return $this->salary * ($years + 100) / 100;
            }
            return 0;
        }

    }

    class PerformanceBonus extends Bonus {
        private $score;

        public function __construct($salary, $score)
        {
            parent::__construct($salary, "PerformanceBonus");
            $this->score = $score;
        }

        public function calculate()
        {
            if ($this->score >= 3.1){
                return $this->salary * ($this->score + 100) / 100;
            }
            return 0;
        }
    }

    $bonuses = array(new BirthdayBonus(23000, 9), new PerformanceBonus(15069, 4.7), new LongServiceBonus(35693, new DateTime("2010-06-16")));

    foreach($bonuses as $bonus){
        echo $bonus->getType() . " -> " . $bonus->calculate() ."</br>";
    }

    echo "<br><br>";
?>
    <iframe src="task2.txt" height="400" scrolling="yes" width="1200px">
    <p>Your browser does not support iframes.</p></iframe>
</body>
</html>