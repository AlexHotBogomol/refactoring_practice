<?php
//Hint - Liskov Substitution Principle

abstract class Figure{
    abstract protected function calculateArea() : float;
}

interface AreaTestable{
    public function testArea(float $hypotheticalResult);
}

class Rectangle extends Figure
{
    private $width;
    private $height;

    public function __construct(float $height, float $width){
        $this->height = $height;
        $this->width = $width;
    }
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
    public function calculateArea() : float
    {
        return $this->height * $this->width;
    }
}
class Square extends Figure
{
    private $side;

    public function __construct(float $side){
        $this->side = $side;
    }

    public function setSide(float $value)
    {
        $this->side = $value;
    }

    public function calculateArea() : float
    {
        return pow($this->side, 2);
    }
}
class FigureTest implements AreaTestable
{
    private $figure;
    public function __construct(Figure $figure)
    {
        $this->figure = $figure;
    }
    public function testArea(float $hypotheticalResult)
    {
        $result = $this->figure->calculateArea();
        if ($result !== $hypotheticalResult) {
            return "Bad area \n";
        } else {
            return "Test passed! \n";
        }
    }
}

$rectangle = new Rectangle(2, 4);
echo "Calc area for rectangle \n";
$figureTest = new FigureTest($rectangle);
echo $figureTest->testArea(8);

$square = new Square(3);
echo "Calc area for square \n";
$figureTest = new FigureTest($square);
echo $figureTest->testArea(9);
