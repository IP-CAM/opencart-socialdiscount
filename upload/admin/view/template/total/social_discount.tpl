<?php echo $header; ?>
<div id="content">
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
  </div>
  <?php if ($error_warning) { ?>
  <div class="warning"><?php echo $error_warning; ?></div>
  <?php } ?>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/total.png" alt="" /> <?php echo $heading_title; ?></h1>
      <div class="buttons"><a onclick="$('#form').submit();" class="button"><?php echo $button_save; ?></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><?php echo $button_cancel; ?></a></div>
    </div>
    <div class="content">
      <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
        <table class="form">
          <tr>
            <td><?php echo $entry_status; ?></td>
            <td><select name="social_discount_status">
                <?php if ($social_discount_status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select></td>
          </tr>
          <tr>
            <td><?php echo $entry_sort_order; ?></td>
            <td><input type="text" name="social_discount_sort_order" value="<?php echo $social_discount_sort_order; ?>" size="1" /></td>
          </tr>
		  <tr>
            <td><?php echo $entry_discount_value; ?></td>
            <td>
				<table class="list" style="width: 350px;">
				<tr>
					<td>VK
					<td>
						<input type="checkbox" name="social_discount_vk_like_enabled" id="social_discount_vk_like_enabled"<?php echo $social_discount_vk_like_enabled ? ' checked="checked"' : ''; ?>/><label for="social_discount_vk_like_enabled">Like</label>
						<input type="text" name="social_discount_vk_like_value" value="<?php echo $social_discount_vk_like_value; ?>" size="1" />%
					</td>
					<td>
						<input type="checkbox" name="social_discount_vk_share_enabled" id="social_discount_vk_share_enabled"<?php echo $social_discount_vk_share_enabled ? ' checked="checked"' : ''; ?>/><label for="social_discount_vk_share_enabled">Share</label>
						<input type="text" name="social_discount_vk_share_value" value="<?php echo $social_discount_vk_share_value; ?>" size="1" />%
					</td>
				</tr>
				<tr>
					<td>Facebook
					<td>
						<input type="checkbox" name="social_discount_fb_like_enabled" id="social_discount_fb_like_enabled"<?php echo $social_discount_fb_like_enabled ? ' checked="checked"' : ''; ?>/><label for="social_discount_vk_like_enabled">Like</label>
						<input type="text" name="social_discount_fb_like_value" value="<?php echo $social_discount_fb_like_value; ?>" size="1" />%
					</td>
					<td>
						
					</td>
				</tr>
				
				<tr>
					<td>Google Plus
					<td>
						<input type="checkbox" name="social_discount_gp_like_enabled" id="social_discount_gp_like_enabled"<?php echo $social_discount_gp_like_enabled ? ' checked="checked"' : ''; ?>/><label for="social_discount_vk_like_enabled">Like</label>
						<input type="text" name="social_discount_gp_like_value" value="<?php echo $social_discount_gp_like_value; ?>" size="1" />%
					</td>
					<td>
						
					</td>
				</tr>
				</table>
			</td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_discount_type; ?><br/><span class="help"><?php echo $entry_discount_type_help; ?></span></td>
            <td><select name="social_discount_discount_type">
				<?php foreach ($discount_types as $type_id => $type_name): ?>
                <option value="1"<?php if ($social_discount_discount_type == $type_id) { echo ' selected="selected"'; } ?>><?php echo $type_name; ?></option>
				<?php endforeach; ?>
              </select></td>
          </tr>
		  
		  <tr>
            <td><?php echo $entry_discount_active_mark; ?><br/><span class="help"><?php echo $entry_discount_active_mark_help; ?></span></td>
            <td><input type="text" name="social_discount_active_mark" value="<?php echo $social_discount_active_mark; ?>" size="20" /></td>
          </tr>
		  
        </table>
      </form>
    </div>
  </div>
</div>
<?php echo $footer; ?>