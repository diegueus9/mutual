<?php /* Smarty version 2.6.15, created on 2007-01-05 13:06:16
         compiled from item.tpl */ ?>
<?php if (! $this->_tpl_vars['submit_ok']): ?>
	<h2><?php echo $this->_tpl_vars['catname']; ?>
</h2>
<?php endif; ?>
<table border="0" cellspacing="1" width="100%">
<tr>
    <td width="100%" valign="top">


<?php if ($this->_tpl_vars['errorMsg']): ?>
	<ol class="red"><?php echo $this->_tpl_vars['errorMsg']; ?>
</ol>
<?php endif; ?>


<?php if ($this->_tpl_vars['submit_ok']): ?>

<?php if ($this->_tpl_vars['await_validation']): ?>
<p><?php echo @LA_VALIDATION_WAIT; ?>
</p>
<?php endif; ?>

<br><b><?php echo @LA_CHOOSE; ?>
</b><br />
	
	<?php if ($this->_tpl_vars['picture_upload_enable']): ?>
	<br />
	<a href='<?php echo $this->_tpl_vars['url_to_upload']; ?>
?pic_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
' class="thumb">
	<img src="<?php echo $this->_tpl_vars['url']; ?>
/layout_images/new/images.gif" align="left" border="0" hspace="3" vspace="3" alt="<?php echo @LA_UPLOAD_VIDEO; ?>
" />
	</a>
	<a href='<?php echo $this->_tpl_vars['url_to_upload']; ?>
?pic_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
'>
	<?php echo @LA_I_WANT; ?>
</a>
	<?php endif; ?>	
	
	<?php if ($this->_tpl_vars['set_video_upload']): ?>
	<br /><br />
	<a href='<?php echo $this->_tpl_vars['url_to_upload_video']; ?>
?video_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
' class="thumb">
	<img src="<?php echo $this->_tpl_vars['url']; ?>
/layout_images/new/film.gif" align="left" border="0" hspace="3" vspace="3" alt="<?php echo @LA_UPLOAD_VIDEO; ?>
" />
	</a>
	<a href='<?php echo $this->_tpl_vars['url_to_upload_video']; ?>
?video_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
'>
	<?php echo @LA_UPLOAD_VIDEO; ?>
</a>
	<?php endif; ?>
	
	<?php if ($this->_tpl_vars['set_doc_upload']): ?>
	<br /><br />
	<a href='<?php echo $this->_tpl_vars['url_to_upload_doc']; ?>
?doc_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
' class="thumb">
	<img src="<?php echo $this->_tpl_vars['url']; ?>
/layout_images/new/doc.gif" align="left" border="0" hspace="3" vspace="3" alt="<?php echo @LA_UPLOAD_DOC; ?>
" />
	</a>
	<a href='<?php echo $this->_tpl_vars['url_to_upload_doc']; ?>
?doc_ad_id=<?php echo $this->_tpl_vars['ad_id']; ?>
'>
	<?php echo @LA_UPLOAD_DOC; ?>
</a>
	<?php endif; ?>
	
	<br /><br />
	<a href='index.php' class="thumb">
	<img src="<?php echo $this->_tpl_vars['url']; ?>
/layout_images/new/home_icon.gif" align="left" border="0" hspace="3" vspace="3" alt="<?php echo @LA_RET; ?>
" />
	</a><a href='index.php'><?php echo @LA_RET; ?>
</a>
    <br /><br />
    <a href='choose_cat.php' class="thumb">
	<img src="<?php echo $this->_tpl_vars['url']; ?>
/layout_images/new/addad.gif" align="left" border="0" hspace="3" vspace="3" alt="<?php echo @LA_ADD_AN; ?>
" />
	</a>
    <a href='choose_cat.php'><?php echo @LA_ADD_AN; ?>
</a>
    <br />

<?php endif; ?>

<?php if ($this->_tpl_vars['pay_out_of_credits']): ?>
	<h4><?php echo @LA_OUT_OF_CREDITS; ?>
</h4>
	<?php echo @LA_CREDITS_WARNING; ?>
 <br />
	<?php echo @LA_CREDITS_WARNING2; ?>

	<br /><br /><?php echo @LA_VISIT_OUR; ?>
 <a href="payment_options.php"><u><?php echo @LA_PAID_MEMBERSHIP; ?>
