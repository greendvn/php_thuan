<?php


class arrayMannager
{
    public $pathFile;
    public function __construct($pathFile)
    {
        $this->pathFile = $pathFile;
    }
    public function add($number){
        $arrayNumbers = $this->getArray();
        array_push($arrayNumbers,$number);
        $this->saveDataToFile($arrayNumbers);
    }

    public function getArray(){
        $dataJson = file_get_contents($this->pathFile);
        return json_decode($dataJson,true);
    }
    public function saveDataToFile($arrayNumbers){
        $dataJson = json_encode($arrayNumbers);
        file_put_contents($this->pathFile,$dataJson);
    }


}