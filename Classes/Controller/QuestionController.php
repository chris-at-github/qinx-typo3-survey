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
	protected $questionRepository = null;

	/**
	 * deactivate error flash messages
	 *
	 * @see Tx_Extbase_MVC_Controller_ActionController::getErrorFlashMessage()
	 */
	protected function getErrorFlashMessage() {
		return false;
	}

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
	 * @param \Qinx\Qxsurvey\Domain\Model\Answer $answer
	 * @param \Qinx\Qxsurvey\Domain\Model\User $user
	 * @return void
	 */
	public function saveAction(\Qinx\Qxsurvey\Domain\Model\Answer $answer, \Qinx\Qxsurvey\Domain\Model\User $user) {
		$this->objectManager->get('\Qinx\Qxsurvey\Domain\Repository\AnswerRepository')->add(
			$answer->setUser($user)
		);
//
//		$this->addFlashMessage('ok');
//		$this->redirect('index');
 }
}