	<div class="display-cental">
		<div class="consult-title">Programación de Disponibilidad</div>		
		<div class="consult">
			<div class="consult-top"></div>
			<div class="consult-body">
				{if $error != ""}
				<div class="cont-item">
					<span>{$error}</span>
				</div>
				{/if}
				<form action="availability.php" method="post">
				<div class="cont-item">
					<div class="item-label">
						Servicio:
					</div>
					<div class="item-input">
						<select name="doc-type">
							<option value="-1">Selecione el tipo de servicio</option>
							{foreach item=item from=$servicios}
							<option value='{$item.COD_SERVICIO}'>{$item.DESC_SERVICIO}</option>							
							{/foreach}
						</select>
					</div>
				</div>				
				<div class="cont-item">
					<div class="item-label">
						Unidad de Atención:
					</div>
					<div class="item-input">
						<select name="doc-type">
							<option value="-1">Selecione la unidad de atención</option>
							{foreach item=item from=$atencion}
							<option value='{$item.COD_CONSULTORIO}'>{$item.DESC_CONSULTORIO}</option>							
							{/foreach}
						</select>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Profesional:
					</div>
					<div class="item-input">
						<select name="doc-type">
							<option value="-1">Selecione Profesional</option>
							{foreach item=item from=$profecional}
							<option value='{$item.COD_PROFESIONAL}'>{$item.NOMBRE}</option>						
							{/foreach}
						</select>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Fecha:
					</div>
					<div class="item-input">
						<input type="text" id="fecha" />
						<button type="submit" id="button">...</button>
						{literal}
						<script type="text/javascript">
							Calendar.setup({
								inputField    : "fecha",
								button        : "button",
								ifFormat      : "%Y-%m-%d"
							});
						</script>
						{/literal}
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Hora de Inicio:
					</div>
					<div class="item-input">
						<select name="hora-ini">
							<option>12</option>
						</select> :
						<select name="min-ini">
							<option>00</option>
						</select> -
						<select name="jornada-ini">
							<option>AM</option>
							<option>PM</option>
						</select>
					</div>
				</div>
				<div class="cont-item">
					<div class="item-label">
						Hora de Finalización:
					</div>
					<div class="item-input">
						<select name="hora-ini">
							<option>12</option>
						</select> :
						<select name="min-ini">
							<option>00</option>
						</select> -
						<select name="jornada-ini">
							<option>AM</option>
							<option>PM</option>
						</select>
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
		<div class="consult">
			<table width="600" border="1">
				<tr>
					<td>&nbsp;</td>
				{foreach item=item from=$atencion}
					<td>{$item.DESC_CONSULTORIO}</td>				
				{/foreach}
				</tr>
				{foreach key=fecha item=array_consult from=$matriz}
				<tr>
					<td>{$fecha}</td>
					{foreach item=consultorio from=$atencion}
						{foreach key=strconsultorio item=contenido from=$array_consult}					
							{if $consultorio.DESC_CONSULTORIO == $strconsultorio}
								<td>{$contenido.NOMBRE}</td>
							{else}
								<td>--</td>
							{/if}
						{/foreach}
					{/foreach}
				</tr>				
				{/foreach}
			</table>
		</div>				
	</div>	