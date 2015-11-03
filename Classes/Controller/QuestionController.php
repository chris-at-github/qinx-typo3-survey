<?php
namespace Qinx\Qxsurvey\Controller;


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
 * QuestionController
 */
class QuestionController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * questionRepository
	 * 
	 * @var \Qinx\Qxsurvey\Domain\Repository\QuestionRepository
	 * @inject
	 */
	protected $questionRepository = NULL;

	/**
	 * action index
	 * 
	 * @return void
	 */
	public function indexAction() {
		if(empty($this->settings['question']) === false) {
			$this->view->assign('question', $this->questionRepository->findByUid((int) $this->settings['question']));
		}
	}

	/**
	 * action save
	 *
	 * @param \Qinx\Qxsurvey\Domain\Model\Question $question
	 * @param \Qinx\Qxsurvey\Domain\Model\Choice $choice
	 * @param \Qinx\Qxsurvey\Domain\Model\User $user
	 * @return void
	 */
	public function saveAction(\Qinx\Qxsurvey\Domain\Model\Question $question, \Qinx\Qxsurvey\Domain\Model\Choice $choice, \Qinx\Qxsurvey\Domain\Model\User $user) {
		$repository	= $this->objectManager->get('\Qinx\Qxsurvey\Domain\Repository\AnswerRepository'); /* @var $repository \Qinx\Qxsurvey\Domain\Repository\AnswerRepository */
		$answer 		= $this->objectManager->get('\Qinx\Qxsurvey\Domain\Model\Answer'); /* @var $answer \Qinx\Qxsurvey\Domain\Model\Answer */

		$answer->setQuestion($question);
		$answer->setChoice($choice);
		$answer->setUser($user);

		$repository->add($answer);
 }
}