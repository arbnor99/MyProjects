<?php
spl_autoload_register(function ($class) {

    $prefix = 'App\\';
    $base_dir = __DIR__ . '/';
    $len = strlen($prefix);
	
    if (strncmp($prefix, $class, $len) !== 0) { // nese prefixi i klases nuk eshte 'App\\'
        return;
    }

    $relative_class = substr($class, $len);     // heqi 4 simbolet e para te stringut $class dhe ruaji ne $relative_class pjesen e mbetur
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';   // ne variablen $file e ruan pathin e fajllit qe ka emrin sikuse klasa te cilen e permban

    if (file_exists($file)) {
        require $file;
    }
});
?>