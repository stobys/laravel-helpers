<?php

use Faker\Factory as Faker;

if (! function_exists('carbon')) {
	function faker($locale = 'pl_PL')
	{
	    return Faker::create($locale);
	}
}
