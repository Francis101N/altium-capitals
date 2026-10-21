<?php
$dir = __DIR__ . '/uploads';

header('Content-Type: text/plain');

echo "PHP user: ";
if (function_exists('posix_geteuid') && function_exists('posix_getpwuid')) {
    $info = posix_getpwuid(posix_geteuid());
    echo $info['name'] ?? 'Unknown';
} else {
    echo 'Cannot determine (POSIX functions unavailable)';
}

echo "\nUpload directory: $dir";
echo "\nDirectory exists: " . (is_dir($dir) ? 'YES' : 'NO');
echo "\nPHP writable check: " . (is_writable($dir) ? 'YES' : 'NO');

$file = $dir . '/permission_test.txt';
$result = @file_put_contents($file, 'test');

echo "\nActual write test: " . ($result !== false ? 'SUCCESS' : 'FAILED');

if ($result !== false) {
    unlink($file);
}
