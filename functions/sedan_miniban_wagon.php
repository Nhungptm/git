 <div id="calendar" class="calendar-wrap wrap">
        <div class="calendar-pager">
          <!-- <a href="?ym=<?php //echo $prev; ?>">&lt;</a> <?php //echo $html_title; ?> <a href="?ym=<?php //echo $next; ?>">&gt;</a> -->
          <!-- <div class="container" id="calendar"> -->

        <h3><a href="?ym=<?php echo $prev; ?>#calendar">&lt;</a> <?php echo $html_title; ?> <a href="?ym=<?php echo $next; ?>#calendar">&gt;</a></h3>
        </div>
        <div class="calendar-content inner clearfix">
          <ul class="calendar-content-tab clearfix">
            <li>セダン</li>
            <li>ミニバン</li>
            <li>ワゴン</li>
          </ul>
          <!--  <table class="calendar-area"> -->
          <table class="table table-bordered">
            <tr class="week">
            <!-- <tr> -->
              <th>月</th>
              <th>火</th>
              <th>水</th>
              <th>木</th>
              <th>金</th>
              <th class="saturday">土</th>
              <th class="sunday">日</th>
            </tr>
            <?php
              foreach ($weeks as $week) {
                echo $week;
              }
            ?>
          </table>
        </div>
      </div>