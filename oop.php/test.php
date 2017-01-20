<?php

/* 1.создайте и опишите класс SuperUser наследованный от класса User
2.в классе SuperUser создайте свойство role
3.Перезагрузите конструктор суперкласса так,чтобы он принимал четвертым параметром
значение для свойства role
4.Вызовите из конструктора родительский конструктор и передайте в него 3 параметра
5.Перезагрузите метод суперкласса showInfo ,так чтобы выводилось и значение и свойства role
6.Создайте обьект $user ,экземпляр класса $user
7.Вызовите метод showInfo,обьекта $user.
*/

//создание класса наследника
class User
{
    function __construct($n, $l, $p)
    {
        $this->name = $n;
        $this->login = $l;
        $this->password = $p;
    }

    function showInfo()
    {
        echo "<hr>Name : {$this->name}\n";
        echo "Login : {$this->login}\n";
        echo "Pass : {$this->password}\n";
    }
}

class SuperUser extends User
{
    //Добавляем свойство role
    public $role;

    //перезагружаем констуктор суперкласса так,чтобы он принимал четвертый параметр
    function __construct($n, $l, $p, $r)
    {
        //вызываем родительский конструктор
        parent::__construct($n, $l, $p);
        //четвертый параметр присваем через магическую переменную $this
        $this->role = $r;
    }
    //Перезагружаем ShowInfo();
    function showInfo(){
        //Вызовим родительский showInfo
        parent::showInfo();
        //Добавим того чего не хватает
        echo "Role : {$this->role}\n";
    }
}

$user = new SuperUser('Vasya Pupkin', 'vasyap', '0000', 'admin');
//перезагружаем метод суперкласса showInfo ,так чтобы выводилось и значение и свойства role
$user->showInfo();
