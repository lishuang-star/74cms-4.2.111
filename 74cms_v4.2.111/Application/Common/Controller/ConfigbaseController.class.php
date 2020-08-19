<?php
namespace Common\Controller;
use Common\Controller\BackendController;
class ConfigbaseController extends BackendController{
	public function _initialize() {
        parent::_initialize();
    }
    public function _edit() {
        if(!IS_POST) return false;
        foreach (I('post.') as $key => $val) {
        	$val = is_array($val) ? serialize($val) : $val;
        	D('Config')->where(array('name' => $key))->save(array('value' => $val));
        }
        $type = I('post.type', 'trim', 'index');
        $this->success(L('operation_success'));
        exit;
    }
}
?>