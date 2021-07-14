<?php
//trait 为类似 PHP 的单继承语言而准备的一种代码复用机制

//* trait可以使得单继承语言摆脱为了复用而不得不继承的尴尬，让面向对象变得更加纯粹
//  * 类的继承应该本身类之间具有相似性（包含）
//  * 有些不同类型的类却拥有公共的方法
//    * 为了实现代码复用就要增加公共类，然后继承（为了继承而继承，不纯粹符合面向对象）
//    * 提供公共代码让具有共性类引入（trait）
//* trait的结构类似于类：可以有属性和方法，但不能有常量


//结构
//trait 名字 {
//    #属性 （包括静态）
//    #方法 （包含静态，抽象方法）
//}
//


//* trait是为类提供公共内容的，因此是需要在类中引入trait，从而实现公共内容的使用
//
//```php
//class 类名{
//    # 引入trait即可使用trait里定义的内容
//    use trait名字;
//}
//`

//一个类可以使用多个trait
//
//class  类名{
//    #引入trait即可使用trait的内容
//    use trait 名字1, trait 名字2 ...;
//}


//1、不同类之间有公共代码，但是类彼此关系不存在继承关系
//
//2、将公共代码抽离出来存储到trait中
//
//3、在需要使用的类中引入trait，实现公共代码复用
//
//4、如果存在抽象方法，那么引入的类要么是抽象类，要么要实现抽象方法


// 例子

//1 创建tarit
//2、trait内部可以拥有一个类能拥有成员属性（包含静态），成员方法（包含静态和抽象方法），但不能有类常量


trait Eat{
    public $name;
    protected $how;
    private $info;

    //4 trait是用来将公共代码提供给其他类使用的，而类要使用trait的前提是加载对应的trait

    public function show(){
        echo 'eat';
    }

    public function showTime(){
        echo $this->time;
    }

    protected function showHow(){
        echo $this->how;

    }

//    abstract public function abstractMethod();
//        const PI = 3.14;  #错误 trait中不能有常量


}

//3 trait是用来实现代码的复用的，不可以被实例化也不可以被继承（不是类）

//new Eat(): # 报错 没有该类



#类中加载trait
class human{
    # 加载 使用use关键字
    use Eat; # use就表示将trait Eat中的所有东西拿到了当前类Human中

}

// 使用trait中的内容

$human = new human();
$human -> show(); # eat：Human类自己本身没有show方法，但是因为使用了trait Eat，所以可用



//5 一个类可以使用多个trait

trait t1{
    public function eat(){
        echo 'eat';
    }
}

trait t2{
    public function run(){
        echo 'run';
    }
}

class man {
    use t1,t2;
    public function show(){
        $this->eat();
        $this->run();
    }
}


$man = new man();
$man->show();

//> 小结
//
//1、trait是用来解决有公共需求但是不属于同一类型里的代码复用问题（解决PHP单一继承问题）
//
//* 为了让面向对象的继承更加纯粹（符合继承关系）
//* 为了让代码的复用性变得更加强大