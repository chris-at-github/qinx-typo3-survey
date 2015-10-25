<?php
namespace Qinx\Qxsurvey\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2015 Christian Pschorr <pschorr.christian@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * User
 */
class User extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * email
	 * 
	 * @var string
	 */
	protected $email = '';

	/**
	 * answer
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Answer>
	 * @lazy
	 */
	protected $answer = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 * 
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->answer = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the email
	 * 
	 * @return string $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * Sets the email
	 * 
	 * @param string $email
	 * @return void
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * Adds a Answer
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Answer $answer
	 * @return void
	 */
	public function addAnswer(\Qinx\Qxsurvey\Domain\Model\Answer $answer) {
		$this->answer->attach($answer);
	}

	/**
	 * Removes a Answer
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Answer $answerToRemove The Answer to be removed
	 * @return void
	 */
	public function removeAnswer(\Qinx\Qxsurvey\Domain\Model\Answer $answerToRemove) {
		$this->answer->detach($answerToRemove);
	}

	/**
	 * Returns the answer
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Answer> $answer
	 */
	public function getAnswer() {
		return $this->answer;
	}

	/**
	 * Sets the answer
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Answer> $answer
	 * @return void
	 */
	public function setAnswer(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $answer) {
		$this->answer = $answer;
	}

}