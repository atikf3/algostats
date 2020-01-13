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
    $arr = [];
    global $as;
    if (gettype($in) == "object")
        $arr = $in->arr;
    else
        $arr = $in;
    $c = count($arr);
    if ($c <= 1)
        return $arr;
    $div = $arr[0];
    $l = $r = [];

    for ($i = 1; $i < $c; $i++) {
        if ($arr[$i] <= $div)
            $l[] = $arr[$i];
        else
            $r[] = $arr[$i];
        $as->nComp += 1;
    }

    $r = _sort($r);
    $l = _sort($l);

    return array_merge($l, [$div],$r);
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