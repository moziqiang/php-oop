<?php

//**trait同名**：一个类中可能需要引入多个trait，而不同trait中可能出现同名
//
//* trait同名分为两类
//
//  * 属性同名：不允许出现同名属性，不管是多个trait还是类内部出现同名属性（除非同名同值）
//
//
//
//
//  * 方法同名
//    * 不允许同名出现，使用替代方法：确定要用的那个


//结构
//use trait名1, trait名2 ...{
//    trait名1::方法名 instanceof trait名2;
//}


//* ​		不允许同名出现，使用别名，让两个都可以用（使用别名前需要先替代）
//
//use trait名1,trait名2...{
//    trait名2::方法名 insteadof trait名1;		# trait1::方法名无用
//    trait名1::方法名 as 别名;				   # trait1::方法可用（别名使用）
//}
//```


// 步骤
//
//1、定义多个trait，里面存着同名方法
//
//2、在某个类中引入多个trait
//
//3、同名冲突后
//
//* 使用insteadof明确需要用的那个
//* 使用别名临时修改同名中的一个


//1、trait同名属性必须同值，否则报错

trait t1{
    public $name = true;
    public $age = 0;

    public function eat(){
        echo 't1,eat';
    }

}

trait t2{
    public $name = true;
    public $age = 1;

    public function eat(){
        echo 't2,eat';
    }
}

# 此时上述没问题，没被引入类，所以不冲突

class human{
//    use t1,t2; # 致命错误：age冲突（name同名但同值没问题）


//2 如果同时引入的多个trait中有同名方法，那么会产生冲突

//    use t1,t2; # 错误：eat()方法冲突
}




//3、解决冲突的方法1：使用insteadof代替处理：明确使用具体哪个trait的方法


class person{
    use t1,t2{					# 花括号
        t2::eat insteadof t1;	# t2的eat代替t1的eat
    }
}

$p = new person();

$p ->eat();


//4、解决冲突的方法2：使用别名处理：保证两个方法都能使用

class girl{
    use t1,t2{
        t1::eat insteadof t2; #t1的eat代替t2的eat

        t2::eat as t2_eat_show; # t2的eat变成t2_eat_show
    }
}

$g = new girl();
$g->eat(); # 访问t1,eat
$g->t2_eat_show();  # 访问t2,eat


//1、trait同名概率出现较小，但是要警惕出现同名
//
//2、trait同名处理
//
//* 属性不允许同名，只能改成不同的名字
//* 方法可以进行同名处理
//  * 只需要用到其中一个：使用insteadof代替，明确使用一个（另外一个失效）
//  * 需要用到两个：使用别名改变名字使用（使用别名前也要先明确使用哪个，别名另外一个即可）
//
//3、如果出现同名，那么要考虑选择什么样的方式来解决