</u></a> <?php echo @LA_FOR_MORE_INFO; ?>
<br /><br />
	
		
<?php endif; ?>

<?php if ($this->_tpl_vars['show_form']): ?>

<?php if ($this->_tpl_vars['set_payments']): ?>
	<?php echo @LA_PAY_CREDITS_BAL; ?>
 <b><?php echo $this->_tpl_vars['pay_free_credits']; ?>
</b> <?php echo @LA_PAY_CREDITS; ?>
<br />
	<?php echo @LA_PAY_COST; ?>
 <b><?php echo $this->_tpl_vars['pay_catcost']; ?>
</b> <?php echo @LA_PAY_CREDITS; ?>
<br /><br /><br />
<?php endif; ?>

<form method='post' action='<?php echo $this->_tpl_vars['phpself']; ?>
' name="itemForm">
<input type='hidden' name='ad_id' value='<?php echo $this->_tpl_vars['ad_id']; ?>
'>
<input type='hidden' name='update_rq' value='<?php echo $this->_tpl_vars['update_rq']; ?>
'>
<?php if (! $this->_tpl_vars['ad_id']): ?>
<input type='hidden' name='catid' value='<?php echo $this->_tpl_vars['catid']; ?>
'>
<?php endif; ?>
<table border="0" cellpadding="1" cellspacing="1" width="100%">

	<tr>
    <td width="30%" valign="top"><?php echo @TITLE; ?>
 <span class="red">*</span></td>
    <td width="70%" valign="top">
	<input type="text" name="ad_title" size="39" maxlength="150" class="txt" value="<?php echo $this->_tpl_vars['ad_title']; ?>
">
	</td>
  	</tr>




    <tr>
    <td width="30%" valign="top"><?php echo @DESCRIPTION; ?>
 <span class="red">*</span></td>
    <td width="70%" valign="top"><textarea rows="7" id="ad_description" name="ad_description" cols="45"><?php echo $this->_tpl_vars['ad_description']; ?>
</textarea>

    <?php if ($this->_tpl_vars['html_editor']): ?>
    <?php echo '
    <script>
	var oEdit1 = new InnovaEditor("oEdit1");
	oEdit1.mode="XHTMLBody";
	oEdit1.useDIV=false;
	oEdit1.btnSpellCheck=true;
	
	oEdit1.features=["Bold","Italic","Underline","ForeColor","Spellcheck","SpellCheck","|","Image","Numbering","Bullets","|","Cut","Copy","Paste","PasteWord","|","Preview","|","Flash","FontSize"];

	/*oEdit1.features=["FullScreen","Preview","Print","Search",
"Cut","Copy","Paste","PasteWord","PasteText","|","Undo","Redo","|",
"ForeColor","BackColor","|","Bookmark","Hyperlink","XHTMLSource","BRK",
"Numbering","Bullets","|","Indent","Outdent","LTR","RTL","|",
"Image","Flash","Media","|","Table","Guidelines","Absolute","|",
"Characters","Line","Form","RemoveFormat","ClearAll","BRK",
"StyleAndFormatting","TextFormatting","ListFormatting","BoxFormatting",
"ParagraphFormatting","CssText","Styles","|",
"Paragraph","FontName","FontSize","|",
"Bold","Italic","Underline","Strikethrough","|",
"JustifyLeft","JustifyCenter","JustifyRight","JustifyFull"];
*/
	
	oEdit1.width="450px";
oEdit1.height="250px";
	
	oEdit1.REPLACE("ad_description");
	</script>
	'; ?>

	<?php endif; ?>
    </td>
  </tr>

  
  
