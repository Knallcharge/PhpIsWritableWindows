# PhpIsWritableWindows

Replacement of PHP's is_writable function which does not work on Windows under certain conditions due to a PHP bug with Windows ACL (which is marked as "won't fix").

Added to the Symfony\Component\HttpFoundation\File namespace so Symfony will use it.