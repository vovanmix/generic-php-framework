<?php

/**
 * @return \App\Infrastructure\Container
 */
function getContainer(): \App\Infrastructure\Container {
    return \App\Infrastructure\Container::getInstance();
}

/**
 * @return \Lib\Infrastructure\DependencyInjector
 */
function getDI(): \Lib\Infrastructure\DependencyInjector {
    return \Lib\Infrastructure\DependencyInjector::getInstance();
}


function debug(){
    array_map(function ($x) {
        (new \Illuminate\Support\Debug\Dumper())->dump($x);
    }, func_get_args());
}

if (! function_exists('dd')) {
    /**
     * Dump the passed variables and end the script.
     *
     * @param  mixed
     * @return void
     */
    function dd()
    {
        array_map(function ($x) {
            (new \Illuminate\Support\Debug\Dumper())->dump($x);
        }, func_get_args());

        die(1);
    }
}