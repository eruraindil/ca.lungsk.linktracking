<?php

require_once 'linktracking.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function linktracking_civicrm_config(&$config) {
  _linktracking_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function linktracking_civicrm_xmlMenu(&$files) {
  _linktracking_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function linktracking_civicrm_install() {
  _linktracking_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function linktracking_civicrm_postInstall() {
  _linktracking_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function linktracking_civicrm_uninstall() {
  _linktracking_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function linktracking_civicrm_enable() {
  _linktracking_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function linktracking_civicrm_disable() {
  _linktracking_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function linktracking_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _linktracking_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function linktracking_civicrm_managed(&$entities) {
  _linktracking_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function linktracking_civicrm_caseTypes(&$caseTypes) {
  _linktracking_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function linktracking_civicrm_angularModules(&$angularModules) {
  _linktracking_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function linktracking_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _linktracking_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function linktracking_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function linktracking_civicrm_navigationMenu(&$menu) {
  _linktracking_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'ca.lungsk.linktracking')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _linktracking_civix_navigationMenu($menu);
} // */


/*
 * hook_civicrm_buildForm
 * Do a Drupal 7 style thing so we can write smaller functions
 * (Idea from ca.civicrm.contributextra)
 */
function linktracking_civicrm_buildForm($formName, &$form) {
  $fname = 'linktracking_'.$formName;
  if (function_exists($fname)) {
    $fname($form);
  }
  // else { echo '<pre>'.$fname.'</pre>'; }
}

/*
 * hook_civicrm_pageRun
 * Do a Drupal 7 style thing so we can write smaller functions
 */
function linktracking_civicrm_pageRun(&$page) {
  $pageName = $page->getVar('_name');
  $fname = 'linktracking_'.$pageName;
  if (function_exists($fname)) {
    $fname($page);
  }
  // else { echo '<pre>'.$fname.'</pre>'; }
}


/*
 * hook_civicrm_postProcess
 * Do a Drupal 7 style thing so we can write smaller functions
function contributextra_civicrm_postProcess($formName, &$form) {
  $fname = 'contributextra_process_'.$formName;
  if (function_exists($fname)) {
    $fname($form);
  }
  // else { echo $fname; die(); }
}
 */

/*
 *  Provide helpful links to the admin-only mailing pages.
 */
function linktracking_CRM_Mailing_Page_Tab(&$page) {
  $contactID = $page->getVar('_contactId');
  if (empty($contactID)) {
    return;
  }

  CRM_Core_Resources::singleton()->addScriptFile('ca.lungsk.linktracking', 'js/contact_links.js');
  // }
}
