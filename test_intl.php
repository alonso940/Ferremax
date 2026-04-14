<?php
if(class_exists('\NumberFormatter')){
    $f = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
    echo $f->format(140.66) . "\n";
    echo "INTL OK";
} else {
    echo "NO INTL";
}
