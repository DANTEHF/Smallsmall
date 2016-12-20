<?php
/**
 * Created by PhpStorm.
 * User: John
 * Date: 2016/7/8
 * Time: 16:52
 */
include 'Person.php';

class  test
{

    public function getName(Person $person)
    {
            echo $person->name."--".$person->age;

    }


}

class handle
{

    function __construct()
    {
        $this->person=new Person();

        $reflect= new ReflectionMethod('test','getName');

        $param=$reflect->getParameters();
         $count=sizeof($param);
        if($count>0)
        {
             $param1=$param[0];
            if($param1->getClass()->name == 'Person')
            {

                $reflect->invokeArgs(new test(), array($this->person));//执行了test里的getName方法

            }


        }



    }

}
new handle();

