<?php
/**
 * Sidebar
 *
 * @package aLaCode
 */
?>
<?php 
$aLaCode_sidebar_size = aLaCode_get_option('aLaCode_sidebar_size'); 
$aLaCode_example_content = aLaCode_get_option('aLaCode_example_content'); 
?>
<!-- Sidebar -->
<div class="sidebar sidebar-column <?php if($aLaCode_sidebar_size == 0) { ?> col-md-4 <?php } else { ?> col-md-3 <?php } ?>"> 
    <?php 

    if(is_active_sidebar('sidebar-default-bordered')) { ?><div class="sidebar-default-borders sidebar-block sidebar-borders"><?php dynamic_sidebar('sidebar-default-bordered'); ?></div><?php } 
    
    if(is_active_sidebar('sidebar-default')) { ?><div class="sidebar-default sidebar-block sidebar-no-borders"><?php dynamic_sidebar('sidebar-default'); ?></div><?php } 
    else if($aLaCode_example_content == 1) { aLaCode_example_sidebar(); } 
    ?>
</div>
<!-- /Sidebar -->