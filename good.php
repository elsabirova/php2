<?php
/**
 * 1. Придумать класс, который описывает любую сущность из предметной области интернет-магазинов
 * продукт, ценник, посылка и т.п.
 *
 * 2. Описать свойства класса из п.1 (состояние).
 *
 * 3. Описать поведение класса из п.1 (методы).
 *
 * 4. Придумать наследников класса из п.1. Чем они будут отличаться?
 */

class Good {
    public $id;
    public $name;
    public $category;
    public $price;
    public $description;
    public $material;
    public $color;
    public $size;
    public $count;
    function __construct($id, $name, $category, $price, $description, $material, $color, $size, $count) {
        $this->id = $id;
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
        $this->description = $description;
        $this->material = $material;
        $this->color = $color;
        $this->size = $size;
        $this->count = $count;
    }
    function render()
    {
        echo "
            <h2>Товар</h2>
            <b>Наименование:</b> $this->name<br>
            <b>Категория:</b> $this->category<br>
            <b>Описание:</b> $this->description<br>
            <b>Цена:</b> $this->price руб.<br>
            <b>Материал:</b> $this->material<br>
            <b>Цвет:</b> $this->color<br>
            <b>Размер:</b> $this->size<br>
            <b>Количество:</b> $this->count<br>
        ";
    }
    public function buy($count) {
        $this->count -= $count;
    }
    public function changeName($newName) {
        $this->name = $newName;
    }
}

class Discount extends Good {
    public $reason;
    function __construct($id, $name, $category, $price, $description, $material, $color, $size, $count, $reason) {
        parent::__construct($id, $name, $category, $price, $description, $material, $color, $size, $count);
        $this->reason = $reason;
    }
    function render() {
        parent::render();
        echo "
            <b>Причина уценки:</b> $this->reason<br>
        ";
    }
}

$newGood = new Good(1, "Платье", "Женская одежда", 5000,
    "Летнее платье", 'хлопок', 'зеленый', 'M', 5);
$newGood->render();
$newGood->buy(3);
$newGood->render();
$newGood->changeName('Платье новое');
$newGood->render();

$discount = new Discount(1, "Джинсы", "Мужская одежда", 1000,
    "Повседневная одежда", 'хлопок', 'синий', 'L', 10, 'Старая коллекция');
$discount->render();
$discount->buy(3);
$discount->render();