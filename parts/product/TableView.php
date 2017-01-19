<?php

/**
 * Created by PhpStorm.
 * User: tao
 * Date: 1/18/2017
 * Time: 11:05 PM
 */
namespace parts\product;


class TableView {

	public $id = 'products';
	public $products = [];
	public $colspan;
	public $filters = true;
	public $header = true;
	public $pagination = true;
	public $footer = true;
	public $category = false;
	public $cols = [
		'Name', 'Rank', 'RSP', 'Margin', 'Pack<br />/Case', 'Price'
	];

	/**
	 * TableView constructor.
	 *
	 * @param array $args
	 */
	function __construct($args = []) {
		foreach ($args as $k => $v) {
			$this->{$k} = $v;
		}

		if (!$this->category) {
			$this->category = isset($_GET['category']) ? $_GET['category'] : 'alcohol';
		}

		if ($this->category == 'chill') {
			array_splice($this->cols, 1, 0, "Supplier");
			$this->dProduct = $this->assocSplice(
				$this->dProduct,
				['Supplier'=> ['McDonagh', 'Coca Cola', 'Smirnoff']],
				2);
		}

		$this->colspan = count($this->cols) + 3;

		if (!$this->products) {
			$this->generateDummyData();
		}

		return $this;
	}

	/**
	 * @param array $target
	 * @param array $item  should be ['key' => 'value']
	 * @param int $position
	 *
	 * @return array
	 */
	private function assocSplice($target, $item, $position) {

		return array_slice($target, 0, $position, true) +
		       $item +
		       array_slice($target, $position, NULL, true);
	}


	/**
	 * What's below is only used to generate dummy data, I don't think you need it
	 */

	public $minProds = 9;
	public $maxProds = 12;
	public $dProduct = [
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


	private function generateDummyData() {
		for ( $i = 0; $i < rand( $this->minProds, $this->maxProds); $i ++ ) {
			$product = $this->dProduct;
			$product['Name'] = getRand($product['Name']);
			if ($this->category == 'chill') {
				$product['Supplier'] = getRand($product['Supplier']);
			}
			$this->products[] = $product; // juice

			$string = substr($this->dProduct['id'], 0, strlen($this->dProduct['id']) -7 ) .
			          strval(intval(substr($this->dProduct['id'], -7)) + 1);
			$this->dProduct['id'] = $string;
			$this->dProduct['Details']['Code'] = strval(intval($this->dProduct['Details']['Code'] + 1));
		}
	}


}