	<div class="display-cental">
		<div class="consult-title">Consultar Afiliados</div>
		{if $formulario == "ok"}
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				{if $error != ""}
				<div class="cont-item">
					<span>{$error}</span>
				</div>
				{/if}
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
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				<div class="cont-item">
					<div class="item-label">
						<img src='{if $photo != ""}{$photo}{else}img/buddy-blue2.gif{/if}' />
					</div>
					<div class="item-data">
						<div class="item-data-labels">
							Apellido(s):<br /><br />
							Nombre(s):<br /><br />
							Documento:<br /><br />							
						</div>
						<div class="item-data-text">
							{$data.PRIMER_APELLIDO} {$data.SEGUNDO_APELLIDO}<br /><br />
							{$data.PRIMER_NOMBRE} {$data.SEGUNDO_NOMBRE}<br /><br />
							{$data.COD_TIPO_IDENTIFICACION2} {$data.NUMERO_IDENTIFICACION}<br /><br />
						</div>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Fecha de Nacimiento
					</div>
					<div class="item-data">
						{$data.FECHA_NACIMIENTO}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Sexo
					</div>
					<div class="item-data">
						{$data.SEXO}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Codigo de Afiliado
					</div>
					<div class="item-data">
						{$data.COD_AFILIADO}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Codigo de la Entidad Contratante
					</div>
					<div class="item-data">
						{$data.COD_ENTIDAD_CONTRATANTE2}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Nivel de Sisben
					</div>
					<div class="item-data">
						{$data.COD_NIVEL_SISBEN2}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Numero de la Ficha del Sisben
					</div>
					<div class="item-data">
						{$data.NUMERO_FICHA_SISBEN}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Codigo Grupo Poblacional
					</div>
					<div class="item-data">
						{$data.COD_GRUP_POBLACIONAL}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Fecha de afiliación SGSSS
					</div>
					<div class="item-data">
						{$data.FEC_AFILIACION_SGSSS}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Fecha de afiliación a la entidad contratante
					</div>
					<div class="item-data">
						{$data.FEC_AFILIACION_ENTIDAD_CONTRATANTE}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Numero de contrato con el Ente Territorial
					</div>
					<div class="item-data">
						{$data.NUM_CONTRATO_ENTE_TERRITORIAL}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Fecha inicial contrato Ente Territorial
					</div>
					<div class="item-data">
						{$data.FECHA_INICIO_CONTRATO_ENTE_TERRITORIAL}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Tipo de Contrato
					</div>
					<div class="item-data">
						{$data.TIPO_CONTRATO_ENTE_TERRITORIAL}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label-sh">
						Estado de Afiliación
					</div>
					<div class="item-data">
						{$data.ESTADO_AFILIACION}
					</div>
				</div>
				<div class="cont-item">&nbsp;</div>				
			</div>
			<div class="consult-foot"></div>
		</div>		
		{/if}		
	</div>