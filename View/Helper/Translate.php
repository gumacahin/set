<?php
/**
 * SeTutorials
 * 
 * @category SeTutorials
 * @package SeTutorials_View_Helper_Translate
 * @version 4.0.0
 * @license http://www.opensource.org/licenses/MIT
 * @copyright 2012 author
 * @author Marco Enrico <mvalviar@gmail.com> 
 */

class SeTutorials_View_Helper_Translate extends Zend_View_Helper_Translate
{
  /**
   * translate 
   * 
   * @param mixed $messageid 
   * @return string
   */
  public function translate($messageid = null)
  {
    if (is_array($messageid) && count($messageid) == 3
      && is_numeric($messageid[2]) && $messageid[2] < 1) 
    {
      $messageid[2] = 1;
    }
    $options = func_get_args();
    array_shift($options);
    return parent::translate($messageid, $options);
  }
}
