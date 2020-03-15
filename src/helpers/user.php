<?php

/**
 * Shortcut for: auth()->user() // from calebporzio/awesome-helpers
 */
if (! function_exists('user')) {
    function user()
    {
        return auth() -> user();
    }
}
