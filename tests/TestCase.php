<?php

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Default preparation for each test
	 */
	public function setUp() {
		parent::setUp();
		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	 */
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	/**
	 * Prepare for tests: Migration
	 */
	private function prepareForTests() {
		Artisan::call('migrate');
	}

	protected function mock($class) {
		$mock = Mockery::mock($class);
		$this->app->instance($class, $mock);
		return $mock;
	}

}
