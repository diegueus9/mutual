	<div class="display-cental">
		<div class="consult-title">Consultar Afiliados</div>
		{if $formulario == "ok"}
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				<form action="usersearch.php" method="post">
				<div class="cont-item">
					<div class="item-label">
						Tipo de Documento
					</div>
					<div class="item-input">
						<select name="doc-type">
							<option value="-1">Selecione el tipo de documento</option>
							{foreach from=$optArray item=option}
							<option value='{$option.num}'>{$option.item}</option>							
							{/foreach}
						</select>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Numero del Documento
					</div>
					<div class="item-input">
						<input name="doc" type="text" />
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						&nbsp;
					</div>
					<div class="item-input">
						<input name="submit" type="submit" value="Consultar" />
					</div>
				</div>
				<div class="cont-item">&nbsp;</div>				
				</form>
			</div>
			<div class="consult-foot"></div>
		</div>
		{else}
		{$formulario}
		{/if}		
	</div>