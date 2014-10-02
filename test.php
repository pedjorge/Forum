<?php
 
## 3 Different timestamps for using with the timeago plugin
$time = date('2014-09-29 16:31:00');
$time_2 = time() - 39983729;
$time_3 = date('1987-07-28 16:31:00')
 
?>
<link href="css/style.css" media="screen" rel="stylesheet" type="text/css" />
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/jquery.timeago.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.time').timeago();
    });
</script>
 
<p>This sentence was posted <abbr class="time strong" title="<?php echo date('c', strtotime($time)); ?>"></abbr></p>
<p>Another sweet example. <abbr class="time strong" title="<?php echo date('c', $time_2); ?>"></abbr></p>
<p>I was born <abbr class="time strong" title="<?php echo date('c', strtotime($time_3)); ?>"></abbr></p>