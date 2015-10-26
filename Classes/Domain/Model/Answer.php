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
 * Answer
 */
class Answer extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * option
	 * 
	 * @var \Qinx\Qxsurvey\Domain\Model\Option
	 * @lazy
	 */
	protected $option = NULL;

	/**
	 * question
	 * 
	 * @var \Qinx\Qxsurvey\Domain\Model\Question
	 * @lazy
	 */
	protected $question = NULL;

	/**
	 * user
	 * 
	 * @var \Qinx\Qxsurvey\Domain\Model\User
	 * @lazy
	 */
	protected $user = NULL;

	/**
	 * Returns the option
	 * 
	 * @return \Qinx\Qxsurvey\Domain\Model\Option $option
	 */
	public function getOption() {
		return $this->option;
	}

	/**
	 * Sets the option
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Option $option
	 * @return void
	 */
	public function setOption(\Qinx\Qxsurvey\Domain\Model\Option $option) {
		$this->option = $option;
	}

	/**
	 * Returns the question
	 * 
	 * @return \Qinx\Qxsurvey\Domain\Model\Question $question
	 */
	public function getQuestion() {
		return $this->question;
	}

	/**
	 * Sets the question
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\Question $question
	 * @return void
	 */
	public function setQuestion(\Qinx\Qxsurvey\Domain\Model\Question $question) {
		$this->question = $question;
	}

	/**
	 * Returns the user
	 * 
	 * @return \Qinx\Qxsurvey\Domain\Model\User $user
	 */
	public function getUser() {
		return $this->user;
	}

	/**
	 * Sets the user
	 * 
	 * @param \Qinx\Qxsurvey\Domain\Model\User $user
	 * @return void
	 */
	public function setUser(\Qinx\Qxsurvey\Domain\Model\User $user) {
		$this->user = $user;
	}

}