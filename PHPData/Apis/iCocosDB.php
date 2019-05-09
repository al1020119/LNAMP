<?php
/**
 * Created by PhpStorm.
 * User: icocos
 * Date: 2017/4/15
 * Time: 下午10:42
 */

//1.构造函数必须声明称非public,防止外部使用new操作符创建,不能再其他类中实例化,只能自身实例化
//2.拥有一个保存类的实例的静态成员变量$_instance
//3.用户一个访问这个实例的公共静态方法

class iCocosDB {

    static private $_instance;

    static private $_connectSource;
    private $_dbConfig = array(
        'dbhost' => 'localhosts:3306',  // mysql服务器主机地址
        'dbuser' => 'root',           // mysql用户名
        'dbpass' => 'ios',            // mysql用户名密码
        'database' => 'APP',
    );


    private  function _construce() {

    }

    static  public function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    public function connect() {
        if (!self::$_connectSource) {
            self::$_connectSource = mysqli_connect($this->_dbConfig['dbhost'], $this->_dbConfig['dbuser'], $this->_dbConfig['dbpass']);
            if(! self::$_connectSource )
            {
                throw new Exception('Could not connect: ' . mysqli_error());
//                die('Could not connect: ' . mysqli_error());
            }

//            echo '数据库连接成功！===============<br />';

            mysqli_select_db($this->_dbConfig['database'], self::$_connectSource);

            mysqli_query("set names UTF8", self::$_connectSource);
        }
        return self::$_connectSource;
    }
}
//
//$connect = iCocosDB::getInstance()->connect();
//if ($connect) {
//    var_dump($connect);
//}
//
//echo '<br />';
//
//$sql = "SELECT * FROM APP";
//mysqli_select_db($connect, 'APP');
//$res = mysqli_query($connect,$sql);
//echo '数据库查询成功===============<br />';
//var_dump($res);
//echo '<br />';
//echo '数据库查询结果===============<br />';
//echo mysqli_num_rows($res);

//方案一(实时性高):从数据库获取数据-封装-生成数据并返回,每次重复
//方案二(减少数据库压力):从数据库获取数据-封装-缓存数据-同时生成数据-再次获取数据的时候先从缓存获取-生成并返回数据
//方案三(适合首页定时生成数据):数据库-crontab-定时先生成-应用端Http请求直接获取生成好的数据-缓存-同时返回
