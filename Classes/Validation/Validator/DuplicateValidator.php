<?php
namespace Qinx\Qxsurvey\Validation\Validator;

class DuplicateValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * objectManager
	 *
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	protected $objectManager;

	/**
	 * return an instance of objectManager
	 *
	 * @return \TYPO3\CMS\Extbase\Object\ObjectManager
	 */
	public function getObjectManager() {
		if(($this->objectManager instanceof \TYPO3\CMS\Extbase\Object\ObjectManager) === false) {
			$this->objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
		}

		return $this->objectManager;
	}

	/**
	 * Checks if a email adresse already in use
	 *
	 * @param array $email
	 * @return boolean true if email not in database outerwise false
	 */
	public function isValid($email) {
		if($this->getObjectManager()->get('Qinx\\Qxsurvey\\Domain\\Repository\\UserRepository')->countByEmail($email) !== 0) {
			$this->addError('Mail alreay in use', 1446616769);
			return false;
		}

		return true;
	}
}
?>