<?php
namespace FreePBX\modules\Ttsengines;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
	public function runRestore(){
			$configs = $this->getConfigs();
			foreach ($configs as $engine) {
				$this->FreePBX->Ttsengines->addById($engine['id'],$engine['name'],$engine['path']);
			}
	}

	public function processLegacy($pdo, $data, $tables, $unknownTables){
		$this->restoreLegacyDatabase($pdo);
	}
}
