<?php

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

use Illuminate\Foundation\Auth\User as Authenticatable;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

// Uses the given test case and trait in the current folder recursively
uses(TestCase::class, RefreshDatabase::class)->in(__DIR__);

/**
 * Set the currently logged in user for the application.
 *
 * @return TestCase
 */

//Logged user
function actingAs(Authenticatable $user, string $driver = null)
{
    return test()->actingAs($user, $driver);
}

function get(string $url)
{
    return test()->get($url);
}
