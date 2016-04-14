<?php function dayDropdown($name="week_day", $selected=null)
{
        $wd = '<select name="'.$name.'" id="'.$name.'">';

        $days = array(
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday');
        /*** the current day ***/
        $selected = is_null($selected) ? date('N', time()) : $selected;

        for ($i = 1; $i <= 7; $i++)
        {
                $wd .= '<option value="'.$i.'"';
                if ($i == $selected)
                {
                        $wd .= ' selected';
                }
                /*** get the day ***/
                $wd .= '>'.$days[$i].'</option>';
                 }
        $wd .= '</select>';
        return $wd;
}





?>
<div class="box">
    <div class="heading">
        <h1><img alt="" src="<?php echo theme_url('assets/images/layout.png'); ?>">Edit Timetable</h1>

        <div class="buttons">
            <div class="buttons">
            <a class="button" href="javascript:void(0);" id="save"><span>Save</span></a>
           
            <a class="button" href="<?php echo site_url(ADMIN_PATH . '/content/timetable'); ?>"><span>Cancel</span></a>
        </div>
        </div>
    </div>
    <div class="content">

        <div class="form">
            <?php if(!empty($timetable)) { ?>
            <form action = '<?php echo site_url(ADMIN_PATH . "/content/timetable/edit/$timetable->id"); ?>' method = "POST" id = "timetable_add">
            
            <div id="theme_layout_div">
                <?php echo form_label('<span class="required">*</span>Select Week day:', 'week_day'); ?>
                <?php  echo dayDropdown('week_day',$timetable->week_day_id); ?>

            </div>
            <div>
                        <?php echo form_label('<span class="required">*</span> Event Time:', 'event_time'); ?>
                        <?php echo form_input(array('name'=>'event_time', 'class'=>'datetime', 'id'=>'event_time', 'value'=>set_value('event_time',$timetable->event_time))); ?>
            </div>
            <div>
                        <?php echo form_label('<span class="required">*</span> Event Description:', 'event'); ?>
                        <?php echo form_input(array('name'=>'event', 'class'=>'datetime', 'id'=>'event', 'value'=>set_value('event',$timetable->event))); ?>
            </div>
           
            
            <?php  echo form_close(); } ?>
        </div>
    </div>
</div>

<?php js_start(); ?>
<script type="text/javascript">
    $(document).ready( function() {
        // Auto fill short name based on title
     $("#save").click( function() {
        $('#timetable_add').submit();

         });
   
        });

</script>
<?php js_end(); ?>