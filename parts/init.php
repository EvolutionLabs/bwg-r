<?php session_start();
/**
 * Created by PhpStorm.
 * User: tao
 * Date: 1/11/2017
 * Time: 9:56 AM
 */

$loggedIn = include "login.php";

function getRand($val) {
	return is_array($val) ? $val[rand(0, count($val)  - 1)] : $val;
}

function makeSlug($name) {

	$rule = 'NFD; [:Nonspacing Mark:] Remove; NFC';
	$myTrans = \Transliterator::create($rule);
	$name = $myTrans->transliterate($name);
	$name = strtolower($name);

	preg_match_all('([a-z0-9]+)', $name, $matches);
	if (is_array($matches) && isset($matches[0]) && count($matches[0])) {
		return implode('-', $matches[0]);
	}
	else
		return null;
}