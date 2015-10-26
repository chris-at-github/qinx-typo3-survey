<?php

namespace Qinx\Qxsurvey\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Christian Pschorr <pschorr.christian@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \Qinx\Qxsurvey\Domain\Model\Answer.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christian Pschorr <pschorr.christian@gmail.com>
 */
class AnswerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Qinx\Qxsurvey\Domain\Model\Answer
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Qinx\Qxsurvey\Domain\Model\Answer();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getOptionReturnsInitialValueForOption() {
		$this->assertEquals(
			NULL,
			$this->subject->getOption()
		);
	}

	/**
	 * @test
	 */
	public function setOptionForOptionSetsOption() {
		$optionFixture = new \Qinx\Qxsurvey\Domain\Model\Option();
		$this->subject->setOption($optionFixture);

		$this->assertAttributeEquals(
			$optionFixture,
			'option',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getQuestionReturnsInitialValueForQuestion() {
		$this->assertEquals(
			NULL,
			$this->subject->getQuestion()
		);
	}

	/**
	 * @test
	 */
	public function setQuestionForQuestionSetsQuestion() {
		$questionFixture = new \Qinx\Qxsurvey\Domain\Model\Question();
		$this->subject->setQuestion($questionFixture);

		$this->assertAttributeEquals(
			$questionFixture,
			'question',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUserReturnsInitialValueForUser() {
		$this->assertEquals(
			NULL,
			$this->subject->getUser()
		);
	}

	/**
	 * @test
	 */
	public function setUserForUserSetsUser() {
		$userFixture = new \Qinx\Qxsurvey\Domain\Model\User();
		$this->subject->setUser($userFixture);

		$this->assertAttributeEquals(
			$userFixture,
			'user',
			$this->subject
		);
	}
}
