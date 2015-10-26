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
 * Question
 */
class Question extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * choices
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Choice>
	 * @cascade remove
	 */
	protected $choices = NULL;

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
		$this->choices = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the name
	 * 
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 * 
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Adds a Choice
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Choice $choice
	 * @return void
	 */
	public function addChoice(\Qinx\Qxsurvey\Domain\Model\Choice $choice) {
		$this->choices->attach($choice);
	}

	/**
	 * Removes a Choice
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Choice $choiceToRemove The Choice to be removed
	 * @return void
	 */
	public function removeChoice(\Qinx\Qxsurvey\Domain\Model\Choice $choiceToRemove) {
		$this->choices->detach($choiceToRemove);
	}

	/**
	 * Returns the choices
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Choice> $choices
	 */
	public function getChoices() {
		return $this->choices;
	}

	/**
	 * Sets the choices
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Qinx\Qxsurvey\Domain\Model\Choice> $choices
	 * @return void
	 */
	public function setChoices(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $choices) {
		$this->choices = $choices;
	}

}