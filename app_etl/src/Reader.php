<?php

namespace src;

class Reader
{
    private $file;
    private $directory;

    public function getFile()
    {
        return $this->file;
    }
    public function setFile($file)
    {
        $this->file = $file;
    }
    public function getDiretory()
    {
        return $this->directory;
    }
    public function setDiretory($directory)
    {
        $this->directory = $directory;
    }

    public function readerFile()
    {
        
    }

}