<?php

// add_action( 'wp_footer', 'jt_print_post_template', 25 );

function jt_print_post_template() { ?>

    <script type="text/template" id="tmpl-template-calendar">
      <div class="calendar">
        <table>
          <colgroup>
            <col span="5">
            <col span="2" class="weekend">
          </colgroup>
          <thead>
              <tr class="head">
                <td colspan="7">
                  <p class="calendar-controls clndr-controls">
                    <a class="previous clndr-previous-button"><span>Previous</span></a> 
                    <strong>{{data.month}}</strong> 
                    <a class="next clndr-next-button"><span>Next</span></a>
                    </p>
                  </td>
              </tr>
            <tr class="day">
              <# _.each(data.daysOfTheWeek, function(day) { #>
                  <th>{{day}}</th>
              <# }); #>
            </tr>
          </thead>
          <tbody>
            <# var dayCount = 1; #>
            <tr>
            <# _.each(data.days, function(day) { #>
                <td class="{{day.classes}}"><div class="calendar-tooltip"><ul></ul></div>{{day.day}}</td>
              <# if(dayCount % 7 == 0) { #> </tr> <# } #>
                <# dayCount++; #>
            <# }); #>
          <tbody>
        </table>
      </div>
  </script>

<?php } 

// IN JAVASCRIPT - parse template:

// var theTemplate = wp.template('template-calendar');

?>