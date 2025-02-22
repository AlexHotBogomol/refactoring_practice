<?php

//Hint - Interface Segregation Principle

interface Codeable
{
    public function canCode();
    public function code();
}

interface Testable
{
    public function test();
}


class Programmer implements Codeable, Testable
{
    public function canCode()
    {
        return true;
    }
    public function code()
    {
        return 'coding';
    }
    public function test()
    {
        return 'testing in localhost';
    }
}

class Tester implements Testable
{
    public function test()
    {
        return 'testing in test server';
    }
}

class ProjectManagement
{
    public function processCode(Codeable $member)
    {
        if ($member->canCode()) {
            $member->code();
        }
    }
}
