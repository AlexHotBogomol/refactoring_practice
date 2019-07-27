<?php
//Hint - Open Closed Principle
abstract class Worker{
    abstract protected function doWork();
}
class AnotherProgrammer extends Worker
{
    public function code()
    {
        return 'coding';
    }

    public function doWork(){
        return $this->code();
    }
}
class Tester extends Worker
{
    public function test()
    {
        return 'testing';
    }

    public function doWork(){
        return $this->test();
    }
}
class Designer extends Worker
{
    public function draw()
    {
        return 'drawing';
    }

    public function doWork(){
        return $this->draw();
    }
}
/** Что если добавить еще класс Designer с методом draw() **/
class ProjectManagement
{
    public function process(Worker $member)
    {
        return $member->doWork();
    }
}

$programmer = new AnotherProgrammer();
$tester = new Tester();
$designer = new Designer();
$project_management = new ProjectManagement();
echo $project_management -> process($programmer);
echo $project_management -> process($tester);
echo $project_management -> process($designer);
