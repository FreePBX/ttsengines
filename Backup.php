<?php
namespace FreePBX\modules\Ttsengines;
use FreePBX\modules\Backup as Base;
class Backup Extends Base\BackupBase{
  public function runBackup($id,$transaction){
    $configs = $this->FreePBX->Ttsengines->listAll();
    $this->addConfigs($configs);
  }
}