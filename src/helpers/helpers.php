<?php

use Illuminate\Support\Carbon;
use App\Models\User;

if ( ! function_exists('carbon') )
{
    /**
     * Shortcut for: new Carbon or Carbon::parse()	// from calebporzio/awesome-helpers
     *
     * @return Carbon\Carbon
     *
     */
	function carbon(...$args)
	{
    	return new Carbon(...$args);
	}
}

/**
 * Shortcut for: auth()->user()	// from calebporzio/awesome-helpers
 */
if ( ! function_exists('user') )
{
	function user()
	{
		return auth() -> user();
	}
}

if ( ! function_exists('number') )
{
	function number($number, $decimals = 0, $dec_point = ',')
	{
		return number_format($number, $decimals, $dec_point, ' ');
	}	
}

if ( !function_exists('file_size') )
{

    /**
     * format bytes into human readable format
     *
     * @param int $bytes
     * @param int $decimals
     * 
     * @return string
     */
    function file_size($bytes, $decimals = 2)
    {
        $units = ['B', 'kB', 'MB', 'GB', 'TB'];
        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        // calculate bytes
        $bytes /= pow(1024, $pow);

        // return the bytes
        return round($bytes, $decimals) .' '. $units[$pow];
    }
}
