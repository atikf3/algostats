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
    static function printArr($as) {
        $src = $as->arr;
        $out = "";
        for ($i = 0; $i < $as->count; $i++) {
            $out .= $src[$i];
            if ($i + 1 != $as->count)
            $out .= ";";
        }
        return $out;
    }
    
    static function noArg() {
        return "\nERROR: No arguments!\n";
    }
}

function _sort($in) {
    $my_array = $in->arr;
    $taille = $in->count;
    $i = $j = 0;
    for ($i; $i < $taille; $i++) {
        $tmp = $my_array[$i];
        $pos = $i;
        $in->nComp++;
        while ($pos > 0 && $my_array[$pos - 1] > $tmp) {
            $my_array[$pos] = $my_array[$pos - 1];
            $pos = $pos - 1;
            $in->nComp++;
        }
        $my_array[$pos] = $tmp;
    }
    $in->nIter += $i;
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