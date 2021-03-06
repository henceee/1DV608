<?php

namespace model;

require_once("model\Product.php");

class ProductCatalog {

	private $products = array();

	public function add(Product $toBeAdded) {
		foreach ($this->products as $product) {
			if ($product->getUniqueString() === $toBeAdded->getUniqueString()) {
				throw new \Exception("You cannot have two products with the same id");
			}
		}

		$key = $toBeAdded->getUniqueString();
		$this->products[$key] = $toBeAdded;
	}

	/**
	 * @return array of model\Product
	 */
	public function getProducts() {
		return $this->products;
	}

	/**
	 * @return null | model\Product
	 */
	public function getProductFromUnique($nameString) {
		if (isset($this->products[$nameString]) ) {
			return $this->products[$nameString];
		}
		return null;
	}
}