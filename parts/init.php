<?php session_start();
/**
 * Created by PhpStorm.
 * User: tao
 * Date: 1/11/2017
 * Time: 9:56 AM
 */

$loggedIn = include "login.php";

$modal = '';

function getRand($val) {
	return is_array($val) ? $val[rand(0, count($val)  - 1)] : $val;
}

include_once "product/TableView.php";

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

/*function initTable($args = []){

	$table = [
		'id' => 'products',
		'min-prods' => 9,
		'max-prods' => 12,
		'filters' => true,
		'header'     => true,
		'pagination' => true,
		'footer' => true,
		'products' => [],
		'colspan' => false
	];
	foreach ($args as $k => $v) {
		$table[$k] = $v;
	}

	global $defaultProduct, $category;
	$defaultProduct = isset($defaultProduct) ?
		$defaultProduct :
		[
			'id' => '5027952011316',
			'Name' => ['Glenn\'s Vodka','Spaghetti Sauce', 'Sugar for my honey','This is a very long product name ready to help us style'],
			'Rank' => '12',
			'RSP' => '12.99',
			'Margin' => '21%',
			'Pack<br />/Case' => '280g/12',
			'Price' => [
				'old' => '€20.50',
				'new' => '16.50'
			],
			'Details' => [
				'image' => '/assets/image/product.jpg',
				'Description' => 'Lorem ipsum dolor sit amet, albucius salutatus an pri, ei reque impetus fabellas sea. Ad sit congue ocurreret constituto, quaestio similique id vel. Quidam platonem intellegebat qui an. Quod repudiandae ne vel.',
				'Code' => '123456',
				'EAN' => '5027952011316',
				'TUC' => '5027952011316',
				'On order' => '13',
				'Start date' => '12/2/2016',
				'Price increase' => '14/11/2016',
				'Pallet Qty.' => '14/11/2016',
				'VAT' => '13.5%',
				'Supplier' => '14/11/2016',
				'Shelf life' => '12days'
			]
		];
	if ($category == 'chill') {
		$defaultProduct = array_slice($defaultProduct, 0, 2, true) +
	        array('Supplier' => 'McDonagh') +
	        array_slice($defaultProduct, 2, count($defaultProduct), true);
	}

	if (!$table['products']) {
		for ( $i = 0; $i < rand( $table['min-prods'], $table['max-prods'] ); $i ++ ) {
			$table['products'][] = $defaultProduct;
			$string = substr($defaultProduct['id'], 0, strlen($defaultProduct['id']) -7 ) .
			          strval(intval(substr($defaultProduct['id'], -7)) + 1);
			$defaultProduct['id'] = $string;
			$defaultProduct['Details']['Code'] = strval(intval($defaultProduct['Details']['Code'] + 1));
		}
	}

	if (!$table['colspan']) {
		$table['colspan'] = $category == 'chill' ? 10 : 9;
	}

	return $table;
}*/