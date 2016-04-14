<div class="box">
    <div class="heading">
        <h1><img alt="" src="<?php echo theme_url('assets/images/layout.png'); ?>">Timetable</h1>

        <div class="buttons">
            <a class="button" href="<?php echo site_url(ADMIN_PATH . "/content/timetable/add"); ?>"><span>Add New Event</span></a>
            <a class="button delete" href="#"><span>Delete</span></a>
        </div>
    </div>
    <div class="content">

        <?php echo form_open(null, 'id="form"'); ?>
            <table class="list">
                <thead>
                    <tr>
                        <th width="1" class="center"><input type="checkbox" onClick="$('input[name*=\'selected\']').attr('checked', this.checked);" /></th>
                        <th><a rel="week_day" class="sortable" href="#">Day of the Week</a></th>
                        <th><a rel="short_name" class="sortable" href="#">Time</a></th>
                        <th>Event</th>
                        <th class="right">Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                        <?php foreach($alldata as $key => $value): 
                        if(!empty($value))
                        {
                            foreach($value as $val) { ?>
                        
                        <tr class="tr_link">
                            <td class="center"><input type="checkbox" value="<?php echo $val->id ?>" name="selected[]" /></td>
                            <td><?php echo $key; ?></td>
                            <td><?php echo $val->event_time; ?></td>
                            <td><?php echo $val->event; ?></td>
                            <td class="right"> [ <a href="<?php echo site_url(ADMIN_PATH . '/content/timetable/edit/' . $val->id); ?>">Edit</a> ]</td>
                        </tr>
                        <?php } } endforeach; ?>
                    
                   
                </tbody>
            </table>
        <?php echo form_close(); ?>

    </div>
</div>
<?php js_start(); ?>
<script type="text/javascript">
    $(document).ready(function() {
        // Sort By
        $('.sortable').click( function() {
            sort = $(this);

            if (sort.hasClass('asc'))
            {
                window.location.href = "<?php echo site_url(ADMIN_PATH . '/content/timetable/index') . '?'; ?>&sort=" + sort.attr('rel') + "&order=desc";
            }
            else
            {
                window.location.href = "<?php echo site_url(ADMIN_PATH . '/content/timetable/index') . '?';  ?>&sort=" + sort.attr('rel') + "&order=asc";
            }

            return false;
        });

        <?php if ($sort = $this->input->get('sort')): ?>
            $('a.sortable[rel="<?php echo $sort; ?>"]').addClass('<?php echo ($this->input->get('order')) ? $this->input->get('order') : 'asc' ?>');
        <?php else: ?>
            $('a.sortable[rel="title"]').addClass('asc');
        <?php endif; ?>

        $('.delete').click( function() {
            if (confirm('Delete cannot be undone! Are you sure you want to do this?'))
            {
                $('#form').attr('action', '<?php echo site_url(ADMIN_PATH . '/content/timetable/delete'); ?>').submit()
            }
            else
            {
                return false;
            }
        });

    });
</script>
<?php js_end(); ?>
