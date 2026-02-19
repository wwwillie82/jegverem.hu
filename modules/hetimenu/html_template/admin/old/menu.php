<div class="data">
<!--
<div class="filter">
	<div class="search">
		<?= Form::StartForm("filter", ModuleHelper::GetFunctionLink("admin/index")) ?>
		<input type="text" name="search" value="<?= Localization::_("Keresés...") ?>" onfocus="if(this.value=='<?= Localization::_("Keresés...") ?>'){this.value=''}"
		       onblur="if(this.value==''){this.value='<?= Localization::_("Keresés...") ?>'}" class="input"/>
		<input type="submit" name="submit" value="" class="btn_search"/>
		<br class="clearfix"/>
		<? Form::EndForm() ?>
	</div>
	<br class="clearfix"/>
</div>
-->


<table class="list" cellpadding="10" cellspacing="0">
<thead>
<tr>
	<th align="center" valign="middle" width="30">Id</th>
	<th align="left" valign="middle"><?= Localization::_("Hét") ?></th>
	<th align="center" valign="middle" width="50"><?= Localization::_("Szerkeszt") ?></th>
	<th align="center" valign="middle" class="last" width="50"><?= Localization::_("Töröl") ?></th>
</tr>
</thead>

<tbody>
<? foreach($menus as $menu): ?>
<tr <? if($menus->IsOdd()): ?>class="dark"<? endif; ?> >
	<td align="center" valign="middle"><?= $menu->id ?></td>
	<td align="left" valign="middle"><?= $menu->week ?></td>
	<td align="center" valign="middle"><a href="<?= ModuleHelper::GetFunctionLink("admin/edit_menu", array("week" => $menu->week, "companies_id" => $menu->companies_id)) ?>"><img src="/images_admin/icons/icon_edit.png" alt="Menük"/></a></td>
	<td align="center" valign="middle"><a href="<?= ModuleHelper::GetFunctionLink("admin/menu/delete", array("week" => $menu->week, "companies_id" => $menu->companies_id)) ?>"><img src="/images_admin/icons/icon_delete.png" alt="Szerkeszt"/></a></td>
</tr>
<? endforeach; ?>
</tbody>
</table>

<div class="pages">
	<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => max(1, URI::GetNamedParam("page", 1)-1))) ?>" class="btn_prev">Előző oldal</a>

	<div class="pager">
		<? for($i=1; $i<=$num_pages; $i++): ?>
		<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => $i)) ?>" <?if($i==URI::GetNamedParam("page", 1)): ?> class="on" <? endif; ?>><?= $i ?></a>
		<? endfor; ?>
	</div>

	<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => min($num_pages, URI::GetNamedParam("page", 1)+1))) ?>" class="btn_next">Következő oldal</a>
	<br class="clearfix"/>
</div>
</div>
 
