<?php


use PHPUnit\Framework\TestCase;
use App\Support\Arr;

class ArrTest extends TestCase
{
	/** @test */
	public function it_tests_something()
	{
		$arr =  new Arr();
		$this->assertEmpty($arr->get());

	}

	/** @test */
	public function array_equal()
	{
		$arr = new Arr([
			'one', 'two', 'three'
		]);
		
		$this->assertEquals($arr->count(), 3);
	}

	/** @test */
	public function items_returned_match_items_passed_in()
	{
		$arr = new Arr([
			'one', 'two'
		]);

		$this->assertCount(2, $arr->get());
		$this->assertEquals($arr->get()[0], 'one');
		$this->assertEquals($arr->get()[1], 'two');

	}

	/** @test */
	public function collection_is_instance_of_iterator_aggregate()
	{
		$arr = new Arr([
			'one', 'two'
		]);

		$this->assertInstanceOf(IteratorAggregate::class, $arr);

	}

	/** @test */
	public function collection_can_be_iterated()
	{
		$arrs = new Arr([
			'one', 'two','three'
		]);

		$items = [];

		foreach ($arrs as $arr) {
			$items[] = $items;
		}

		$this->assertCount(3, $items);
		$this->assertInstanceOf(ArrayIterator::class, $arrs->getIterator());
	}


	/** @test */
	public function collection_can_be_merged_with_another_collection()
	{
		$collection1 = new Arr(['one','two']);
		$collection2 = new Arr(['three','four','five']);

		$collection1->merge($collection2);

		$this->assertCount(5, $collection1->get());
		$this->assertEquals(5, $collection1->count());

	}

	/** @test */
	public function return_json_encoded_items()
	{
		$collection = new Arr([
			['username' => 'alex'],
			['username' => 'billy']
		]);
		$this->assertInternalType('string', $collection->toJson());
		$this->assertEquals('[{"username":"alex"},{"username":"billy"}]', $collection->toJson());
	}


	
}