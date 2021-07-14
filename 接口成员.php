<?php


//**接口成员**：接口内部定义的成员
//
//* 接口成员只能有两类
//  * 接口常量：const
//  * 公有的接口方法（普通方法和静态方法）
//* 接口方法为抽象方法：没有方法体{}（不需要abstract关键字，因为接口方法都是抽象方法）
//* 实现接口的类
//  * 可以访问接口常量：接口常量不能被重写
//  * 需要实现所有的接口方法（除非类本身是抽象类）
//  * 接口方法实现不允许增加控制权限（必须为public）



//例子

// 1:接口成员：接口中只能定义公有抽象方法和接口常量

interface human{

    #接口常量

    const NAME = '人';

    #接口抽象方法

    public function eat();

    public static function show();


    #错误示例

//    public function go(){}; # 错误：接口中的方法必须为抽象
//
//    public $age;   # 错误：接口中不能有属性
//
//    public static $count = 0; # 错误：接口中不能有静态属性（成员属性）
//
//    protected function walk(); # 错误：接口方法必须为公有抽象方法

}



//2、接口成员方法必须被实现的子类实现或者类为抽象类，接口常量可以直接在实现类中使用
class man implements human{

    #  必须实现接口所有抽象方法

    public function show(){

    }

    public function eat(){
        echo self::NAME;   # 可以访问接口常量
    }
}

# 抽象类实现接口

abstract class ladyboy implements human{}  # 正常实现
