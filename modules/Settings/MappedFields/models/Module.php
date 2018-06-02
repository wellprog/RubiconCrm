<?php

/**
 * Module Class for MappedFields Settings
 * @package YetiForce.Model
 * @copyright YetiForce Sp. z o.o.
 * @license YetiForce Public License 3.0 (licenses/LicenseEN.txt or yetiforce.com)
 * @author Radosław Skrzypczak <r.skrzypczak@yetiforce.com>
 */
class Settings_MappedFields_Module_Model extends Settings_Vtiger_Module_Model
{

	protected $record = false;
	public $baseTable = 'a_yf_mapped_config';
	public $mappingTable = 'a_yf_mapped_fields';
	public $baseIndex = 'id';
	public $mappingIndex = 'mappedid';
	public $listFields = [
		'tabid' => 'LBL_MODULE',
		'reltabid' => 'LBL_REL_MODULE',
		'status' => 'LBL_STATUS'
	];
	public static $allFields = [
		'tabid',
		'reltabid',
		'status',
		'conditions',
		'permissions',
		'params'
	];
	public static $step1Fields = ['status', 'tabid', 'reltabid'];
	public static $step2Fields = ['source', 'target', 'default', 'type'];
	public static $step3Fields = ['conditions',];
	public static $step4Fields = ['permissions'];
	public $name = 'MappedFields';
	public $parent = 'Settings';

	public function getCreateRecordUrl()
	{
		return 'index.php?module=MappedFields&parent=Settings&view=Edit';
	}

	public function getImportViewUrl()
	{
		return 'index.php?module=MappedFields&parent=Settings&view=Import';
	}

	public function getRecord()
	{
		return $this->record;
	}

	/**
	 * Function to get the Module/Tab id
	 * @return <Number>
	 */
	public function getId()
	{
		return \App\Module::getModuleId($this->getName());
	}

	public static function getFieldsByStep($step = 1)
	{
		switch ($step) {
			case 4:
				return self::$step4Fields;
			case 3:
				return self::$step3Fields;
			case 2:
				return self::$step2Fields;
			case 1:
			default:
				return self::$step1Fields;
		}
	}

	/**
	 * Function to get the Restricted Ui Types
	 * @return <array> Restricted ui types
	 */
	public function getRestrictedUitypes()
	{
		return [4, 51, 52, 57, 58, 69, 70];
	}

	/**
	 * Function to get the Restricted Ui Types
	 * @return <array> Restricted ui types
	 */
	public function getRecordId()
	{
		return $this->record->getId();
	}

	public static function getSupportedModules()
	{
		$restrictedModules = ['OSSMailView', 'ModComments'];
		$moduleModels = Vtiger_Module_Model::getAll([0, 2]);
		$supportedModuleModels = [];
		foreach ($moduleModels as $tabId => $moduleModel) {
			if ($moduleModel->isEntityModule() && !in_array($moduleModel->getName(), $restrictedModules)) {
				$supportedModuleModels[$tabId] = $moduleModel;
			}
		}
		return $supportedModuleModels;
	}

	/**
	 * Function to get instance
	 * @return <Settings_MappedFields_Module_Model>
	 */
	public static function getCleanInstance($moduleName = 'Vtiger')
	{

		\App\Log::trace('Entering ' . __METHOD__ . '(' . $moduleName . ') method ...');
		$handlerClass = Vtiger_Loader::getComponentClassName('Model', 'MappedFields', $moduleName);
		$mf = new $handlerClass();
		$data = [];
		$fields = self::getFieldsByStep();
		foreach ($fields as $field) {
			$data[$field] = '';
		}
		$mf->setData($data);
		$instance = new self();
		$instance->record = $mf;
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
		return $instance;
	}

	/**
	 * Function to get the value for a given key
	 * @param $key
	 * @return Value for the given key
	 */
	public function get($key)
	{
		return $this->record->get($key);
	}

	/**
	 * Function to get instance of module
	 * @param string $moduleName
	 * @return <Settings_MappedFields_Module_Model>
	 */
	public static function getInstance($moduleName = 'Settings:Vtiger')
	{

		\App\Log::trace('Entering ' . __METHOD__ . '(' . $moduleName . ') method ...');
		$moduleModel = Vtiger_Module_Model::getInstance($moduleName);
		if ($moduleModel) {
			$objectProperties = get_object_vars($moduleModel);
			$moduleModel = new self();
			foreach ($objectProperties as $properName => $propertyValue) {
				$moduleModel->$properName = $propertyValue;
			}
		}
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
		return $moduleModel;
	}

