<div class="data">
	<div class="form">
		<?php echo Form::StartForm("edit", ModuleHelper::GetFunctionLink("admin/edit_menu", array("week" => $menus->week, "companies_id" => $menus->companies_id)), "post", "multipart/form-data"); ?>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Év kiválasztása"); ?></label>

			<div class="checkboxes">
				<!--<select name="year">
					<? for($i=date("Y");$i<=date("Y")+1;$i++): ?>
						<?php echo HtmlBuilder::HtmlBuilder("option")->value($i, $menus->year)->html($i); ?>
					<? endfor; ?>
			</select>-->
				<?php echo $menus->year; ?>
				<input type="hidden" name="year" value="<?php echo $menus->year; ?>" />
			</div>
			<br class="clearfix"/>
		</div>

		<div class="item">
			<label><span>*</span> <?php echo Localization::_("Hét kiválasztása"); ?></label>

			<div class="checkboxes">
				<!--<select name="week">
					<? for($i=1;$i<=42;$i++): ?>
						<?php echo HtmlBuilder::HtmlBuilder("option")->value($i, $menus->week)->html($i); ?>
					<? endfor; ?>
			</select>-->
			<?php echo $menus->week; ?>
			<input type="hidden" name="week" value="<?php echo $menus->week; ?>" />
			</div>
			<br class="clearfix"/>
		</div>
		
		<? $days = array("Extra Menü", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat"); ?>
		
		<? $i=1; foreach($menus as $menu): ?>
		<div class="item">
			<label><?php echo $days[$menu->day]; ?></label>
			<textarea name="days[<?php echo $menu->day; ?>]" class="textfield_small"><?php echo $menu->offer_text; ?></textarea>
			<br class="clearfix"/>
		</div>
		<? $i++; endforeach; ?>
		
		<? if($i < 7): ?>
		<? for($i;$i<=7;$i++): ?>
		<div class="item">
			<label><?php echo $days[$i-1]; ?></label>
			<textarea name="days[<?php echo $i-1; ?>]" class="textfield_small"></textarea>
			<br class="clearfix"/>
		</div>
		<? endfor; ?>
		<? endif; ?>

		<div class="item">
			<label><span class="required">* <?php echo Localization::_("Kötelező"); ?></span></label>
			<input type="submit" name="submit" value="Mentés" class="submit"/>
			<br class="clearfix"/>
		</div>
		<?php echo Form::EndForm(); ?>
	</div>
</div>
