<?php

class dboperation
{
    public $con,$res;

    function __construct()
    {
        $this->con=mysqli_connect("localhost","root","","db_artgallery");

        if(!$this->con)
        {
            die("Connection Failed: ".mysqli_connect_error());
        }
    }

    public function executequery($sql)
    {
        $this->res=mysqli_query($this->con,$sql);
        return $this->res;
    }
}

?>