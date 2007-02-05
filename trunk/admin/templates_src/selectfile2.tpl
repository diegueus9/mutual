	<div class="display-cental">
		<div class="select">
			<div class="select-box">
				<div class="select-msg">
					{$error}
				</div>
				<div class="select-form">
					{literal}
					<script language="javascript">
						function getPath(){
							file=document.getElementById('file');
							path=document.getElementById('path');
							path.value=file.value;
							file.value='';
						}
					</script>
					{/literal}
					<form action="loadfile.php" method="post" enctype="multipart/form-data" onsubmit="getPath()">
					<div class="select-item">
						<input class="input-file" name="file" id="file" type="file">
					</div>
					<div class="select-item">
						<input class="input-file" name="path" id="path" type="hidden">
					</div>
					<div class="select-item">
						<input name="submit" type="submit" value="Enviar">
					</div>
					</form>
				</div>
			</div>			
		</div>
	</div>