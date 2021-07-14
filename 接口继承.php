<?php


//* 接口继承接口的目的
//  * 实现接口的成员扩展：丰富接口内容，从而实现更好的对实现类的规范
//  * 为了形成完成的接口体系，让不同级别的类实现不同级别的接口
//* 接口可以一次性继承多个接口

interface a{}
interface b{}

#接口继承

interface c extends a{}

#接口多继承

interface d extends a,b{}


//例子

//1、数据库设计规范：使用接口
//
//* 为了规范所有数据库表的操作，设定接口方法：所有的数据库操作都必须使用规定的接口

interface DB{
    public function insert(string $sql);
    public function update(string $sql);
    public function delete(string $sql);
    public function select(string $sql);
}

//考虑到操作的便捷性，需要使用到自动新增、自动查询、自动修改，因此增加一个下级接口，继承原有接口
interface AutoDB extends DB{
    public function autoInsert(array $data,int $id);

    public function autoUpdate(array $data,int $id);

    public function autoSelect(array $condition);
}


//封装数据库操作类：实现接口（基础数据库类，实现基础操作）

class SQL implements DB{
    public function __construct(){
        # 初始化数据库连接认证、字符集、数据库选择
    }

    public function insert(string $sql){
        # 实现新增
    }

    public function update(string $sql){
        # 实现更新
    }

    public function delete(string $sql){
        # 实现删除
    }

    public function select(string $sql){
        # 实现查询
    }
}

// 业务数据库操作类：继承数据库操作类SQL并实现便捷业务操作


class Model extends SQL implements AutoDB{
    # 初始化操作已经由SQL完成，只需要实现AutoDB的自动操作\

    public function autoInsert(array $data, int $id){
        # 实现自动构造新增SQL指令，调用父类的insert方法实现
    }
}
