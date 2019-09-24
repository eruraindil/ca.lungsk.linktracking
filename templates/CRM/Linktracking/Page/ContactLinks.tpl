<h3>Links clicked in bulk email</h3>

<div class="crm-mailing-links">
  <table class="contact-mailing-links">
    <thead>
      <tr>
        <th data-data="scheduled_date" class="">{ts}Date{/ts}</th>
        <th data-data="name" class="">{ts}Mailing Name{/ts}</th>
        <th data-data="url" data-orderable="false" class="">{ts}URL{/ts}</th>
        {* <th data-data="clicks" class="">{ts}Clicks{/ts}</th> *}
      </tr>
    </thead>
  </table>
  {literal}
    <script type="text/javascript">
      var data = {/literal}{$values}{literal};
      (function($) {
        CRM.$('table.contact-mailing-links').dataTable({
          data: data,
          order: [[0, 'desc']]
        });
      })(CRM.$);
    </script>
  {/literal}
</div>
