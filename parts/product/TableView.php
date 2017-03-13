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
    public $minProds = 50;
    public $maxProds = 50;
	public $cols = [
		'Name', 'RSP', 'Margin', 'Pack<br />/Case', 'Price'
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
			$this->category = isset($_GET['category']) ? $_GET['category'] : 'bond';
		}

		if ($this->category == 'chill') {
			array_splice($this->cols, 1, 0, "Supplier");
			$this->dProduct = $this->assocSplice(
				$this->dProduct,
				['Supplier'=> ['McDonagh', 'Coca Cola', 'Smirnoff']],
				2);
		}


		$this->colspan = count($this->cols) + 3;

		foreach (['filters', 'header', 'footer', 'pagination'] as $part) {
			if (
				($p = $this->{$part}) &&
				($p[0] === '%') && ($p[strlen($p) -1] === '%') &&
				method_exists($this, substr($this->{$part}, 1, -1))
			) {
				$method = substr($this->{$part}, 1, -1);
				$this->{$part} = $this->{$method}();
			}
		}

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
	public function assocSplice($target, $item, $position) {

		return array_slice($target, 0, $position, true) +
		       $item +
		       array_slice($target, $position, NULL, true);
	}

	/**
	 * Example custom method to be used as wildcard instead of any table part, like this
	 *  $table = [
	 *    ...
	 *    'header' => '%cartHeader%'
	 *    ...
	 *  ]
	 */
	public function cartHeader() {

		global $cartList; // let's use a variable defined in view
		$h = $cartList;
		/**
		 * the wrapper below makes the header full row width. If you'd rather have control
		 * over each cell inside $h, just wrap it in <tr> and <thead> and return it
		 */
		return '<div class="cartHeader">' .
		       '<h4>'.$h['name'].'</h4>' .
		       '</div>';
	}

	public function mnmFooter(){
		return '<tfoot><tr><td colspan="'.$this->colspan.'"><div class="cartFooter"></div></td></tr></tfoot>';
	}

	public static function getRand($val) {
        return is_array($val) ? $val[rand(0, count($val)  - 1)] : $val;
    }


	/**
	 * Example custom method to be used as wildcard instead of any table part, like this
	 *  $table = [
	 *    ...
	 *    'footer' => '%cartFooter%'
	 *    ...
	 *  ]
	 */
	public function cartFooter() {
		global $cartList;
		$f = '<div class="cartFooter">' .
	       '<span>Percentage of current Order: <em>'.$cartList['percent'].'</em></span>' .
		     $cartList['cases'].' case' . ( $cartList['cases'] > 1 ? 's' : '' ) .
		     ' | ' .
		     '€'.$cartList['amount'] .
		     '</div>';
		/**
		 * the wrapper below makes the footer full row width. If you'd rather have control
		 * over each cell inside $f, just wrap it in <tr> and <tfoot> and return it
		 */
		return '<tfoot><tr><td colspan="'.$this->colspan.'"><div class="tdWrapper">' .
		       $f .
		       '</div></td></tr></tfoot>';
	}


	/**
	 * The properties and functions below are only used to generate dummy data,
	 * I don't think you'll need them in production.
	 */

	public $dProduct = [
		'id' => '5027952011316',
		'Name' => ['Glenn\'s Vodka','Spaghetti Sauce', 'Sugar for my honey','This is a very long product name ready to help us style'],
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
			$product['Name'] = self::getRand($product['Name']);
			if ($this->category == 'chill') {
				$product['Supplier'] = self::getRand($product['Supplier']);
			}
			$this->products[] = $product; // juice

			$string = substr($this->dProduct['id'], 0, strlen($this->dProduct['id']) -7 ) .
			          strval(intval(substr($this->dProduct['id'], -7)) + 1);
			$this->dProduct['id'] = $string;
			$this->dProduct['Details']['Code'] = strval(intval($this->dProduct['Details']['Code'] + 1));
		}
	}

	public function mixAndMatch(){
        $this->generateDummyData();
        return $this->products;
    }

}