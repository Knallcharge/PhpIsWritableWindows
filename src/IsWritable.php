<?php
declare(strict_types=1);

namespace Symfony\Component\HttpFoundation\File;

/**
 * @param $file
 *
 * @return bool
 */
function is_writable($file): bool
{
    if (!file_exists($file)) {
        return false;
    }

    if (is_file($file)) {
        $f = @fopen($file, 'ab');
        if (fclose($f)) {
            return true;
        }
    } elseif (is_dir($file)) {
        $file = realpath($file) . DIRECTORY_SEPARATOR . uniqid((string)mt_rand(), true) . '.tmp';
        $f    = @fopen($file, 'a');
        if ($f === false) {
            return false;
        }
        fclose($f);
        @unlink($file);
        return true;
    }

    return false;
}
