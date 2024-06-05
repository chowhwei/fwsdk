<?php

namespace FreeWil\Munin;

class Wrapper
{
    static public function runSpark(array $argv, string $path): void
    {
        $params = explode('_', basename($argv[0]));
        $task = implode(':', $params);
        $params = array_merge([$task], array_slice($argv, 1));
        $command = "php spark " . implode(' ', $params);

        chdir($path);
        exec($command, $out);
        if (is_array($out) && count($out) >= 3) {
            $out = array_slice($out, 3);
        }
        foreach ($out as $line) {
            echo $line, "\n";
        }
    }
}