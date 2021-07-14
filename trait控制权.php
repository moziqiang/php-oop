<?php


//**trait控制权**：trait在引入类后，可以根据实际类的需求修改trait中对应方法的控制权（只针对当前引入类）
//
//*

//* trait可以通过as关键字直接修改权限
//


// 结构
//
//trait trait名字 {
//    protected function 方法名(){
//
//    }
//}
//
//class 类名{
//    use trait名字{
//        方法名 :: 访问修饰限定符;
//    }
//}

//* trait中允许通过修改方法的别名来实现权限的改变
//
//```php
//trait trait名字{
//    protected function 方法名(){}
//}
//
//class 类名{
//    use trait名字{
//        方法名 as 限访问修饰限定符 别名;	# 注意，虽然用了别名，原名依然可用
//    }
//}
//```


///> 步骤
//
//1、定义trait并设定方法
//
//2、定义类引入trait
//
//3、如果必要：修改权限
//
//* 直接修改
//* 使用别名




//例子

//直接修改权限：将trait里的方法改成其他级别控制

trait t1{
    public function sleep(){
        echo 't1:sleep';
    }
}

class human{
    use t1{
        sleep as private;
    }

    public function show(){
        $this->sleep();
    }
}


$h = new human();
$h->show();
//$h->sleep();  # 错误：不可访问


//通过别名修改权限：本质只限定了别名，没有改变原来的方式

trait t2{

    public function t2_sleep(){
        echo 't2.sleep';

    }
}

class test_t2{

    use t2{
        t2_sleep as private t2;
    }

    public function t2_show(){
        $this->t2_sleep();
        $this->t2();
    }
}

$t = new test_t2();

$t->t2_show(); # 输出t2.sleep;

$t->t2_sleep(); # 输出t2.sleep;

//$t->t2(); #错误输出


// 总结

//1、trait提供的方法，可以在被类引入后根据实际的需求修改控制权
//
//2、别名修饰修改控制权只会修改别名方法本身，不影响原trait方法自身的控制权