<?php

namespace AntonioEatGoat\UnittestLesson;


class Math {

	/**
	 * @var int
	 */
	private $operand1;
	/**
	 * @var int
	 */
	private $operand2;

	/**
	 * Math constructor.
	 *
	 * @param int $operand1
	 * @param int $operand2
	 */
	public function __construct( int $operand1, int $operand2 ) {
		$this->operand1 = $operand1;
		$this->operand2 = $operand2;
	}

	/**
	 * @return int
	 */
	public function sum(): int {
		return $this->operand1 + $this->operand2;
	}

	/**
	 * @return int
	 */
	public function subtract(): int {
		return $this->operand1 - $this->operand2;
	}

	/**
	 * @return int
	 */
	public function multiply(): int {
		return $this->operand1 * $this->operand2;
	}

	/**
	 * @return float
	 *
	 * @throws \RuntimeException
	 */
	public function divide(): float {
		if( 0 === $this->operand2 ) {
			throw new \RuntimeException( 'Wrong operation: you cannot divide by 0.' );
		}

		return round( $this->operand1 / $this->operand2, 2 );
	}
}