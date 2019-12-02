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
    for ($i = 1; $i < $in->count; $i++) {
        $ky = $in->arr[$i];
        $j = $i - 1;
        while ($j >= 0 && $in->arr[$j] > $ky) {
            $in->arr[$j + 1] = $in->arr[$j];
            $j = $j - 1;
            $in->nComp += $i;
        }
        $in->nIter += $i;
        $in->arr[$j + 1] = $ky;
    }
    return $in;
}

function run($args) {
    $as = new algoStats();
    $tStart = microtime(true);
    $as->init($args[1]);
    print("Série : " . utils::printArr($as));
    print("\nRésultat : " . utils::printArr(_sort($as)));
    print("\nNb de comparaison : " . $as->nComp);
    print("\nNb d'itération : " . $as->nIter);
    print("\nTemps (sec) : " . number_format((microtime(true) - $tStart), 2) . "\n");
}

if ($argv[1] != null) {
    run($argv);
} else (
    print(utils::noArg())
)

?>