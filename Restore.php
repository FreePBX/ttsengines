<?php
namespace FreePBX\modules\Ttsengines;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
      $configs = $this->getConfigs();
      foreach ($configs as $engine) {
        $this->FreePBX->Ttsengines->addById($engine['id'],$engine['name'],$engine['path']);
      }
  }

  public function processLegacy($pdo, $data, $tables, $unknownTables, $tmpfiledir){
    $tables = array_flip($tables+$unknownTables);
    if(!isset($tables['ttsengines'])){
      return $this;
    }
    $bmo = $this->FreePBX->Ttsengines;
    $bmo->setDatabase($pdo);
    $configs = $bmo->listAll();
    $bmo->resetDatabase();
    foreach ($configs as $engine) {
      $bmo->add($engine['name'], $engine['path']);
    }
    return $this;
  }

}