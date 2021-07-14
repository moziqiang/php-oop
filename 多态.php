<?php
//**多态**：多态性是指相同的操作或函数、过程可作用于多种类型的对象上并获得不同的结果
//
//* 需要发生**类的继承**，同时出现**方法的重写（override）**，即子类拥有与父类同名的方法
//* 在实例化对象的时候让父类对象指向子类对象（强制类型，PHP不支持）
//* 结果：父类对象表现的子类对象的特点


//步骤
//1、明确继承关系：子类继承父类
//
//2、子类重写父类方法
//
//3、实例化子类，但是存储子类对象的数据类型为父类对象
//
//4、实现：父类对象表现出子类对象的形态


//注意：PHP是弱类型语言，所以不存在变量的强制类型，因此PHP不支持多态。但是PHP可以模拟多态


# 父类
class animal{

    # 统一调用被重写方法

    public static function show(animal $obj){
        # Animal $obj，强制对象为Animal对象（子类对象也可以）
        # 对象动态调用方法
        $obj->display();
        $obj->speak();

    }

    public function speak(){
        echo "animal speak";
    }


    #父类方法
    public function display(){
        echo "animal";

    }
}

#子类

class cat extends animal{
    #重写父类方法
    public function display(){
        echo "cat";

    }
}

class dog extends animal{
    //此类重新了父类两个方法，display 和 speak
    public function display(){
//        parent::display(); // TODO: Change the autogenerated stub
        echo "dog";
    }

    public function speak()
    {
        echo "汪汪汪！";
    }
}
//animal::display();
animal::show(new cat()); #输出cat
animal::show(new dog()); #输出dog


//测试实例化父类

$an = new animal();

//实例化子类

$cat = new cat();
$dog = new dog();

$an->display();#animal
$an->show($cat);#输出cat


$dog->speak();
$dog->display();
$an->display();
$an->show($dog);//dog汪汪汪！


//1、多态的发生必须是有继承关系，并且子类要重写父类方法
//
//2、多态是指父类对象拥有子类形态，并且可以表现出子类的特性（调用子类方法）
//
//3、PHP是弱类型语言，不支持多态