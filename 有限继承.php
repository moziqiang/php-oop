<?php
//**有限继承**：指子类在继承父类的成员的时候，并非继承所有内容，而是继承并使用父类部分内容
//
//* PHP中继承的本质是对象继承
//* PHP中继承的内容：父类所有公有成员、受保护成员和私有属性，但是私有方法不能继承
//* 受保护（protected）成员是专用于继承的，可以在父类或者子类内部访问
//* 私有成员的访问只能在所属类中设定公有或者受保护方法实现访问
//* 静态成员也遵循继承规则：即子类可以访问父类静态成员（满足继承条件下）

//继承内容：PHP中继承是子类继承父类所有的公有成员、受保护成员和私有属性，不能继承父类的私有方法

#父类
class Human{

    const CALL = "人";
    public $name = 'human';
    public static $count = 0;
    protected static $testing = "bug";
    protected static $type = array('黑','黄','白');
    protected $age = '100';
    private $money = '100';


    public function __construct($money){
        $this->money = $money;
    }

    public function __destruct(){
        echo "die";
    }

    public function showname(){
        echo $this->name;
    }

    protected function showage(){
        echo $this->age;

    }
    # 提供接口供子类访问：此时通常是受保护的方法，肯定不允许外部直接访问的
    protected function getage(){
        echo $this->age;
    }

    private function showmoney(){
        echo $this->name;
    }


#静态成员（类常量）也遵循继承规则（PHP继承本质是对象），只是访问方式是由类进行访问
    public static function getcount(){
        echo self::CALL;
        echo self::$count;
    }

    protected static function gettype(){
        print_r(self::$type);
    }

}

#子类
//继承父类
class man extends Human{
    # 在子类内部增加公有访问访问继承自父类的受保护成员
    public function getprotect(){
        echo $this->age;   #访问父类受保护属性
        $this->showage();    #访问父类受保护方法
    }

    public function showpriate(){
        $this->getage();
    }

    public static function gethuman(){
        human::gettype();
        self::gettype();
    }
};

//实例化子类，没有指定构造方法

//$m = new man(); # 错误：缺少参数，因为会自动调用父类构造方法

$m = new man(100); #正确 有传参

var_dump($m);   # 可以看到父类私有属性：说明被继承
$m->showname(); # 允许直接访问：方法为公有允许类外访问



#受保护继承protected，protected关键字的产生本身就是纯用于继承的，表示允许被子类在子类内部访问的意思，而不允许被外部直接访问。

//$m->showage(); #报错 Cannot access protected property man::$testing  子类无法直接访问受保护的方法
$m->getprotect();# 输出100，表示正确访问



#访问父类私有成员：子类若想访问父类私有成员，那么前提是父类提供了能够访问私有成员的接口：即提供了公有或者受保护的方法给子类访问

$m->showpriate();# 输出100，表示正确访问


#注意：虽然子类可以通过以上方式来实现访问父类的私有成员（包括私有方法），但是从设计的意义上讲，私有就是不允许外部访问，所以父类通常不会提供对外的访问接口


#静态成员（类常量）也遵循继承规则（PHP继承本质是对象），只是访问方式是由类进行访问

man::$count;	# 允许直接访问
//man::$testing;  # 报错 Cannot access protected property man::$testing  无法访问受保护的属性

man::getcount();	# 访问父类静态方法
man::gethuman();	# 利用子类公有方法访问父类受保护成员


#构造方法和析构方法也可以被子类继承，此时需要注意子类对象实例化时对应的父类构造方法的参数



//小结


//1、继承是有限继承，理论上是用来继承父类允许被继承的部分，即使用public或者protected修饰的成员（有限继承指的是有限能用而已）
//
//2、因为对象的属性是保存在对象内存空间，所以父类的私有属性也会继承
//
//3、父类私有成员本质不允许被子类访问，但是可以通过父类开放接口实现（一般不会这么操作）
//
//4、静态成员也可以遵循继承规则
//
//5、构造方法也可以被继承，因此在实例化子类对象的时候，要考虑到父类构造方法所使用到的参数问题