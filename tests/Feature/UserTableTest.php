<?php

namespace Tests\Feature;

use App\Http\Livewire\Pagination;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

test('page contain pagination component', function () {
    actingAs($this->user)->get('/pagination')->assertSeeLivewire('pagination');
})->group('pagination-test');


test('search work correctly if user exists', function () {

    $user = User::factory()->create(['name' => 'Janna']);

    Livewire::test(Pagination::class)
        ->set('search', 'Janna')
        ->assertSee($user->name);
})->group('search-in-table');

test('datatable active checkbox work correctly', function () {

    $user = User::factory()->create(['active' => true]);

    Livewire::test(Pagination::class)
        ->assertSee($user->name)
        ->set('active', false)
        ->assertDontSee($user->name);
})->group('checkbox-active');

test('datatable sort name asc correctly', function () {

    $userA = User::factory()->create(['name' => 'Anna']);
    $userB = User::factory()->create(['name' => 'Berky']);
    $userC = User::factory()->create(['name' => 'Cristo']);

    Livewire::test(Pagination::class)
        ->call('sortBy', 'name')
        ->assertSeeInOrder(['Anna', 'Berky', 'Cristo']);
})->group('sort-asc-table');

test('datatable sort name desc correctly', function () {

    $userA = User::factory()->create(['name' => 'Anna']);
    $userB = User::factory()->create(['name' => 'Berky']);
    $userC = User::factory()->create(['name' => 'Cristo']);

    Livewire::test(Pagination::class)
        ->call('sortBy', 'name')
        ->call('sortBy', 'name')
        ->assertSeeInOrder(array_reverse(['Anna', 'Berky', 'Cristo']));
})->group('sort-desc-table');
