<?php

class Bar
{
    private $a;

    public function __construct($a)
    {
        $this->a = (bool) $a;
    }

    public function a()
    {
        return $this->a;
    }
}

function foo(callable $x)
{
    $object = new Bar(false);
    $x($object);
    return $object->a();
}

var_dump(foo(function(&$x){$x=new$x(1);}));

/*
 * Result:
 *
 * bool(true)
 */
