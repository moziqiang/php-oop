<?php
//基础的作用，子类合法拥有父类某些权限
//
//* 继承必须满足继承关系：即存在合理的包含关系
//* 继承的本质是子类通过继承可以直接使用父类已经存在的数据和数据操作
//* 不同编程语言的继承机制和方式不一样，PHP中使用extends关键字表示继承

//步骤
//1、创建父类：通常是比较抽象的，大概的类，定义的方法和属性也都是比较大众的
//
//2、创建子类
//
//* 子类与已有父类之间属于包含关系：父类包含子类
//* 子类创建时明确继承父类：extends
//
//3、实例化子类对象后，子类对象可以直接访问子类不存在而父类存在的属性和方法


//继承的基础：子类（要继承其他类的类，也称之为派生类）与父类（被继承类，也称之为基类）之间本身是一种包含于被包含关系，如此才有可继承的前提

//父类
class human{
    public function eat(){
        echo "干饭！";
    }
    public function run(){
        echo "溜了溜了！";
    }
}
//子类继承Human类
//继承关键字：extends，子类想要继承父类，则必须在子类结构申明时明确使用extends关键字来继承相关类
class man extends human{}# 子类为空类：没有类成员
class woman extends human{}


//继承效果：子类可以不用自己去实现某些功能，而可以直接访问父类中已经存在的成员


//直接实例化子类

$man = new man();
$man -> run();
//$man -> eat();
$woman = new woman();
$woman ->eat();


//1、继承extends是面向对象思想中实现代码重复利用的重要特性
//
//2、继承是指子类可以直接访问父类中已经存在的成员
//
//3、继承可以节省代码工作，同时允许子类中进行扩展，即在子类中增加必要的父类不存在的功能

