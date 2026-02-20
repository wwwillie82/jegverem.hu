<div class="data">
	<div class="form">
		<?php echo Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $id)), "post", "multipart/form-data"); ?>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Év kiválasztása"); ?></label>

			<div class="checkboxes">
				<select name="year">
					<? for($i=date("Y");$i<=date("Y")+1;$i++): ?>
						<?php echo HtmlBuilder::HtmlBuilder("option")->value($i, date("Y"))->html($i); ?>
					<? endfor; ?>
				</select>
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Hét kiválasztása"); ?></label>

			<div class="checkboxes">
				<select name="week">
					<? for($i=1;$i<=53;$i++): ?>
						<?php echo HtmlBuilder::HtmlBuilder("option")->value($i, date("W"))->html($i); ?>
					<? endfor; ?>
				</select>
			</div>
			<br class="clearfix"/>
			
			<div class="info">Aktuális hét: <?php echo date("W"); ?></div>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Extra menü"); ?></label>
			<textarea name="days[0]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Hétfő"); ?></label>
			<textarea name="days[1]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Kedd"); ?></label>
			<textarea name="days[2]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Szerda"); ?></label>
			<textarea name="days[3]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Csütörtök"); ?></label>
			<textarea name="days[4]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Péntek"); ?></label>
			<textarea name="days[5]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Szombat"); ?></label>
			<textarea name="days[6]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Kötelező"); ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>
</div>
