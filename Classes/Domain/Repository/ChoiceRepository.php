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
	 * Returns the enabled fields for the repository class
	 *
	 * @param string table name
	 * @param string optional alias
	 * @return string
	 */
	public function getEnabledFieldString($table, $alias = null) {
		$enabledFields = $GLOBALS['TSFE']->sys_page->enableFields($table);

		if($alias !== null) {
			$enabledFields = str_replace($table, $alias, $enabledFields);
		}

		return $enabledFields;
	}

	/**
	 * Returns the count of answers for this choice
	 *
	 * @param \Qinx\Qxsurvey\Domain\Model\Choice $uid
	 * @return int
	 */
	public function findAnswerCount($choice) {
		$return = 0;
		$query	= $this->createQuery();

		if($choice instanceof \Qinx\Qxsurvey\Domain\Model\Choice) {
			$choice = $choice->getUid();
		}

// kann vorerst nicht mehr in TYPO3 7 verwendet werden
//		$statement = 'SELECT COUNT(a.uid) as total FROM tx_qxsurvey_domain_model_answer AS a
//			WHERE a.choice = ?
//				AND a.pid IN ?' . $this->getEnabledFieldString('tx_qxsurvey_domain_model_answer', 'a');
//
//		$result = $query
//			->statement($statement, array(1))
//			->execute(true);

		$statement = $GLOBALS['TYPO3_DB']->prepare_SELECTquery(
			'COUNT(a.uid) as total',
			'tx_qxsurvey_domain_model_answer AS a',
			'a.choice = :uid AND a.pid IN (:pid)' . $this->getEnabledFieldString('tx_qxsurvey_domain_model_answer', 'a'));
		$statement->execute(array(':uid' => $choice, ':pid' => implode(',', $query->getQuerySettings()->getStoragePageIds())));

		$result = $statement->fetch();

		if(isset($result['total']) === true) {
			$return = (int) $result['total'];
		}

		return $return;
	}
}