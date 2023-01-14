<?php
namespace Game\Board;

final class Log {

    public static function info(string $message = ""): void {
    echo $message .  PHP_EOL;
    }
}
?>