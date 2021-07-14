<?php


//**parent关键字**：一种明确访问父类成员的表达方式
//
//* parent关键字是用于在被重写的方法（子类）中明确访问父类被重写成员
//* parent可以访问父类静态属性、静态方法、类常量和普通方法
//* parent使用范围解析操作符访问



#步骤

//1、子类继承父类
//
//2、子类重写父类方法
//
//3、子类重写的方法内部需要访问父类成员或者明确需要访问父类成员
//
//4、使用parent访问父类方法



#实例
//1、父类为数据库初始化类，子类为针对表的业务类：子类继承父类，但是子类也有资源要初始化，需要重写父类构造方法：但是又需要父类的构造方法执行以实现数据库的初始化操作


class DB{
    protected $link;

    public function __construct(){
        $this->link = mysqli_connect('localhost','root','','test','3306') or die('数据库连接失败！');

        #__METHOD__   返回类的方法名
        echo __METHOD__; #DB::__construct
    }

}


class Table extends DB{

    #重写父类方法

    public function __construct(){
        # 让父类构造方法先执行
        parent::__construct();


        #执行其他

        echo __METHOD__; #Table::__construct
    }

}

#实例化
$table = new Table();



#2、静态属性重写后，需要在子类中进行访问

class father{
    public static $count = 1;
}

class Son extends father{
    #重写
    public static $count = 2;

    public static function getcount(){
        echo self::$count + parent::$count;

    }
}

# 调用
Son::getCount();


///1、方法被重写后，访问调用的都是子类方法，如果想要访问父类方法，可以通过在子类方法中使用parent关键字来强制访问父类方法
//
//2、parent不能用于访问父类的属性（静态属性可以）