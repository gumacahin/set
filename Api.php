<?php

/**
 * SeTutorials
 * 
 * @category SeTutorials
 * @package SeTutorials_Api
 * @version 4.0.0
 * @license http://www.opensource.org/licenses/MIT
 * @copyright 2012 author
 * @author Marco Enrico <mvalviar@gmail.com> 
 */
class SeTutorials_Api
{
  /**
   * The singleton Api object
   * 
   * @var SeTutorials_Api
   */
  protected static $_instance;

  /**
   * __construct 
   * 
   * @return void
   */
  private function __construct()
  {
  }
  
  /**
   * getInstance 
   * 
   * @return SeTutorials_Api
   */
  public static function getInstance()
  {
    if (!self::$_instance) {
      self::$_instance = new self;
    }
    return self::$_instance;
  }

  /**
   * _ 
   * 
   * @return SeTutorials_Api
   */
  public static function _()
  {
    return self::getInstance();
  }

  /**
   * initViewHelperPath 
   * 
   * @return SeTutorials_Api
   */
  public function initViewHelperPath()
  {
    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('viewRenderer');
    $view = $viewRenderer->view;
    if( is_null($view) )
    {
      return $this;
      //throw new Zend_Application_Exception("Could not get an instance of the view object");
    }

    $path = $this->_getLibraryPath() . '/View/Helper/';
    $prefix = 'SeTutorials_View_Helper_';
    $view->addHelperPath($path, $prefix);

    return $this;
  }

  /**
   * _getLibraryPath 
   * 
   * @return string
   */
  protected function _getLibraryPath()
  {
    $manifest = require_once dirname(__FILE__) . '/manifest.php';
    return APPLICATION_PATH . '/' . $manifest['package']['path'];
  }
}
