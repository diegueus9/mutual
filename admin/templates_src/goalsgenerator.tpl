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
					<div class="item-label1">
						<img src='img/alert.gif' width="10" />
					</div>
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
					<div class="item-label1">
						<img src='img/metas.gif' />
					</div>
					<div class="item-data">
						<div class="item-data-labels">
						A Realizar en el {$mensaje}
						</div>
						<div class="item-data-text">
						Haga clik en el icono correspondiente para ver el listado en pdf o en texto plano.
						</div>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Nombre de Programa
					</div>
					<div class="item-data">
						Meta
					</div>
				</div>
				{foreach key =llave item=registro from=$data}
					{foreach key=nombre item=meta from=$registro}
						{if $llave%2==0}
							<div class="cont-item">
								<div class="item-label">
									<a href="Temp/Programas/{$nombre}.pdf" ><img src="img/mini-acrobat_ico.gif"/></a><a href="Temp/Programas/{$nombre}.txt" ><img src="img/mini-text-ico.gif"/></a>{$nombre}
								</div>
								<div class="item-data-sh">
									{$meta}
								</div>
							</div>
						{else}
							<div class="cont-item">
								<div class="item-label-sh">
									<a href="Temp/Programas/{$nombre}.pdf" ><img src="img/mini-acrobat_ico.gif"/></a><a href="Temp/Programas/{$nombre}.txt" ><img src="img/mini-text-ico.gif"/></a>{$nombre}
								</div>
								<div class="item-data">
									{$meta}
								</div>
							</div>
						{/if}
					{/foreach}
				{/foreach}
				
				<div class="cont-item">&nbsp;</div>				
			</div>
			<div class="consult-foot"></div>
		</div>		
		{/if}		
	</div>