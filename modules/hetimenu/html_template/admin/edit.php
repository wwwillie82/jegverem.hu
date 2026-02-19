<div class="data">
	<div class="form">
		<?= Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit", array("id" => $id)), "post", "multipart/form-data") ?>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Év kiválasztása") ?></label>

			<div class="checkboxes">
				<select name="year">
					<? for($i=date("Y");$i<=date("Y")+1;$i++): ?>
						<?= HtmlBuilder::HtmlBuilder("option")->value($i, date("Y"))->html($i) ?>
					<? endfor; ?>
				</select>
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Hét kiválasztása") ?></label>

			<div class="checkboxes">
				<select name="week">
					<? for($i=1;$i<=52;$i++): ?>
						<?= HtmlBuilder::HtmlBuilder("option")->value($i, date("W"))->html($i) ?>
					<? endfor; ?>
				</select>
			</div>
			<br class="clearfix"/>
			
			<div class="info">Aktuális hét: <?= date("W") ?></div>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Extra menü") ?></label>
			<textarea name="days[0]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Hétfő") ?></label>
			<textarea name="days[1]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Kedd") ?></label>
			<textarea name="days[2]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Szerda") ?></label>
			<textarea name="days[3]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Csütörtök") ?></label>
			<textarea name="days[4]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Péntek") ?></label>
			<textarea name="days[5]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		
		<div class="item">
			<label><span>*</span> <?= Localization::_("Szombat") ?></label>
			<textarea name="days[6]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span class="required">* <?= Localization::_("Kötelező") ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?= Form::EndForm() ?>
	</div>
</div>
