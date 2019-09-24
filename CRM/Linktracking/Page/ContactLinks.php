<?php

class CRM_Linktracking_Page_ContactLinks extends CRM_Core_Page {

  public function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('Contact Links'));

    $contactId = CRM_Utils_Array::value('cid', $_GET);
    if ( !isset($contactId) ) {
      $alert = ts('Unable to retrieve contact information');
      CRM_Core_Session::setStatus($alert, ts('Warning'), 'alert');
    } else {
      $this->assign('contact_id', $contactId);

      $select = "SELECT
        m.scheduled_date,
        m.name,
        t.url
        -- count(t.url) clicks
      FROM
        civicrm_mailing m
        JOIN civicrm_mailing_job j
          ON m.id = j.mailing_id
        JOIN civicrm_mailing_event_queue q
          ON j.id = q.job_id
        JOIN civicrm_mailing_event_opened o
          ON q.id = o.event_queue_id
        JOIN civicrm_mailing_event_trackable_url_open ourl
          ON ourl.event_queue_id = o.id
        JOIN civicrm_mailing_trackable_url t
          ON t.id = ourl.trackable_url_id
      WHERE t.url IS NOT NULL
        AND m.is_completed = 1
        AND m.url_tracking = 1
        AND q.contact_id = %1
      -- GROUP BY q.contact_id, t.mailing_id, t.url
      ORDER BY m.scheduled_date DESC";

      $args = [];
      $args[1] = [$contactId, 'Integer'];

      $values = array();
      try {
        $dao = CRM_Core_DAO::executeQuery($select, $args);
        while ($dao->fetch()) {
          /* We index in the transaction_id */
          $record = array();
          foreach (get_object_vars($dao) as $key => $value) {
            if ('N' != $key && (0 !== strpos($key,'_'))) {
              $record[$key] = $value;
            }
          }
          $values[] = $record;
        }

        $this->assign('values', json_encode($values));
        // $this->assign('values_dump', print_r($values, 1));
      }
      catch (Exception $e) {
        // CRM_Core_Error::debug_var('params',$params);
        throw API_Exception('Linktracking extension: '. $e->getMessage());
      }

      parent::run();
    }
  }

}
