<?php

define('FILE', 2);
define('DIR', './files_samples');

$folder = scandir(DIR, 1);
$files = array_filter($folder, function ($file) { return $file !== "." && $file !== ".."; });
$file = $files[FILE];

$content = base64_encode(file_get_contents(DIR."/$file"));

$fileInfo = new finfo(FILEINFO_MIME_TYPE);
$mimeType = $fileInfo->buffer(file_get_contents("data:;base64,$content"));

header("Content-Type: {$mimeType}");
header("Content-Disposition: inline; filename=\"" . $file . "\";");
echo file_get_contents("data://{$mimeType};base64,$content");

?>