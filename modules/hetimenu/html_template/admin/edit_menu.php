<div class="data">
	<div class="form">
		<?= Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit_menu", array("week" => $menus->week, "companies_id" => $menus->companies_id)), "post", "multipart/form-data") ?>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Év kiválasztása") ?></label>

			<div class="checkboxes">
				<!--<select name="year">
					<? for($i=date("Y");$i<=date("Y")+1;$i++): ?>
						<?= HtmlBuilder::HtmlBuilder("option")->value($i, $menus->year)->html($i) ?>
					<? endfor; ?>
			</select>-->
				<?= $menus->year ?>
				<input type="hidden" name="year" value="<?= $menus->year ?>" />
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?= Localization::_("Hét kiválasztása") ?></label>

			<div class="checkboxes">
				<!--<select name="week">
					<? for($i=1;$i<=42;$i++): ?>
						<?= HtmlBuilder::HtmlBuilder("option")->value($i, $menus->week)->html($i) ?>
					<? endfor; ?>
			</select>-->
			<?= $menus->week ?>
			<input type="hidden" name="week" value="<?= $menus->week ?>" />
			</div>
			<br class="clearfix"/>
		</div>
		
		<? $days = array("Extra Menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat"); ?>
		
		<? $i=1; foreach($menus as $menu): ?>
		<div class="item">
			<label><?= $days[$menu->day] ?></label>
			<textarea name="days[<?= $menu->day ?>]" class="textfield_small"><?= $menu->offer_text ?></textarea>
			<br class="clearfix"/>
		</div>
		<? $i++; endforeach; ?>
		
		<? if($i < 7): ?>
		<? for($i;$i<=7;$i++): ?>
		<div class="item">
			<label><?= $days[$i-1] ?></label>
			<textarea name="days[<?= $i-1 ?>]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		<? endfor; ?>
		<? endif; ?>

		<div class="item">
			<label><span class="required">* <?= Localization::_("Kötelező") ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?= Form::EndForm() ?>
	</div>
</div>
