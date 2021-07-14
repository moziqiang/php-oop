<?php


//override，子类中定义了与父类重名的成员
//
//* 子类可以重写父类任意类成员
//  * 属性：直接覆盖，父类对象的属性将不存在（私有除外）
//  * 方法：同时存在
//* 通常重写是用来重写父类的方法，用于扩展或者更改某些业务逻辑
//* 重写要求
//  * 子类对于成员的控制权不能高于父类
//  * 子类重写方法时，参数要求与父类一致


//1、存在继承关系
//
//2、父类存在方法，但是不满足子类业务要求
//
//3、子类重写父类方法（或者属性）




class Human{
    public $name = 'Human';
    public function show(){
        echo __CLASS__,"<br/>";
    }

    protected function open(){
        echo __CLASS__,"<br/>";
    }

    protected function same(){
        echo __CLASS__,"<br/>";

    }


    private function priv(){
        echo __CLASS__,"<br/>";

    }
}

//子类继承父类，同时子类定义与父类同名的类成员


class Man extends Human{
    #定义同名属性
    public $name = 'Man';

    #定义同名方法
    public function show(){
        echo __CLASS__,' hello man!<br/>';
    }

    #重写的要求1：子类重写父类的方法，控制权不能高于父类，即子类可以比父类更开放

    #通常来说，开放程度public 比 protected 要高，而protected 要比 private 要高

    //现在重写父类受保护（protected）的open方法

//    protected function open(){
//        //可以重写
//    }
//    public function open(){
//        //可以重写
//    }
//
//    private function open(){
//        //不能够重写，控制权比父类更严格，子类只会比父类更加开放
//    }



    #重写的要求2：PHP中重写要求子类重写父类方法的时候，必须保证与父类同名方法参数一致

    //重写父类方法same

    public function same(){
        //可以重写
    }

//    public function same($a){}# 错误，与父类同名方法不一致
//  注意  在方法参数一致不单单要求数量一致，而且数据类型要求也必须相同，但形参名字可以不同；另外，在PHP7以前重写对于参数这块没有要求。






    #重写的要求3：重写针对的是被继承的成员，父类私有方法不会被继承，因此不受要求2规定

    private function priv($name){}# 不会报错，因为本质不存在重写（父类Human的priv私有方法并没有被继承）
}

#重写父类成员之后，子类只会直接访问子类的成员（覆盖）

# 实例化子类对象
$man = new Man();
$man ->show();
var_dump($man);

#**注意**：不管是公有和是受保护属性，一旦重写，父类的就会不存在，而私有属性不会被覆盖而丢失



#小结

//重写override是一种在子类中定义父类同名成员的操作
//
//2、公有、受保护的属性重写是直接覆盖父类成员，私有属性不会被覆盖；公有、收保护的方法会被重写，但是私有方法不会被重写（私有方法本质没有被继承）
//
//3、重写的要求
//
//* 子类控制权不能高于父类控制权
//* PHP7中要求被重写的方法必须与父类保持参数一致（数量和类型）
//* 私有方法不能继承，因此不存在重写
//
//4、静态成员也可以被重写，但是静态属性不会被覆盖（属于类，不属于对象）

