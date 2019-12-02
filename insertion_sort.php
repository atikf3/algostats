<?php 

class utils {
    function printArr($src, $n) {
        $out = "";
        for ($i = 0; $i < $n; $i++) {
            $out .= $src[$i];
            if ($i + 1 != $n)
            $out .= ";";
        }
        return $out;
    }
    
    function noArg() {
        return "\nERROR: No arguments!\n";
    }
}

function _sort($in, $n) {
    for ($i = 1; $i < $n; $i++) {
        $ky = $in[$i];
        $j = $i - 1;
        while ($j >= 0 && $in[$j] > $ky) {
            $in[$j + 1] = $in[$j];
            $j = $j - 1;
        }
        $in[$j + 1] = $ky;
    }
    return $in;
}

function run($args) {
    $tStart = microtime(true); 
    $src = explode(";", $args[1]);
    $n = count($src);
    print("Série : " . utils::printArr($src, $n));
    print("\nRésultat : " . utils::printArr(_sort($src, $n), $n));
    print("\nTemps (sec) : " . number_format((microtime(true) - $tStart), 2) . "\n");
}

if ($argv[1] != null) {
    run($argv);
} else (
    print(utils::noArg())
)

?>