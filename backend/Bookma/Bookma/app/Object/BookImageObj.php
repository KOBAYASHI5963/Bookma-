<?php

namespace App\Object;


class BookImageObj
{
    private $id;
    private $file;
    private $deleteflag;

    function __construct($id, $file, $deleteflag){
      $this->id = $id;
      $this->file = $file;
      $this->deleteflag = $deleteflag;
    }

    public function getId()
    {
        return $this->id;
    }
    public function getFile()
    {
        return $this->file;
    }
    public function getDeleteFlag()
    {
        return $this->deleteflag;
    }
}
