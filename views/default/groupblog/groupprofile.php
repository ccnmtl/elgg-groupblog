<div id="group_pages_widget">
<h2><?php echo elgg_echo("groupblog:groupprofile"); ?></h2>
<?php

    $objects = list_entities("object", "groupblog", page_owner(), 5, false);
	echo $objects;
	
?>
</div>
