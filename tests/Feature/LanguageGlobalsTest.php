<?php

use Inertia\Testing\AssertableInertia;
use App\Http\Middleware\HandleInertiaRequests;
use Illuminate\Support\Arr;

it('contains the current selected language', function (){
    app()->setLocale('en');
    $this->get('/')
    ->assertInertia(function (AssertableInertia $page){
        $page->where('language', 'en');
    });
});

it('contains a list of available languages', function () {
    $this->get('/')
    ->assertInertia(function (AssertableInertia $page){
        $page->where('languages.0.value', 'en')
            ->where('languages.0.label', 'English')
            ->where('languages.1.value', 'de')
            ->where('languages.1.label', 'Deutsch');
    });
});

it('contains all translations', function() {
  $this->get('/')
  ->assertInertia(function(AssertableInertia $page) {
    expect(Arr::get($page->toArray(), 'props.translations'))->toMatchArray([
        'auth.failed' => 'These credentials do not match our records.'
    ]);
  });
});