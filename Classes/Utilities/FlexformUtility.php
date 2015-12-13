<?php
namespace Qinx\Qxsurvey\Utilities;

	/***************************************************************
	 *  Copyright notice
	 *
	 *  (c) 2012 Christian Pschorr <c.pschorr@datamints.com>, datamints GmbH
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
 *
 *
 * @package fc_products
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class FlexformUtility {
	public function getQuestions($config, $parent) {
		$config['items'] = array(
			array(0 => '', 1 => 0)
		);

		$GLOBALS['TYPO3_DB']->debugOuput = 2;
		$GLOBALS['TYPO3_DB']->store_lastBuiltQuery = true;

		$result	= $GLOBALS['TYPO3_DB']->exec_SELECTquery(
			'uid, name',
			'tx_qxsurvey_domain_model_question',
			'1 = 1' . \TYPO3\CMS\Backend\Utility\BackendUtility::deleteClause('tx_qxsurvey_domain_model_question')
		);

		if($GLOBALS['TYPO3_DB']->sql_num_rows($result)) {
			while($row = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($result)){
				$config['items'][] = array(0 => $row['name'], 1 => $row['uid']);
			}
		}

		return $config;
	}

	protected function getFlexformValue($flexform, $key, $sheet = 'sDEF', $lang = 'lDEF', $value = 'vDEF') {
		$arr = \TYPO3\CMS\Core\Utility\GeneralUtility::xml2array($flexform);
		if(is_array($arr) === true && isset($arr['data'][$sheet][$lang][$key]) === true) {
			return $arr['data'][$sheet][$lang][$key][$value];
		}

		return null;
	}
}
?>