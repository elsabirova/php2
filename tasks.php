<?php
class A {
    public function foo () {
        static $x = 0;
        echo ++ $x;
    }
}
$a1 = new A ();
$a2 = new A ();
$a1 -> foo ();
$a2 -> foo ();
$a1 -> foo ();
$a2 -> foo ();


class A2 {
    public function foo () {
        static $x = 0;
        echo ++ $x;
    }
}
class B extends A2 {
}
$a1 = new A2 ();
$b1 = new B ();
$a1 -> foo ();
$b1 -> foo ();
$a1 -> foo ();
$b1 -> foo ();