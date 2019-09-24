/*
 * backend contact mailing page
 *
 */

/*jslint indent: 2 */
/*global CRM, ts */

cj(function ($) {
  'use strict';
  var contact_id = $('.crm-contact-contact_id').text();
  $('.crm-mailing-selector').before(
    '<div class="action-link" style="text-align: left">' +
    '<a href="/civicrm/contactlinks?reset=1&amp;cid=' + contact_id + '" class="button crm-popup"><span><i class="crm-i fa-link"></i> Link Tracking</span></a>' +
    '</div>'
  );
});
