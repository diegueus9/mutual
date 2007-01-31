	<div class="display-cental">
		<div class="consult-title">Metas</div>
		{if $formulario == "ok"}
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				{if $error != ""}
				<div class="cont-item">
					<span>{$error}</span>
				</div>
				{/if}
				<form action="goalsgenerator.php" method="post">
				<div class="cont-item">
					<div class="item-label">
						<span>Las Metas aún no se han generado</span>
					</div>
					<div class="item-label">
						<img src='img/alert.gif' width="10" />
					</div>
					<!--div class="item-input">
						<select name="doc-type">
							<option value="-1">Selecione el tipo de documento</option>
							{foreach from=$optArray item=option}
							<option value='{$option.num}'>{$option.item}</option>							
							{/foreach}
						</select>
					</div-->
				</div>
				<div class="cont-item">
					<div class="item-label">
						Metas a Generar
					</div>
					<div class="item-input">
						<select name="goals-type">
							<option value="-1">Selecione el tipo de meta</option>
							<option value="0">Anuales</option>
							<option value="1">Mensuales</option>
							<option value="2">Diarias</option>
						</select>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						&nbsp;
					</div>
					<div class="item-input">
						<input name="submit" type="submit" value="Generar Metas" />
					</div>
				</div>
				<div class="cont-item">&nbsp;</div>				
				</form>
			</div>
			<div class="consult-foot"></div>
		</div>
		{else}
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				<div class="cont-item">
					<div class="item-label">
						<img src='img/metas.gif' />
					</div>
					<div class="item-data">
						<div class="item-data-labels">
						A Realizar en el {$mensaje}
						</div>
						<div class="item-data-text">
						Haga clik en el nombre del programa para ver el listado.
						</div>
					</div>
				</div>
				{foreach key =llave item=registro from=$data}
					{foreach key=nombre item=meta from=$registro}
							<div class="cont-item">
								<div class="item-label-sh">
									<a href="Temp/Programas/{$nombre}.txt" >{$nombre}</a>
								</div>
								<div class="item-data">
									{$meta}
								</div>
							</div>
					{/foreach}
				{/foreach}
				
				<div class="cont-item">&nbsp;</div>				
			</div>
			<div class="consult-foot"></div>
		</div>		
		{/if}		
	</div>