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
 * Test case for class \Qinx\Qxsurvey\Domain\Model\Question.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Christian Pschorr <pschorr.christian@gmail.com>
 */
class QuestionTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \Qinx\Qxsurvey\Domain\Model\Question
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \Qinx\Qxsurvey\Domain\Model\Question();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getChoisesReturnsInitialValueForChoice() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getChoises()
		);
	}

	/**
	 * @test
	 */
	public function setChoisesForObjectStorageContainingChoiceSetsChoises() {
		$choise = new \Qinx\Qxsurvey\Domain\Model\Choice();
		$objectStorageHoldingExactlyOneChoises = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneChoises->attach($choise);
		$this->subject->setChoises($objectStorageHoldingExactlyOneChoises);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneChoises,
			'choises',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addChoiseToObjectStorageHoldingChoises() {
		$choise = new \Qinx\Qxsurvey\Domain\Model\Choice();
		$choisesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$choisesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($choise));
		$this->inject($this->subject, 'choises', $choisesObjectStorageMock);

		$this->subject->addChoise($choise);
	}

	/**
	 * @test
	 */
	public function removeChoiseFromObjectStorageHoldingChoises() {
		$choise = new \Qinx\Qxsurvey\Domain\Model\Choice();
		$choisesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$choisesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($choise));
		$this->inject($this->subject, 'choises', $choisesObjectStorageMock);

		$this->subject->removeChoise($choise);

	}
}
