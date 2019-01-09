<?php


namespace App\Support;
use IteratorAggregate;
use ArrayIterator;
use Collection;

class Arr implements IteratorAggregate 
{
	protected $arr = [];

	public function __construct(array $aa=[])
	{
		$this->arr = $aa;
	}


	public function get()
	{
		return $this->arr;
	}

	public function count()
	{
		return count($this->arr);

	}

	public function add(array $items)
	{
		$this->arr = array_merge($this->arr, $items);
	}

	public function merge(Arr $collection)
	{
		return $this->add($collection->get());
	}

	public function getIterator()
	{
		return new ArrayIterator($this->arr);	
	}
	public function toJson()
	{
		return json_encode($this->arr);	
	}
}