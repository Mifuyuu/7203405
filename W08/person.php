<?php

interface Persons
{
    public function greet();
}

class English implements Persons
{
    public function greet()
    {
        return "Hello!";
    }
}
class American implements Persons
{
    public function greet()
    {
        return "Hi!";
    }
}

class French implements Persons
{
    public function greet()
    {
        return "Bonjour!";
    }
}

class German implements Persons{
    public function greet(){
        return "Hallo!";
    }
}

$person = [new English(), new American(), new French(), new German()];

function greeting($pe)
{
    foreach ($pe as $p) {
        echo $p->greet() . "<br>";
    }
}

greeting($person);
