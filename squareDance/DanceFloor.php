<?php
include "Dancer.php";

class DanceFloor
{
    protected $boyQueue;
    protected $girlQueue;

    public function __construct()
    {
        $this->boyQueue = new SplQueue();
        $this->girlQueue = new SplQueue();
    }

    public function addDancer($name, $isBoy)
    {
        $dancer = new Dancer($name, $isBoy);
        if ($dancer->isBoy) {
            $this->boyQueue->enqueue($dancer);
        } else {
            $this->girlQueue->enqueue($dancer);
        }
    }


    public function waiting()
    {
        if ($this->boyQueue->isEmpty()) {
            return count($this->girlQueue) . ' girls waiting in line<br>';
        } else {
            if ($this->girlQueue->isEmpty()) {
                return count($this->boyQueue) . ' boys waiting in line<br>';
            }
        }
    }

    public function pairUp()
    {
        $listPair = '';
        while (!$this->boyQueue->isEmpty() && !$this->girlQueue->isEmpty()) {
            $info = $this->boyQueue->dequeue()->name . ' and ' . $this->girlQueue->dequeue()->name . ' are up!<br>';
            $listPair .= $info;
        }
        $listPair .= $this->waiting();
        return $listPair;
    }
}