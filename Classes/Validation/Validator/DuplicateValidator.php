<?php
namespace Qinx\Qxsurvey\Validation\Validator;

class DuplicateValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * Checks if a email adresse already in use
	 *
	 * @param array $email
	 * @return boolean true if email not in database outerwise false
	 */
	public function isValid($email) {


		$this->addError('Mail alreay in use', 1446616769);

		return false;
	}
}
?>