	<div class="display-cental">
		<div class="consult-title">Grupos Etareos</div>
		{if $formulario == "ok"}
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				{if $error != ""}
				<div class="cont-item">
					<span>{$error}</span>
				</div>
				{/if}
				<form action="groupsgenerator.php" method="post">
				<div class="cont-item">
					<div class="item-label">
						<span>Los grupos etareo a�n no se han generado</span>
					</div>
					<div class="item-label">
						<img src='img/alert.gif' width="10" />
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						&nbsp;
					</div>
					<div class="item-input">
						<input name="submit" type="submit" value="Generar Grupos Etareos" />
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
						<img src='img/gen-group.gif' />
					</div>
					<div class="item-data">
						<div class="item-data-labels">
						Grupos Etareos
						</div>
						<div class="item-data-text">
						
						</div>
					</div>
				</div>
				<div class="cont-item">
								<div class="item-label-sh">
									Grupo Etareo
								</div>
								<div class="item-data">
									Cantidad de Afiliados que Pertenecen
								</div>
							</div>
				{foreach key =llave item=registro from=$data}
					{foreach key=nombre item=meta from=$registro}
						{if $llave%2==0}
							<div class="cont-item">
								<div class="item-label">
									{$nombre}
								</div>
								<div class="item-data-sh">
									{$meta}
								</div>
							</div>
						{else}
							<div class="cont-item">
								<div class="item-label-sh">
									{$nombre}
								</div>
								<div class="item-data">
									{$meta}
								</div>
							</div>
						{/if}
					{/foreach}
				{/foreach}
				<div class="cont-item">
					<div class="item-label-sh">
						Para ver el reporte de grupos etareos en texto plano haga click en el icono <a href="Temp/logGruposEtareos.txt" ><img src="img/text-ico.gif" /></a>
					</div>
					<div class="item-data-sh">
						Para ver el reporte de grupos etareos en pdf haga click en el icono <a href="Temp/logGruposEtareos.pdf" ><img src="img/acrobat_ico.gif" /></a>
					</div>
				</div>
				<div class="cont-item">&nbsp;</div>				
			</div>
			<div class="consult-foot"></div>
		</div>		
		{/if}		
	</div>