<?php /* Smarty version 2.6.15, created on 2007-01-10 09:14:17
         compiled from login.tpl */ ?>
	<div class="loginface">		
		<div class="error-msg"><?php echo $this->_tpl_vars['error']; ?>
</div>
		<div class="loginbox"><form action="login.php" method="post" name="login">
			<table class="logintable">
				<tr>
					<td><div class="label">NOMBRE:</div></td>
					<td><div class="input-cont"><input class="input-class" type="text" name="username" /></div></td>
				</tr>
				<tr>
					<td><div class="label">PASSWORD:</div></td>
					<td><div class="input-cont"><input class="input-class" type="password" name="password" /></div></td>
				</tr>
				<tr>
					<td colspan="2"><div class="submit-cont"><input type="submit" name="submit" value="Aceptar" /></div></td>
				</tr>
				</table>
		</form></div>
	</div>