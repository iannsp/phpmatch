# Pattern Matching programming 

[![Build Status](https://travis-ci.org/iannsp/phpmatch.svg?branch=master)](https://travis-ci.org/iannsp/phpmatch)


## How to

* install: composer require 'iannsp/phpmatch'
* use: 
```php
    use phpmatch;
    use \phpmatch\Match as M;// to made easier use domains constants.
```

## Match Function

Matches start with match function. This function receive the values you need  
test the matches.

#### Simple Scalar Matching

```php
    $a = 1;
    $b = 1;
    match($a)->with($b); // true.
    match($variableUnsigned)->with(null); // true
```

#### Array Matching

```php
    $a = [1   , 2, 3];
    $b = ["anything", 2, 3];

    // because $b[0]
    match($a)->with($b); // false 

    // you can ignore $b[0] using M::_
    $c = [M::_, 2, 3];
    match($c)->with($b)); // true

    // and replace $d[0] with $b[0] using M::r
    $d = [M::r, 2, 3];
    match($d)->with($b); // true
    echo $d[0]; // "anything"

    //you can do the same with associative arrays.
    $e = ["first"=> M::r, 2, 3];
    match($e)->with(["first"=>"anything", 2, 3]);// true
    echo $e["first"]; // "anything" 

    // THE MATCH PARAM NEED BE A VARIABLE.
    match([null,2,3])->with($b); // Fatal error:Only variables can be passed by reference

```

## TODO
* Case
```php
$a = 1;
match($a)
    ->incase(   1   )->doIt(function(){ echo "a is 1";})
    ->incase([1,2,3])->doIt(function(){echo "a is array [1,2,3];});

```
* Guards 
```php
$a = 1;
match($a)
    ->incase(   1   )->when(true)->doIt(function(){ echo "a is 1";})
    ->incase([1,"y"=> M::r,3])->when($y > 10)->doIt(function(){echo "a is array [1,2,3];});

```

