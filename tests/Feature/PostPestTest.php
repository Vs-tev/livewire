<?php

use App\Http\Livewire\CntactForm;
use App\Http\Livewire\ShowPosts;
use App\Models\Post;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    $this->user = User::factory()->create();
});

it('dashboard page contain contact form component', function () {

    actingAs($this->user)->get('/dashboard')->assertSeeLivewire('cntact-form');
});

it('user can submit form and after that form get cleared', function () {

    Livewire::test(CntactForm::class)
        ->set('name', 'Vasko')
        ->set('email', 'mail@vasko.com')
        ->set('phone', '112333')
        ->set('message', 'KJSNAdkjasndkajsdnk')
        ->call('submitForm')
        ->assertSee('We received your message successfully and will get back to you shortly!')
        ->assertSet('name', '');
});

test('check if contact form field was validated', function () {
    Livewire::test(CntactForm::class)
        ->set('name', '')
        ->set('email', 'mailvasko.com')
        ->set('phone', '1123ss33')
        ->set('message', 'asd')
        ->call('submitForm')
        ->assertHasErrors(['name' => 'required', 'email' => 'email', 'phone' => 'numeric', 'message' => 'min']);
})->group('form');

test('check if post was saved to the database and was add to the post list', function () {
    Livewire::test(ShowPosts::class)
        ->set('post', 'First post')
        ->call('addPost')
        ->assertSee('First post')
        ->assertSet('post', '');

    $this->assertTrue(Post::wherePost('First post')->exists());
})->group('post');
