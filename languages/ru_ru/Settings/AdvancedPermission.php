<?php
/**
 * AdvancedPermission russian translation
 * @package YetiForce.Languages
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 */
$languageStrings = [
	'LBL_ADVANCED_PERMISSION' => 'Расширенные настройки доступа',
	'AdvancedPermission' => 'Расширенные настройки доступа',
	'LBL_ADVANCED_PERMISSION_DESCRIPTION' => 'Пользовательская конфигурация разрешений, выдавайте право доступа к записям или лишайте его.',
	// Fields
	'LBL_NAME' => 'Название правила',
	'LBL_MODULE' => 'Модуль',
	'LBL_ACTION' => 'Действие',
	'LBL_STATUS' => 'Статус',
	'LBL_ROLE' => 'Роль',
	'LBL_MEMBERS' => 'Участники',
	'LBL_PRIORITY' => 'Приоритет',
	// Picklist
	'FL_ACTIVE' => 'Активно',
	'FL_INACTIVE' => 'Неактивно',
	'FL_UNLOCK_RECORD' => 'Дать доступ',
	'FL_LOCK_RECORD' => 'Лишить доступа',
	// Others
	'LBL_SAVE_AND_CONDITIONS' => 'Далее',
	'ERR_INACTIVE_ALERT_TITLE' => 'Расширенные настройки доступа отключены',
	'ERR_INACTIVE_ALERT_DESC' => 'Измените параметр  PERMITTED_BY_ADVANCED_PERMISSION  в файле config/security.php , чтобы включить.',
	'LBL_RECALCULATE_PERMISSION_TITLE' => 'Пересчет разрешений',
	'LBL_RECALCULATE_PERMISSION_BTN' => 'Пересчитать разрешения',
	'LBL_RECALCULATE_CRON_INFO' => 'Для запуска пересчёта разрешений требуется CRON, пожалуйста, проверьте, является ли данное задание активным',
	'LBL_MODULES_LIST' => 'Список модулей',
	'ERR_INACTIVE_CACHING_PERM_ALERT_DESC' => 'Особые разрешения были отключены, поскольку они требуют кэширования записей разрешений. Чтобы разрешения начали работать, настройте CRON и задайте переменную  CACHING_PERMISSION_TO_RECORD [config/security.php] значение true.',
];
