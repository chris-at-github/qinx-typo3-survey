<?php
namespace Qinx\Qxsurvey\Domain\Repository;

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
 * The repository for Choices
 */
class ChoiceRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Returns the count of answers for this choice
	 *
	 * @param int|\Qinx\Qxsurvey\Domain\Model\Choice $uid
	 * @return int
	 */
	public function findAnswerCount($choice) {
		$return 	= 0;
		$matches	= array();
		$query		= $this->createQuery();

		if($choice instanceof \Qinx\Qxsurvey\Domain\Model\Choice) {
			$choice = $choice->getUid();
		}

		$statement = 'SELECT COUNT(a.uid) as total FROM tx_qxsurvey_domain_model_answer AS a
			WHERE a.choice = ?
				AND a.pid IN ?
				AND a.hidden = 0
				AND a.deleted = 0';
		$query->statement($statement, array($choice, $query->getQuerySettings()->getStoragePageIds()));

		var_dump($query->execute(true));
//
//		$query->getQuerySettings()->setReturnRawQueryResult(true);
	}
}