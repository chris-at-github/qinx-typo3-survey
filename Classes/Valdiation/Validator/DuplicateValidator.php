<?php
namespace Fc\FcProducts\Validation\Validator;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2009 Jochen Rau <jochen.rau@typoplanet.de>
 *  (c) 2011 Bastian Waidelich <bastian@typo3.org>
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

class InquiryValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator {

	/**
	 * Validierung zur Ueberpruefung des Startdatums einer Schulung
	 *
	 * @param array $inquiry
	 * @return boolean TRUE if blog could be validated, otherwise FALSE
	 */
	public function isValid($inquiry) {
		if(empty($inquiry['name']) === true) {
			$this->addError('Please enter a valid name', 1393255558);
		}

		if(empty($inquiry['email']) === true) {
			$this->addError('Please enter a valid email', 1393255576);
		}

		return true;
	}

}
?>