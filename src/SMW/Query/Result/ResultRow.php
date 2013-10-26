<?php

namespace SMW\Query\Result;

class ResultRow {

	/**
	 * @var ResultCell[]
	 */
	protected $resultCells;

	public function __construct( array $resultCells ) {
		// TODO: assert type
		$this->resultCells = $resultCells;
	}

	/**
	 * @return ResultCell[]
	 */
	public function getResultCells() {
		return $this->resultCells;
	}

}