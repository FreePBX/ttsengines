<?php
namespace FreePBX\modules;
use BMO;
use FreepBX_Helpers;
use PDO;

class Ttsengines extends FreePBX_Helpers implements BMO {

    public function install() {
        $entry = $this->Database->query("SELECT name FROM ttsengines where name = 'flite'");
        if(!$entry){
            $this->Database->query("INSERT INTO ttsengines (name, path) values('flite', '/usr/bin/flite')");
        }
    }
        
	public function uninstall() {}
    public function doConfigPageInit($page) {}
        
	public function getActionBar($request) {
		$buttons = array();
		if(!isset($_GET['view']) || $_GET['view'] != 'form'){
			return $buttons;
		}
		switch($request['display']) {
			case 'ttsengines':
				$buttons = array(
					'delete' => array(
						'name' => 'delete',
						'id' => 'delete',
						'value' => _('Delete')
					),
					'reset' => array(
						'name' => 'reset',
						'id' => 'reset',
						'value' => _('Reset')
					),
					'submit' => array(
						'name' => 'submit',
						'id' => 'submit',
						'value' => _('Submit')
					)
				);
				if (empty($request['edit'])) {
					unset($buttons['delete']);
				}
            break;
            default:
                $buttons = [];
            break;
		}
		return $buttons;
	}
  public function getEngine($id){
    $sql = 'SELECT * FROM ttsengines WHERE id = :id';
    $stmt = $this->FreePBX->Database->prepare($sql);
    $stmt->execute(array(':id' => $id));
    $ret = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $ret[0];
  }
	public function ajaxRequest($command, &$setting) {
        if($command === 'getJSON'){
            return true;
        }
        return false;
    }
    
	public function ajaxHandler(){
        if($_REQUEST['command'] === 'getJSON' && $_REQUEST['jdata'] === 'grid') {
            return $this->listAll();
        }
        return false;
    }
    
	public function listAll(){
		$sql = "SELECT * FROM ttsengines";
		$stmt = $this->FreePBX->Database->prepare($sql);
		$stmt->execute();
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($name, $path){
        $sql = "INSERT INTO ttsengines (name, path) values(:name, :path)";
        $stmt = $this->FreePBX->Database->prepare($sql);
        $stmt->execute([
            ':name' => $name,
            ':path' => $path,
        ]);
        return $this;
    }

    public function delete($name, $path){
        $sql = "DELETE FROM ttsengines WHERE id = :id";
        $stmt = $this->FreePBX->Database->prepare($sql);
        $stmt->execute([
            ':id' => $id,
        ]);
        return $this;
    }

    public function update($id, $name, $path){
        $sql = "UPDATE ttsengines SET name = :name, path = :path WHERE id = :id";
        $stmt = $this->FreePBX->Database->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':name' => $name,
            ':path' => $path,
        ]);
        return $this;
    }
    
	public function getRightNav($request) {
		if(isset($request['view'])){
			return load_view(__DIR__.'/views/rnav.php');
		}
    }
    
}
