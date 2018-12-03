<?php

$directives_definition = [
    '@if(' => ' <?php if(',
    '@closeif' => '){ ?> ',
    '@else' => ' <?php }else{ ?> ',
    '@php' => ' <?php ',
    '@endphp' => ' ?> ',
    '@endif' => ' <?php } ?> ',
    '@include' => '<?php echo View::viewIncludes',
    ';' => '; ?>'
];


$directives = array_keys($directives_definition);

?>