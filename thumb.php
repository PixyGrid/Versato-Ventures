<?php
/* Versato gallery thumbnail generator — resizes + caches images on the fly.
   Usage: thumb.php?src=img/gallery/muhurtham/photo.jpg&w=600  */

$src = isset($_GET['src']) ? (string)$_GET['src'] : '';
$w   = isset($_GET['w']) ? (int)$_GET['w'] : 600;
$w   = max(120, min(1600, $w));

// --- security: only serve files inside img/gallery/ ---
$src = str_replace('\\', '/', $src);
if ($src === '' || strpos($src, '..') !== false || strpos($src, 'img/gallery/') !== 0) {
    http_response_code(400); exit;
}
$path = __DIR__ . '/' . $src;
if (!is_file($path)) { http_response_code(404); exit; }

// --- if GD isn't available, just serve the original so nothing breaks ---
if (!function_exists('imagecreatetruecolor')) {
    header('Location: ' . $src); exit;
}

$cacheDir = __DIR__ . '/img/gallery/_thumbs';
if (!is_dir($cacheDir)) { @mkdir($cacheDir, 0755, true); }
$cache = $cacheDir . '/' . $w . '_' . md5($src) . '.jpg';

// serve cached copy if fresh
if (is_file($cache) && filemtime($cache) >= filemtime($path)) {
    header('Content-Type: image/jpeg');
    header('Cache-Control: public, max-age=31536000');
    readfile($cache); exit;
}

$info = @getimagesize($path);
if (!$info) { header('Location: ' . $src); exit; }

switch ($info[2]) {
    case IMAGETYPE_JPEG: $img = @imagecreatefromjpeg($path); break;
    case IMAGETYPE_PNG:  $img = @imagecreatefrompng($path);  break;
    case IMAGETYPE_WEBP: $img = @imagecreatefromwebp($path); break;
    default: header('Location: ' . $src); exit;
}
if (!$img) { header('Location: ' . $src); exit; }

$ow = imagesx($img); $oh = imagesy($img);
$scale = min(1, $w / $ow);
$nw = max(1, (int)round($ow * $scale));
$nh = max(1, (int)round($oh * $scale));

$dst = imagecreatetruecolor($nw, $nh);
// flatten any transparency onto white
$white = imagecolorallocate($dst, 255, 255, 255);
imagefilledrectangle($dst, 0, 0, $nw, $nh, $white);
imagecopyresampled($dst, $img, 0, 0, 0, 0, $nw, $nh, $ow, $oh);
@imagejpeg($dst, $cache, 82);
imagedestroy($img); imagedestroy($dst);

header('Content-Type: image/jpeg');
header('Cache-Control: public, max-age=31536000');
if (is_file($cache)) { readfile($cache); } else { readfile($path); }
