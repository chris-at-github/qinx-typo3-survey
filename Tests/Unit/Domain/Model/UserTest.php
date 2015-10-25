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
 * Test case for class \Qinx\Qxsurvey\Domain\Model\User.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christian Pschorr <pschorr.christian@gmail.com>
 */
class UserTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Qinx\Qxsurvey\Domain\Model\User
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Qinx\Qxsurvey\Domain\Model\User();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail() {
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnswerReturnsInitialValueForAnswer() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAnswer()
		);
	}

	/**
	 * @test
	 */
	public function setAnswerForObjectStorageContainingAnswerSetsAnswer() {
		$answer = new \Qinx\Qxsurvey\Domain\Model\Answer();
		$objectStorageHoldingExactlyOneAnswer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAnswer->attach($answer);
		$this->subject->setAnswer($objectStorageHoldingExactlyOneAnswer);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAnswer,
			'answer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAnswerToObjectStorageHoldingAnswer() {
		$answer = new \Qinx\Qxsurvey\Domain\Model\Answer();
		$answerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$answerObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answer', $answerObjectStorageMock);

		$this->subject->addAnswer($answer);
	}

	/**
	 * @test
	 */
	public function removeAnswerFromObjectStorageHoldingAnswer() {
		$answer = new \Qinx\Qxsurvey\Domain\Model\Answer();
		$answerObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$answerObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($answer));
		$this->inject($this->subject, 'answer', $answerObjectStorageMock);

		$this->subject->removeAnswer($answer);

	}
}
