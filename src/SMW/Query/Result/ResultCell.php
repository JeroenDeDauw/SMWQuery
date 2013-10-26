<?php

namespace SMW\Query\Result;

use SMWDataItem;

class ResultCell {

	/**
	 * @var SMWDataItem[]
	 */
	protected $dataItems;

	public function __construct( array $dataItems ) {
		// TODO: assert type
		$this->dataItems = $dataItems;
	}

	/**
	 * @return SMWDataItem[]
	 */
	public function getDataItems() {
		return $this->dataItems;
	}

}