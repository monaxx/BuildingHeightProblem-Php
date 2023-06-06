<?php
class Grid{
    private $gridSize;
    private $topValues;
    private $rightValues;
    private $bottomValues;
    private $leftValues;
    private $myGridValues;

    public function __construct(int $gridSize, array $topValues, array $rightValues, array $bottomValues, array $leftValues){
        $this->gridSize = $gridSize;
        $this->topValues = $topValues;
        $this->rightValues = $rightValues;
        $this->bottomValues = $bottomValues;
        $this->leftValues = $leftValues;

        // Initialize 2d array to 0
        for ($i = 0; $i < $gridSize; $i++) {
            $this->myGridValues[$i] = array();
            for ($j = 0; $j < $gridSize; $j++) {
                $this->myGridValues[$i][$j] = 0;
            }
        }

    }

    private function checkTop():bool{
        for($col = 0;$col < $this->gridSize; $col++){
            $min = -1;
            $count = 0;
            for($row = 0;$row < $this->gridSize; $row++){
                if($min < $this->myGridValues[$row][$col]){
                    $min = $this->myGridValues[$row][$col];
                    $count++;
                }
            }
            if($count != $this->topValues[$col]){
                return false;
            }
        }
        return true;
    }

    private function checkRight():bool{
        for($row = 0;$row < $this->gridSize; $row++){
            $min = -1;
            $count = 0;
            foreach(array_reverse($this->myGridValues[$row]) as $val){
                if($min < $val){
                    $min = $val;
                    $count++;
                }
            }
            if($count != $this->rightValues[$row]){
                return false;
            }
        }
        return true;
    }

    private function checkBottom():bool{
        for($col = 0;$col < $this->gridSize; $col++){
            $min = -1;
            $count = 0;
            for($row = $this->gridSize - 1; $row >= 0; $row--){
                if($min < $this->myGridValues[$row][$col]){
                    $min = $this->myGridValues[$row][$col];
                    $count++;
                }
            }
            if($count != $this->bottomValues[$col]){
                return false;
            }
        }
        return true;
    }
    
    private function checkLeft():bool{
        for($row = 0;$row < $this->gridSize; $row++){
            $min = -1;
            $count = 0;
            foreach($this->myGridValues[$row] as $val){
                if($min < $val){
                    $min = $val;
                    $count++;
                }
            }
            if($count != $this->leftValues[$row]){
                return false;
            }
        }
        return true;
    }

    public function showSolution():void{
        $count = 0;
        while(!$this->checkLeft() or !$this->checkRight() or !$this->checkTop() or !$this->checkBottom()){
            for ($i = 0; $i < $this->gridSize; $i++) {
                for ($j = 0; $j < $this->gridSize; $j++) {
                    $this->myGridValues[$i][$j] = rand(1,$this->gridSize);
                }
            }
            $count++;
            if($count == 10000000){
                break;
            }
        }

        if($count == 10000000){
            echo 'Max number of iterations(10000000) reached, no solution found <br>';
        }else{
            echo 'Solution: <br/><br/>';
            for ($i = 0; $i < $this->gridSize; $i++) {
                for ($j = 0; $j < $this->gridSize; $j++) {
                    echo $this->myGridValues[$i][$j] . ' ';
                }
                echo '<br/>';
            }
        }
    }
}
?>