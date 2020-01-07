<?php 

class algoStats {
    public $arr;
    public $nComp;
    public $count;
    public $tStart;

    public function init($arg) {
        $this->arr = explode(";", $arg);
        $this->count = count($this->arr);
        $this->tStart = microtime(true);
        $this->nComp = 0;
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

function _merge($g ,$d) {
    global $as;
    $ret = array();
    while (sizeof($g) > 0 && sizeof($d) > 0) {
        if ($g[0] > $d[0]) {
            $ret[] = $d[0];
            $d = array_slice($d, 1);
        } else {
            $ret[] = $g[0];
            $g = array_slice($g, 1);
        }
        $as->nComp += 1;
    }
    while (sizeof($g) > 0) {
        $ret[] = $g[0];
        $g = array_slice($g, 1);
    }
    while (sizeof($d) > 0) {
        $ret[] = $d[0];
        $d = array_slice($d, 1);
    }
    return $ret;
}

function _sort($in) {
    $arr = array();
    if (gettype($in) == "object") {
        $arr = $in->arr;
    } else {
        $arr = $in;
    }
    if (sizeof($arr) == 1) {
        return $arr;
    }
    $m = round(count($arr) / 2, PHP_ROUND_HALF_DOWN);
    $g = array_slice($arr, 0 ,$m);
    $d = array_slice($arr, $m);
    $g = _sort($g);
    $d = _sort($d);
    return _merge($g, $d);
}

function run($as) {
    print("Série : " . utils::printArr($as));
    $as->arr = _sort($as);
    print("\nRésultat : " . utils::printArr($as));
    print("\nNb de comparaison : " . $as->nComp);
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