<?php

namespace SMW\Tests\Query\Result;

use SMW\Query\Result\ResultCell;

/**
 * @covers SMW\Query\Result\ResultCell
 *
 * @group SMWQuery
 * @group SMWExtension
 */
class ResultCellTest extends \PHPUnit_Framework_TestCase {

	public function testConstructor() {
		$dataItems = array();

		$instance = new ResultCell( $dataItems );
		$this->assertEquals( $dataItems, $instance->getDataItems() );

	}

}