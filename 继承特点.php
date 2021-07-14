<?php
//**PHP继承特点**：与其他纯面向对象（从设计之初就完全由面向对象思维支配）编程语言是有一些不一样
//
//* PHP只能单继承，只有一个父类
//* PHP继承中，只有私有方法不能继承
//* PHP允许继承父类中的构造方法和析构方法


#PHP中继承只能单继承：即子类只有一个父类（有些语言支持多继承）
//class Man{}
//calss Woman{}
//class Ladyboy extends Man,Woman{}# PHP中错误，不允许继承多个父类


#PHP若想继承多个类，可以使用链式继承

class animal{}

class dog extends animal{}

class doge extends dog{} #doge包含了animal和animal类中所有可继承的成员