	public static function getInstanceById($recordId, $moduleName = 'Vtiger')
	{

		\App\Log::trace('Entering ' . __METHOD__ . '(' . $recordId . ',' . $moduleName . ') method ...');
		$instance = new self();
		$instance->record = Vtiger_MappedFields_Model::getInstanceById($recordId, $moduleName);
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
		return $instance;
	}

	/**
	 * Function to get mapping details
	 * @return <Array> list of mapping details
	 */
	public function getMapping()
	{
		return $this->record->getMapping();
	}

	/**
	 * Function to set mapping details
	 * @return instance
	 */
	public function setMapping($mapp = [])
	{
		$this->record->setMapping($mapp);
		return $this;
	}

	/**
	 * Function to set mapping details
	 * @return instance
	 */
	public static function getSpecialFields()
	{
		$fields = ['id' => ['name' => 'id', 'id' => 'id', 'fieldDataType' => 'reference', 'label' => 'LBL_SELF_ID', 'typeofdata' => 'SELF']];
		$models = [];
		foreach ($fields as $fieldName => $data) {
			$fieldInstane = Settings_MappedFields_Field_Model::fromArray($data);
			$models[$fieldName] = $fieldInstane;
		}
		return $models;
	}

	/**
	 * Function returns fields of module
	 * @return <Array of vtlib\Field>
	 */
	public function getFields($source = false)
	{
		\App\Log::trace('Entering ' . __METHOD__ . '() method ...');
		$moduleModel = Vtiger_Module_Model::getInstance($this->getName());
		$fields = [];
		foreach ($moduleModel->getFields() as $fieldName => $fieldModel) {
			if ($fieldModel->isActiveField() && $fieldModel->isEditable() && !in_array($fieldModel->getUIType(), $this->getRestrictedUitypes())) {
				$blockName = $fieldModel->getBlockName();
				if (!$blockName) {
					$blockName = 'LBL_NOT_ASSIGNET_TO_BLOCK';
				}
				$fields[$blockName][$fieldModel->getId()] = Settings_MappedFields_Field_Model::getInstanceFromWebserviceFieldObject($fieldModel);
			}
		}
		if ($source) {
			foreach ($this->getSpecialFields() as $fieldName => $fieldInstance) {
				$fields['LBL_NOT_ASSIGNET_TO_BLOCK'][$fieldName] = $fieldInstance;
			}
		}

		$isInventory = $moduleModel->isInventory();
		if ($isInventory) {
			$inventoryFieldModel = Vtiger_InventoryField_Model::getInstance($this->getName());
			$inventoryFields = $inventoryFieldModel->getFields();
			$blockName = 'LBL_ADVANCED_BLOCK';
			foreach ($inventoryFields as $field) {
				$fields[$blockName][$field->get('columnname')] = Settings_MappedFields_Field_Model::getInstanceFromInventoryFieldObject($field);
			}
		}
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
		return $fields;
	}

	public function deleteMapping($mappedIds)
	{
		\App\Log::trace('Entering ' . __METHOD__ . '() method ...');
		if (!is_array($mappedIds)) {
			$mappedIds = [$mappedIds];
		}
		\App\Db::getInstance()->createCommand()->delete($this->mappingTable, [$this->mappingIndex => $mappedIds])
			->execute();
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
	}

	public function delete()
	{
		return \App\Db::getInstance()->createCommand()->delete($this->baseTable, [$this->baseIndex => $this->getRecordId()])
				->execute();
	}

	public function importsAllowed()
	{
		return (new \App\Db\Query())->from($this->baseTable)
				->where(['tabid' => $this->get('tabid'), 'reltabid' => $this->get('reltabid')])
				->count();
	}

	public function save($saveMapping = false)
	{
		\App\Log::trace('Entering ' . __METHOD__ . '(' . $saveMapping . ') method ...');
		$db = \App\Db::getInstance();
		$fields = self::$allFields;
		$params = [];
		foreach ($fields as $field) {
			$value = $this->record->get($field);
			if (in_array($field, ['conditions', 'params'])) {
				$params[$field] = \App\Json::encode($value);
			} elseif (is_array($value)) {
				$params[$field] = implode(',', $value);
			} else {
				$params[$field] = $value;
			}
		}
		if (!$this->getRecordId()) {
			$db->createCommand()->insert($this->baseTable, $params)->execute();
			$this->record->set('id', $db->getLastInsertID($this->baseTable . '_id_seq'));
		} else {
			$db->createCommand()->update($this->baseTable, $params, [$this->baseIndex => $this->getRecordId()])->execute();
		}
		if ($saveMapping) {
			$stepFields = Settings_MappedFields_Module_Model::getFieldsByStep(2);
			$this->deleteMapping($this->getRecordId());
			foreach ($this->getMapping() as $mapp) {
				$params = [];
				$params[$this->mappingIndex] = $this->getRecordId();
				foreach ($stepFields as $name) {
					$params[$name] = $mapp[$name];
				}
				if ($params['source'] && $params['target']) {
					$db->createCommand()->insert($this->mappingTable, $params)->execute();
				}
			}
		}
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
		return $this->getRecordId();
	}

