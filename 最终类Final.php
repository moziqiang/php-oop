<?php


//**最终类**：使用final关键字修饰类名，表示此类不可以被继承
//
//* 最终类表示类已经到头，不允许再作为其他类的父类被继承
//* 最终类只能直接实例化使用
//* final除了修饰类之外，还能修饰方法，表示方法不可被重写
//
//* final修饰的不管是类还是方法，都是为了保护结构不被恶意扩展或者修改


//示例
//1、基本语法：final class 类名

final class Man{}


//2、最终类无法被继承

class man10 extends man{} ## 致命错误：无法从final类继承



#final关键字不止修饰类表示类不可被继承，还能修饰方法，表示方法不能被重写

#父类

class animal{
    public function show(){}#普通方法
    public final function walk(){} #最终方法

}

#子类

class dog extends animal{
    #重写

    public function show(){}# 没问题


//    public function walk(){}# 致命错误：不能重写父类中的最终方法
}

//1、final关键字修饰的类表示无法被继承
//
//2、final关键字还可以修饰方法，表示方法不能子类重写（通常类不会使用final关键字）
//
//3、final修饰类表示不希望类再出现子类，可以很好保护类的内部结构不被暴露（可以有效控制继承链）
//
//4、final修饰方法表示不希望方法被修改，可以在一个更高的维度来保证同类事务的共同表现