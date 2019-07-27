<?php

//Hint - use Single Responsibility Principle Violation
class Report
{
    public function getTitle()
    {
        return 'Report Title';
    }

    public function getDate()
    {
        return '2016-04-21';
    }

    public function getContents()
    {
        return [
            'title' => $this->getTitle(),
            'date' => $this->getDate(),
        ];
    }
}

class Formatter
{
    public function formatJson($content){
        return json_encode($content);
    }
}

$report = new Report;
$formatter = new Formatter;
echo $formatter->formatJson($report->getContents());
