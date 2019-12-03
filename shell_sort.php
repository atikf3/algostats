<?php 

class algoStats {
    public $arr;
    public $nComp;
    public $nIter;
    public $count;
    public $tStart;

    public function init($arg) {
        $this->arr = explode(";", $arg);
        $this->count = count($this->arr);
        $this->tStart = microtime(true);
        $this->nComp = 0;
        $this->nIter = 0;
        return $this;
    }
}

class utils {
    function printArr($as) {
        $src = $as->arr;
        $out = "";
        for ($i = 0; $i < $as->count; $i++) {
            $out .= $src[$i];
            if ($i + 1 != $as->count)
            $out .= ";";
        }
        return $out;
    }
    
    function noArg() {
        return "\nERROR: No arguments!\n";
    }
}


function _sort($in) {
    $N = $in->count;
    for ($gap = $N/2; $gap > 0; $gap /= 2)
       {
    for ($i = $gap; $i < $N; $i += 1)
       {

        //sort sub lists created by applying gap

$temp = $in->arr[$i];




for ($j = $i; $j >= $gap && $in->arr[$j - $gap] > $temp; $j -= $gap)

$in->arr[$j] = $in->arr[$j - $gap];

               

$in->arr[$j] = $temp;

        }

    }
    return [2, 3, 8, 2, 4];
}

function run($args) {
    $as = new algoStats();
    $as->init($args[1]);
    print("Série : " . utils::printArr($as));
    print("\nRésultat : " . utils::printArr(_sort($as)));
    print("\nNb de comparaison : " . $as->nComp);
    print("\nNb d'itération : " . $as->nIter);
    print("\nTemps (sec) : " . number_format((microtime(true) - $as->tStart), 2) . "\n");
}

if ($argv[1] != null) {
    run($argv);
} else (
    print(utils::noArg())
)

?>