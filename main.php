<?php
class add_animals{
    public $barn = [];
    function add_cow($num){
        if ($num<100000){
            for($i = 1; $i <= $num; $i++){
                $cow = 100000 + $i;
                array_push($this->barn, $cow);
            }
        } else{
            echo "упс, слишком много коров для данного хлева((";
        }
    }
    function add_chicken($num){
        if ($num<100000){
            for($i = 1; $i <= $num; $i++){
                $chicken = 200000 + $i;
                array_push($this->barn, $chicken);
            }
        } else{
            echo "упс, слишком много куриц для данного хлева((";
        }
    }
}

class collection extends add_animals{
    public $milk = 0;
    public $eggs = 0;
    public $log ='';
    function extract(){
        foreach($this->barn as $animal){
            switch(substr($animal,0,1)){
                case 1:
                    $collect = rand(8,12);
                    $this->milk += $collect;
                    $this->log .= "cow ".$animal." gave ".$collect." L\n";
                    break;
                case 2:
                    $collect = rand(0,1);
                    $this->eggs += $collect;
                    $this->log .= "chicken ".$animal." gave ".$collect." Egg\n";
                    break;
            }
        }
        echo 'получено '.$this->milk.' литров молока и '.$this->eggs.' яиц';
    }
}

$collection = new collection();
$collection->add_cow(7);
$collection->add_chicken(15);
$collection->extract();
$file = fopen("log.txt", 'w');
fwrite($file, $collection->log);
fclose($file);

?>