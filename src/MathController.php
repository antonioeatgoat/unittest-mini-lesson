<?php

namespace AntonioEatGoat\UnittestLesson;


class MathController {

	/**
	 * @var Math
	 */
	private $math_factory;

	/**
	 * MathController constructor.
	 *
	 * @param MathFactory $math_factory
	 */
	public function __construct( MathFactory $math_factory ) {
		$this->math_factory = $math_factory;
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
	public function calculate( ):float {
		$operand1 = $this->fetch_operand1();
		$operand2 = $this->fetch_operand2();

		$math = $this->math_factory->create( $operand1, $operand2 );

		return $math->divide();
	}

	/**
	 * Let's pretend there is some logic here that fetches a relevant value
	 *
	 * @return int
	 */
	private function fetch_operand1(): int {
		return 5;
	}

	/**
	 * Let's pretend there is some logic here that fetches a relevant value
	 *
	 * @return int
	 */
	private function fetch_operand2() {
		return 2;
	}

}