<?php $_from = $this->_tpl_vars['extra_fields_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['e']):
?>

<?php if ($this->_tpl_vars['e']['q_catdescr']): ?>
	<tr><td colspan="2">
   		<b><?php echo $this->_tpl_vars['e']['q_catdescr']; ?>
</b><hr style="color:black;" width="50%" align="left">
	</td></tr>
<?php endif; ?>

<tr>
	<td valign="top"><?php echo $this->_tpl_vars['e']['q_question']; ?>
 <?php if ($this->_tpl_vars['e']['q_mand']): ?><span class="red">*</span><?php endif; ?></td>
   	<td valign="top">
   	
   	<?php if ($this->_tpl_vars['e']['q_type'] == 't'): ?>

   		<input type="text" name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
" size="<?php echo $this->_tpl_vars['e']['q_size']; ?>
" value="<?php echo $this->_tpl_vars['e']['q_value']; ?>
" />
   	
   	<?php elseif ($this->_tpl_vars['e']['q_type'] == 'd'): ?>

   		<textarea cols="<?php echo $this->_tpl_vars['e']['q_size']; ?>
" rows="<?php echo $this->_tpl_vars['e']['q_size_2']; ?>
" name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
"><?php echo $this->_tpl_vars['e']['q_value']; ?>
</textarea>
   		
   	<?php elseif ($this->_tpl_vars['e']['q_type'] == 'c'): ?>
   		
   	<input type="checkbox" onClick="removeall('<?php echo $this->_tpl_vars['e']['q_field']; ?>
')" id="<?php echo $this->_tpl_vars['e']['q_field']; ?>
" value="0" name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
[]">
   		<?php echo @LA_EMPTY; ?>

   		<br />
   		<?php $_from = $this->_tpl_vars['e']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
   		<input type="checkbox" name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
[]" id="<?php echo $this->_tpl_vars['e']['q_field']; ?>
" value="<?php echo $this->_tpl_vars['opt']['value']; ?>
" <?php if ($this->_tpl_vars['opt']['checked']): ?> checked<?php endif; ?> onClick="resetfirst('<?php echo $this->_tpl_vars['e']['q_field']; ?>
')">
   			<?php echo $this->_tpl_vars['opt']['text']; ?>
 <br />
   		<?php endforeach; endif; unset($_from); ?>

   	<?php elseif ($this->_tpl_vars['e']['q_type'] == 's'): ?>
   		
   		<select name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
" class="txt">
   		<option value='0'><?php echo @LA_EMPTY; ?>
</option>
   		<?php $_from = $this->_tpl_vars['e']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
   			<option value="<?php echo $this->_tpl_vars['opt']['value']; ?>
" <?php if ($this->_tpl_vars['opt']['checked']): ?> selected<?php endif; ?>><?php echo $this->_tpl_vars['opt']['text']; ?>
</option>
   		<?php endforeach; endif; unset($_from); ?>
   		</select>
   		
   	<?php elseif ($this->_tpl_vars['e']['q_type'] == 'r'): ?>
   		
   		<?php $_from = $this->_tpl_vars['e']['options']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['opt']):
?>
   			<input type="radio" name="<?php echo $this->_tpl_vars['e']['q_field']; ?>
[]" id="<?php echo $this->_tpl_vars['e']['q_field']; ?>
" value="<?php echo $this->_tpl_vars['opt']['value']; ?>
" <?php if ($this->_tpl_vars['opt']['checked']): ?> checked<?php endif; ?>>
   			<?php echo $this->_tpl_vars['opt']['text']; ?>
 <br />
   		<?php endforeach; endif; unset($_from); ?>
   		
   		
   	<?php endif; ?>
   	

   	
   </td>
</tr>

<?php endforeach; endif; unset($_from); ?> 
  
  
  
  
  
  <?php if ($this->_tpl_vars['admin_area'] || $this->_tpl_vars['ad_id']): ?>

    <tr>
    <td width="30%" valign="top"><?php echo @LA_CHANGE; ?>
</td>
    <td width="70%" valign="top"><select name='catid' class="txt">
    <?php echo $this->_tpl_vars['cat_list']; ?>

   	</select>
    </td>
  </tr>
  
  <?php endif; ?>
  

<?php if ($this->_tpl_vars['set_expire_days_option'] == 1 && ! $this->_tpl_vars['ad_id']): ?>
  <tr>
  <td width="30%" valign="top"><?php echo @LA_RUNDAYS; ?>
 <font color=red>*</font></td>
  <td width="70%" valign="top"><select name="expire_days" class="txt">
  <?php echo $this->_tpl_vars['expire_list']; ?>

  </select>
  </td>
  </tr>
  <?php endif; ?>

  
<tr><td colspan="2">
<p><input type='submit' name='submit' class='button' value='<?php echo @SUBMIT_BUTTON; ?>
'></p>
</td>
</tr>
</table>
</form>
<?php endif; ?>


</td></tr></table>

