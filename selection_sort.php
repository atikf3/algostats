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
    $my_array = $in->arr;
    $taille = $in->count;
    $iter = 0;
    $nComp = 0;
    for ($i = 0; $i < $taille - 1; $i++) {
        $min = $i;
        $nComp++;
        for ($j = $i + 1; $j < $taille; $j++) {
            $iter++;
            if ($my_array[$j] < $my_array[$min]) {
                $min = $j;
            }
            $nComp++;
        }
        if ($min != $i) {
            $tmp = $my_array[$min];
            $my_array[$min] = $my_array[$i];
            $my_array[$i] = $tmp;
        }
    }
    $in->nIter = $iter;
    $in->nComp = $nComp + $iter + 1;
    $in->arr = $my_array;
    return $in;
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