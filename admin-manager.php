<?php

    // Fields available to admin user
    // 1. Attach by default
    // 2. Attach to post_content/manual insert (function code)
    // 3. Max. number of attachments to show
    // 4. Open image in slideshow/new page
    // 5. Size of thumbnails

    if($_POST['scg_hidden'] == 'true') {  
        //$alwaysAttach = $_POST['scg_attach_default'];              // 1.
        //update_option('scg_attach_default', $alwaysAttach);
        $autoAttach = $_POST['scg_auto_attach'];                     // 2.
        update_option('scg_auto_attach', $autoAttach);
        $showNrThumbs = $_POST['scg_thumbs_nr'];                     // 3.
        update_option('scg_thumbs_nr', $showNrThumbs);
        $openInSlideshow = $_POST['scg_open_slideshow'];             // 4.
        update_option('scg_open_slideshow', $openInSlideshow);
        $thumbSize = $_POST['scg_thumbnail_width'];                  // 5.
        update_option('scg_thumbnail_width', $thumbSize);
        $thumbSize = $_POST['scg_thumbnail_height'];                 // 5.
        update_option('scg_thumbnail_height', $thumbSize);
        ?>  
        <div class="updated"><p><strong><?php _e('Options saved.' ); ?></strong></p></div>  
        <?php 
    } else {  
        //$alwaysAttach = get_option('scg_attach_default');
        $autoAttach = get_option('scg_auto_attach');
        $showNrThumbs = get_option('scg_thumbs_nr');
        $openInSlideshow = get_option('scg_open_slideshow');
        $thumbSize = get_option('scg_thumbnail_size');
    }

?>
<div class="wrap">
    <h2><?php _e('Sticky Cheese Gallery settings','scg_cbkg') ?></h2>
	<!-- <h2><?php _e( 'OSCommerce Product Display Options', 'oscimp_trdom' ) ?></h2> -->
	<form name="scg_form" method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
		<input type="hidden" name="scg_hidden" value="true"/>
		
        <dl class="option radiogroup">
        <?php echo $autoAttach ?>
            <dt><input type="radio" <?php echo ($autoAttach == 'auto' ? 'checked=""' : 'checked="checked"'); ?> name="scg_auto_attach" id="scg_attach_auto" value="auto" /></dt>
            <dd><label for="scg_attach_auto">Attach to <code>post_content()</code></label></dd>
            <dt><input type="radio" <?php echo ($autoAttach == 'manual' ? 'checked=""' : 'checked="checked"'); ?> name="scg_auto_attach" id="scg_attach_manual" value="manual"/></dt>
            <dd><label for="scg_attach_manual">Manually insert.</label><small>Use <code>scg_gallery_insert()</code> in your code to insert.</small></dd>
        </dl>
        <dl>
            <dt><label for="scg_thumbs_nr">Maximum number of thumbnails:</dt>
            <dd><input type="number" id="scg_thumbs_nr" name="scg_thumbs_nr" value="<?php echo $showNrThumbs; ?>" placeholder="1"/></dd>
        </dl>
        <dl>
            <dt><input type="checkbox" name="scg_open_slideshow" value="true" id="scg_open_slideshow"/></dt>
            <dd><label for="scg_open_slideshow">Open thumbnails in slideshow</label></dd>
        </dl>
        <dl>
            <dt><label for="scg_thumbnail_width">Thumbnail width:</label></dt>
            <dd><input type="number" name="scg_thumbnail_width" id="scg_thumbnail_width" step="1" placeholder="150"/></dd>
            <dt><label for="scg_thumbnail_height">Thumbnail height:</label></dt>
            <dd><input type="number" name="scg_thumbnail_height" id="scg_thumbnail_height" step="1" placeholder="200"/></dd>
        </dl>
        <hr/>
        <h4><?php _e( 'OSCommerce Database Settings', 'oscimp_trdom' ) ?></h4>
		<ul>
    		<li><?php _e("Database host: " ); ?><input type="text" name="oscimp_dbhost" value="<?php echo $dbhost; ?>" size="20"/><?php _e(" ex: localhost" ); ?></li>
    		<li><?php _e("Database name: " ); ?><input type="text" name="oscimp_dbname" value="<?php echo $dbname; ?>" size="20"/><?php _e(" ex: oscommerce_shop" ); ?></li>
    		<li><?php _e("Database user: " ); ?><input type="text" name="oscimp_dbuser" value="<?php echo $dbuser; ?>" size="20"/><?php _e(" ex: root" ); ?></li>
    		<li><?php _e("Database password: " ); ?><input type="text" name="oscimp_dbpwd" value="<?php echo $dbpwd; ?>" size="20"/><?php _e(" ex: secretpassword" ); ?></li>
        </ul>
		<h4><?php _e( 'OSCommerce Store Settings', 'oscimp_trdom' ) ?></h4>
		<ul>
    		<li><?php _e("Store URL: " ); ?><input type="text" name="oscimp_store_url" value="<?php echo $store_url; ?>" size="20"/><?php _e(" ex: http://www.yourstore.com/" ); ?></li>
    		<li><?php _e("Product image folder: " ); ?><input type="text" name="oscimp_prod_img_folder" value="<?php echo $prod_img_folder; ?>" size="20"/><?php _e(" ex: http://www.yourstore.com/images/" ); ?></li>
    		<li class="submit">
        		<input type="submit" name="Submit" value="<?php _e('Update Options', 'oscimp_trdom' ) ?>" />
    		</li>
		</ul>
	</form>
</div>

<?php