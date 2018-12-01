<?php

$directives_definition = [
    '@if' => ' <?php if',
    '@close' => '{ ?> ',
    '@else' => ' <?php }else{ ?> ',
    '@php' => ' <?php ',
    '@endphp' => ' ?> ',
    '@endif' => ' <?php } ?> '
];


$directives = array_keys($directives_definition);

?>