<?php /* Smarty version 2.6.15, created on 2007-01-21 13:06:35
         compiled from selectfile.tpl */ ?>
	<div class="display-cental">
		<div class="select">
			<div class="select-box">
				<div class="select-msg">
					<?php echo $this->_tpl_vars['error']; ?>

				</div>
				<div class="select-form">
					<form action="loadfile.php" method="post" enctype="multipart/form-data">
					<div class="select-item">
						<input class="input-file" name="userfile" type="file">
					</div>
					<div class="select-item">
						<input name="submit" type="submit" value="Enviar">
					</div>
					</form>
				</div>
			</div>			
		</div>
	</div>