<?php

use Illuminate\Support\Carbon;

if (! function_exists('carbon')) {
    /**
     * Shortcut for: new Carbon or Carbon::parse()  // from calebporzio/awesome-helpers
     *
     * @return Carbon\Carbon
     *
     */
    function carbon(...$args)
    {
        return new Carbon(...$args);
    }
}
