<?php
namespace FreePBX\modules;

class Ttsengines implements \BMO {
	public function __construct($freepbx = null) {
		if ($freepbx == null) {
			throw new Exception("Not given a FreePBX Object");
		}
		$this->FreePBX = $freepbx;
		$this->db = $freepbx->Database;
	}
	public function install() {}
	public function uninstall() {}
	public function backup() {}
	public function restore($backup) {}
	public function doConfigPageInit($page) {}
	public function getActionBar($request) {
		$buttons = array();
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
		}
		return $buttons;
	}
  public function getEngine($id){
    $dbh = $this->db;
    $sql = 'SELECT * FROM ttsengines WHERE id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->execute(array(':id' => $id));
    $ret = $stmt->fetchAll(\PDO::FETCH_ASSOC);
    return $ret[0];
  }

}
