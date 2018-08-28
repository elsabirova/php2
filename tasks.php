<?php
//Task 5
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

/*
 *
 * Ключевое слово static, написанное перед присваиванием значения локальной переменной, приводит к следующим эффектам:
    1. Присваивание выполняется только один раз, при первом вызове функции
    2. Значение помеченной таким образом переменной сохраняется после окончания работы функции
    3. При последующих вызовах функции вместо присваивания переменная получает сохраненное ранее значение

    Такое использование слова static называется статическая локальная переменная.

Отсюда следует, $x = 0; присвоится только при первом вызове функции $a1 -> foo ();
И после оканчания работы функции $x = 1;
Т.к. для разных объектов одного класса методы существуют в единственном экземпляре, то
при вызове $a2 -> foo (); $x будет равен 1,
И после оканчания работы функции $x = 2;
при вызове $a1 -> foo ();  $x = 3;
при вызове $a2 -> foo ();  $x = 4;
В итоге получаем на экране 1234
 */

echo '<br>';

//Task 6
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

/*
 * Для разных объектов одного класса методы существуют в единственном экземпляре, но
 * при наследование класса (и метода) создается новый метод.
 *
 * Поэтому
 *  $a1 -> foo (); $x = 1;
 *  $b1 -> foo (); $x = 1;
 *  $a1 -> foo (); $x = 2;
 *  $b1 -> foo (); $x = 2;
 */