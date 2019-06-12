<?php

//Hint - Liskov Substitution Principle

abstract class Figure
{
    abstract protected function area() : float; 
}

class Rectangle extends Figure
{
    private $width;
    private $height;

    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setWidth(float $width)
    {
        $this->width = $width;
    }

    public function getWidth()
    {
        return $this->width;
    }
    public function area() : float
    {
        return $this->$height * $this->width;
    }
}

class Square extends Figure
{
    private $side;

    public function setSide(float $side)
    {
        $this->side = $side;
    }

    public function area() : float
    {
        return $this->$side * $this->side;
    }
}

class FigureTest
{
    private $figure;

    public function __construct(Figure $figure)
    {
        $this->figure = $figure;
    }

    public function testArea()
    {
        if($figure instanceof Rectangle ){
            $this->figure->setHeight(2);
            $this->figure->setWidth(3);
        }else if($figure instanceof Square){
            $this->figure->setSide(3);
        }
        return $this->figure->area();
    }
}

$rectangle = new Rectangle();
echo "Calc area for rectangle \n";
$rectangleTest = new FigureTest($rectangle);
echo $rectangleTest->testArea();

$square = new Square();
echo "Calc area for square \n";
$rectangleTest = new FigureTest($square);
echo $rectangleTest->testArea();
