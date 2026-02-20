<div class="data">
<div class="filter">


	<div class="search">
		<?php echo Form::StartForm("filter", ModuleHelper::GetFunctionLink("admin/index")); ?>
		<input type="text" name="search" value="<?php echo Localization::_("Keresés..."); ?>" onfocus="if(this.value=='<?php echo Localization::_("Keresés..."); ?>'){this.value=''}"
		       onblur="if(this.value==''){this.value='<?php echo Localization::_("Keresés..."); ?>'}" class="input"/>
		<input type="submit" name="submit" value="" class="btn_search"/>
		<br class="clearfix"/>
		<? Form::EndForm() ?>
	</div>
	<br class="clearfix"/>
</div>

<table class="list" cellpadding="10" cellspacing="0">
<thead>
<tr>
	
	<th align="center" valign="middle" width="25">Id</th>
	<th align="center" valign="middle" width="70"><?php echo Localization::_("Kép"); ?></th>
	<th align="center" valign="middle"><?php echo Localization::_("Dátum"); ?> <?php echo ColumnSorter::Make("admin/index", "entry_date"); ?></th>
	<th align="center" valign="middle"><?php echo Localization::_("Cím"); ?> <?php echo ColumnSorter::Make("admin/index", "title"); ?></th>
	<th align="center" valign="middle" width="45"><?php echo Localization::_("Képek"); ?></th>
	<th align="center" valign="middle" width="40"><?php echo Localization::_("Aktív"); ?></th>
	<th align="center" valign="middle" width="40"><?php echo Localization::_("Szerkeszt"); ?></th>
	<th align="center" valign="middle" class="last" width="40"><?php echo Localization::_("Töröl"); ?></th>
</tr>
</thead>

<tbody>
<? foreach($galeriak as $galeria): ?>
<tr <? if($galeriak->IsOdd()): ?>class="dark"<? endif; ?> >

	<td align="center" valign="middle"><?php echo $galeria->id; ?></td>
	<td align="center" valign="middle">
		<div class="album_image">
			<? if($galeria->pic_path != ""): ?>
			<img src="/<?php echo $this->ImageCache($galeria->pic_path)->Crop($galeria->pic_data)->ResizeImage(100, 100)->CropCenter(56); ?>" alt="" />
			<? endif; ?>
		</div>
	</td>
	<td align="center" valign="middle" width="65"><?php echo $galeria->entry_date; ?></td>
	<td align="left" valign="middle"><?php echo $galeria->title; ?></td>
	<td align="center" valign="middle">
		<a href="<?php echo ModuleHelper::GetFunctionLink("admin/pictures", array("id" => $galeria->id)); ?>"><img src="/images_admin/icons/icon_images.png" alt="Képek" /></a>
		(<?php echo $galeria->count; ?>)
	</td>
	<td align="center" valign="middle">
		<? if($galeria->active == '0'): ?>
			<a href="<?php echo ModuleHelper::GetFunctionLink("admin/index/change_active", array("id" => $galeria->id, "active" => 1)); ?>"><img src="/images_admin/buttons/state_off.gif" alt="" /></a>
		<? else: ?>
			<a href="<?php echo ModuleHelper::GetFunctionLink("admin/index/change_active", array("id" => $galeria->id, "active" => 0)); ?>"><img src="/images_admin/buttons/state_on.gif" alt="" /></a>
		<? endif; ?>
	</td>

	<td align="center" valign="middle"><a href="<?php echo ModuleHelper::GetFunctionLink("admin/edit", array("id" => $galeria->id)); ?>"><img src="/images_admin/icons/icon_edit.png" alt="Szerkeszt"/></a></td>
	<td align="center" valign="middle" class="last"><a onclick="return DeleteRow();" href="<?php echo ModuleHelper::GetFunctionLink("admin/index/delete", array("id" => $galeria->id)); ?>"><img src="/images_admin/icons/icon_delete.png" alt="Szerkeszt"/></a></td>
</tr>
<? endforeach; ?>
</tbody>
</table>

<div class="pages">
	<a href="<?php echo ModuleHelper::GetFunctionLink("admin/index", array("page" => max(1, URI::GetNamedParam("page", 1)-1))); ?>" class="btn_prev">Előző oldal</a>

	<div class="pager">
		<? for($i=1; $i<=$num_pages; $i++): ?>
		<a href="<?php echo ModuleHelper::GetFunctionLink("admin/index", array("page" => $i)); ?>" <?if($i==URI::GetNamedParam("page", 1)): ?> class="on" <? endif; ?>><?php echo $i; ?></a>
		<? endfor; ?>
	</div>

	<a href="<?php echo ModuleHelper::GetFunctionLink("admin/index", array("page" => min($num_pages, URI::GetNamedParam("page", 1)+1))); ?>" class="btn_next">Következő oldal</a>
	<br class="clearfix"/>
</div>
</div>
 
