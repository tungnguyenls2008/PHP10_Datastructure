<?php
include "Dancer.php";
class DanceFloor
{
protected $danceFloor=[];
protected $boyQueue;
protected $girlQueue;
public function __construct()
{
    $this->boyQueue=new SplQueue();
    $this->girlQueue=new SplQueue();
}
public function addDancer($name,$isBoy){
    $dancer=new Dancer($name,$isBoy);
    return array_push($this->danceFloor,$dancer);
}
public function separateByGender(){

    for ($i=0;$i<count($this->danceFloor);$i++){
        $isThisABoy=$this->danceFloor[$i]->isBoy;
        if ($isThisABoy){
             $this->boyQueue->enqueue($this->danceFloor[$i]->name);
        }
        else $this->girlQueue->enqueue($this->danceFloor[$i]->name);
    }
}
public function pairUp(){
    while(!$this->boyQueue->isEmpty()||!$this->girlQueue->isEmpty()){
        if ($this->boyQueue->isEmpty()){
            return count($this->girlQueue).' girls waiting in line<br>';
        }else if ($this->girlQueue->isEmpty()){
            return count($this->boyQueue).' boys waiting in line<br>';
        }
        echo $this->boyQueue->dequeue().' and '.$this->girlQueue->dequeue().' are up!<br>';


    }
    return 'End of the line!<br>';
}
}