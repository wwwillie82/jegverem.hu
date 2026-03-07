<div class="data">
<table class="list" cellpadding="10" cellspacing="0">
<thead>
<tr>
	
	<th align="center" valign="middle" width="30">Id</th>
	<th align="center" valign="middle" width="70"><?= Localization::_("Kép") ?></th>
	<th align="left" valign="middle"><?= Localization::_("Oldal") ?></th>
	<th align="center" valign="middle" width="70"><?= Localization::_("Sorrend") ?></th>
	<th align="center" valign="middle" width="50"><?= Localization::_("Szerkeszt") ?></th>
	<th align="center" valign="middle" class="last" width="40"><?= Localization::_("Töröl") ?></th>
</tr>
</thead>

<tbody>
<? foreach($covers as $cover): ?>
<tr <? if($covers->IsOdd()): ?>class="dark"<? endif; ?> >
	
	<td align="center" valign="middle"><?= $cover->id ?></td>
	<td align="center" valign="middle">
		<div class="album_image">
			<? if($cover->pic_path != ""): ?>
			<img src="/<?= $this->ImageCache($cover->pic_path)->Crop($cover->pic_data)->ResizeImage(100, 100)->CropCenter(56) ?>" alt="" />
			<? endif; ?>
		</div>
	</td>
	<td align="left" valign="middle"><?= $cover->name ?></td>
	<td align="center" valign="middle"><?= $cover->sort_order ?></td>
	<td align="center" valign="middle"><a href="<?= ModuleHelper::GetFunctionLink("admin/edit", array("id" => $cover->id)) ?>"><img src="/images_admin/icons/icon_edit.png" alt="Szerkeszt"/></a></td>
	<td align="center" valign="middle" class="last"><a onclick="return DeleteRow();" href="<?= ModuleHelper::GetFunctionLink("admin/index/delete", array("id" => $cover->id)) ?>"><img src="/images_admin/icons/icon_delete.png" alt="Töröl"/></a></td>
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
 
