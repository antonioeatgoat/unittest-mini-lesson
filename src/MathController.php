<?php

namespace AntonioEatGoat\UnittestLesson;


class MathController {

	/**
	 * @var Math
	 */
	private $math_factory;

	/**
	 * @var OperandsFetcher
	 */
	private $operands_fetcher;

	/**
	 * MathController constructor.
	 *
	 * @param MathFactory $math_factory
	 */
	public function __construct( MathFactory $math_factory, OperandsFetcher $operands_fetcher ) {
		$this->math_factory     = $math_factory;
		$this->operands_fetcher = $operands_fetcher;
	}

	/**
	 * Inits the hooks of the controller
	 */
	public function init_hooks() {
		add_action( 'admin_notices', [ $this, 'display_result' ], 10, 2 );
	}

	/**
	 * Displays the result in a notice
	 */
	public function display_result() {
		try {
			$result = $this->calculate();
		} catch ( \Exception $e ) {
			$result = $e->getMessage();
		}

		include 'templates/notice.php';
	}

	/**
	 * @return float
	 *
	 * @throws \RuntimeException
	 */
	public function calculate(): float {
		$operand1 = $this->operands_fetcher->fetch_operand1();
		$operand2 = $this->operands_fetcher->fetch_operand2();

		if ( current_user_can( 'manage_options' ) ) {
			$operand1 = $operand1 * 2;
		}

		$math = (float) apply_filters( 'antonioeatgoat/calculate_return_value', $this->math_factory->create( $operand1, $operand2 ) );

		return $math->divide();
	}

}