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

function _getNextGap($gap) {
    $gap = $gap / 1.3;
    return $gap < 1 ? 1: $gap;
}

function _sort($in) {
    $gap = $in->count;
    $swapd = true;
    while ($gap > 1 || $swapd) {
        $gap = _getNextGap($gap);
        $swapd = false;
        for ($i = 0; $i < $in->count - $gap; $i++) {
            if ($in->arr[$i] > $in->arr[$i + $gap]) {
                [$in->arr[$i], $in->arr[$i + $gap]] = [$in->arr[$i + $gap], $in->arr[$i]];
                $swapd = true;
            }
            $in->nComp++;
        }
    }
    $in->nIter = $i + $in->nComp;
    return $in;
}

function run($as) {
    print("Série : " . utils::printArr($as));
    print("\nRésultat : " . utils::printArr(_sort($as)));
    print("\nNb de comparaison : " . $as->nComp);
    print("\nNb d'itération : " . $as->nIter);
    print("\nTemps (sec) : " . number_format((microtime(true) - $as->tStart), 2) . "\n");
}

if ($argv[1] != null) {
    $as = new algoStats();
    $as->init($argv[1]);
    run($as);
} else (
    print(utils::noArg())
)

?>