<?php
abstract class Filter
{
    abstract public function FilterMethod($stats): Status;
    public function getFilter(): string
    {
        $test = "";
        $product = $this->FilterMethod($test);
        
        $result = "Currently: " .
            $product->Filter($test);

        return $result;
    }
}

class ConcreteFilter extends Filter
{
    public function FilterMethod($stats): Status
    {
            echo $stats;
            if($stats == "Completed"){
            return new CompletedService();
            }
    }
}

interface Status
{
    public function Filter($stats): string;
}

class CompletedService implements Status
{
    public function Filter($stats): string
    {
        return "{Completed Service}";
    }
}

class InProgress implements Status
{
    public function Filter($stats): string
    {
        return "{In Progress}";
    }
}

class PaidService implements Status
{
    public function Filter($stats): string
    {
        return "{Paid Service}";
    }
}

function client(Filter $f){
    $f->FilterMethod("Completed");
    echo $f->getFilter();
}

client(new ConcreteFilter());

