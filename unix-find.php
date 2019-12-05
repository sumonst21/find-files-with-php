<?php
/**
 * find files matching a pattern
 * using unix "find" command
 *
 * @return array containing all pattern-matched files
 *
 * @param string $dir     - directory to start with
 * @param string $pattern - pattern to search
 */
function find($dir, $pattern){
    // escape any character in a string that might be used to trick
    // a shell command into executing arbitrary commands
    $dir = escapeshellcmd($dir);
    // execute "find" and return string with found files
    $files = shell_exec("find $dir -name '$pattern' -print");
    // create array from the returned string (trim will strip the last newline)
    $files = explode("\n", trim($files));
    // return array
    return $files;
}