	/**
	 * Function transforms Advance filter to workflow conditions
	 */
	public function transformAdvanceFilterToWorkFlowFilter()
	{

		\App\Log::trace('Entering ' . __METHOD__ . '() method ...');
		$conditions = $this->get('conditions');
		$wfCondition = [];
		if (!empty($conditions)) {
			foreach ($conditions as $index => $condition) {
				$columns = $condition['columns'];
				if ($index == '1' && empty($columns)) {
					$wfCondition[] = ['fieldname' => '', 'operation' => '', 'value' => '', 'valuetype' => '',
						'joincondition' => '', 'groupid' => '0'];
				}
				if (!empty($columns) && is_array($columns)) {
					foreach ($columns as $column) {
						$wfCondition[] = ['fieldname' => $column['columnname'], 'operation' => $column['comparator'],
							'value' => $column['value'], 'valuetype' => $column['valuetype'], 'joincondition' => $column['column_condition'],
							'groupjoin' => $condition['condition'], 'groupid' => $column['groupid']];
					}
				}
			}
		}
		$this->getRecord()->set('conditions', $wfCondition);
		\App\Log::trace('Exiting ' . __METHOD__ . ' method ...');
	}

	public function import($qualifiedModuleName = false)
	{
		$id = '';
		$fileInstance = \App\Fields\File::loadFromRequest($_FILES['imported_xml']);
		if (!$fileInstance->validate() || $fileInstance->getExtension(true) !== 'xml') {
			$message = 'LBL_UPLOAD_ERROR';
		} else {
			list($id, $message) = $this->importDataFromXML($fileInstance->getPath());
		}
		return ['id' => $id, 'message' => \App\Language::translate($message, $qualifiedModuleName)];
	}

	public function importDataFromXML($uploadedXml)
	{
		$combine = ['tabid' => 'source', 'reltabid' => 'target'];
		$instances = [];
		$i = 0;
		$mapping = [];
		$xml = simplexml_load_file($uploadedXml);
		foreach ($xml as $fieldsKey => $fieldsValue) {
			if (array_key_exists($fieldsKey, $combine)) {
				$value = (int) \App\Module::getModuleId((string) $fieldsValue);
				if (empty($value)) {
					break;
				}
				$instances[$combine[$fieldsKey]] = Vtiger_Module_Model::getInstance((string) $fieldsValue);
			} elseif ($fieldsKey === 'fields') {
				foreach ($fieldsValue as $fieldKey => $fieldValue) {
					foreach ($fieldValue as $columnKey => $columnValue) {
						settype($columnKey, 'string');
						settype($columnValue, 'string');
						if (in_array($columnKey, ['default', 'type'])) {
							$mapping[$i][$columnKey] = $columnKey === 'default' ? \App\Purifier::purify($columnValue) : $columnValue;
							continue;
						}
						$fieldObject = Settings_MappedFields_Field_Model::getInstance($columnValue, $instances[$columnKey], $mapping[$i]['type']);
						if (!$fieldObject) {
							continue;
						}
						$mapping[$i][$columnKey] = $fieldObject->getId();
					}
					$i++;
				}
				continue;
			} else {
				$value = (string) $fieldsValue;
			}
			$this->getRecord()->set($fieldsKey, $value);
		}
		$tabid = $this->getRecord()->get('tabid');
		$reltabid = $this->getRecord()->get('reltabid');
		if (empty($tabid) || empty($reltabid)) {
			$message = 'LBL_MODULE_NOT_EXIST';
		} elseif (!$this->importsAllowed()) {
			$this->setMapping($mapping);
			$this->save(true);
			$message = 'LBL_IMPORT_OK';
			$id = $this->getRecordId();
		} else {
			$message = 'LBL_NO_PERMISSION_TO_IMPORT';
		}
		return [$id, $message];
	}
}
