<?php
require_once('config.php');
require_once(SMARTY_DIR . 'Smarty.class.php');

class Smarty_Oj extends Smarty {

   function __construct()
   {
        parent::__construct();
        $this->setTemplateDir('/home/oj_web/templates/');
        $this->setCompileDir('/home/oj_web/templates_c/');
        $this->setConfigDir('/home/oj_web/configs/');
        $this->setCacheDir('/home/oj_web/cache/');
        $this->caching = Smarty::CACHING_LIFETIME_CURRENT;
   }
}

?>
