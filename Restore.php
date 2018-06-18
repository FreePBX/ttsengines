<?php
namespace FreePBX\modules\Ttsengines;
use FreePBX\modules\Backup as Base;
class Restore Extends Base\RestoreBase{
  public function runRestore($jobid){
      $configs = $this->getConfigs();
      foreach ($configs as $engine) {
        $this->FreePBX->Ttsengines->add($engine['name'],$engine['path']);
      }
  }
}