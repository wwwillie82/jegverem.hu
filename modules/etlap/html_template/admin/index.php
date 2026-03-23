<div class="data">
<div class="filter">
    <div class="select">
        <select onchange="window.location=this.options[this.selectedIndex].value;">
            <option value="<?= ModuleHelper::GetFunctionLink("admin/index") ?>">Összes kategória</option>
            <?php foreach($categories as $cat): ?>
            <option value="<?= ModuleHelper::GetFunctionLink("admin/index", array("category" => $cat->id)) ?>" <?php if($selected_category == $cat->id): ?>selected="selected"<?php endif; ?>><?= $cat->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>

	<div class="search">
		<?= Form::StartForm("filter", ModuleHelper::GetFunctionLink("admin/index")) ?>
		<input type="text" name="search" value="<?= Localization::_("Keresés...") ?>" onfocus="if(this.value=='<?= Localization::_("Keresés...") ?>'){this.value=''}"
		       onblur="if(this.value==''){this.value='<?= Localization::_("Keresés...") ?>'}" class="input"/>
		<input type="submit" name="submit" value="" class="btn_search"/>
		<br class="clearfix"/>
		<?php Form::EndForm() ?>
	</div>
	<br class="clearfix"/>
</div>

<table class="list" cellpadding="10" cellspacing="0">
<thead>
<tr>
	<th align="center" valign="middle" width="20">Id</th>
	<th align="left" valign="middle"><?= Localization::_("Megnevezés") ?> <?= ColumnSorter::Make("admin/index", "products.name") ?></th>
    <th align="left" valign="middle" width="180"><?= Localization::_("Kategória") ?> <?= ColumnSorter::Make("admin/index", "cat_title") ?></th>
	<th align="center" valign="middle" width="20"><img src="/images_admin/icons/icon_order.gif" alt="" /></th>
    <th align="center" valign="middle" width="40"><?= Localization::_("Szerkeszt") ?></th>
	<th align="center" valign="middle" width="30" class="last"><?= Localization::_("Töröl") ?></th>
</tr>
</thead>

<tbody>
<?php $last_id = 0; foreach($products as $product): ?>
<tr <?php if($products->IsOdd()): ?>class="dark"<?php endif; ?> >
	<td align="center" valign="middle"><?= $product->id ?></td>
    <td align="left" valign="middle"><?= $product->name ?></td>
    <td align="left" valign="middle"><?= $product->cat_title ?></td>

    <td align="center" valign="middle" align="left">
        <?php if ($last_id > 0): ?>
        <a href="<?= ModuleHelper::GetFunctionLink("admin/index|switchproduct", array("from_id" => $last_id, "to_id" => $product->id)) ?>"><img src="/images_admin/icons/icon_order_switch.png" alt="" /></a>
        <?php else: ?>
        <img src="/images_admin/icons/icon_order_switch_off.png" alt="" />
        <?php endif; ?>
    </td>

	<td align="center" valign="middle">
		<a href="<?= ModuleHelper::GetFunctionLink("admin/edit", array("id" => $product->id)) ?>"><img src="/images_admin/icons/icon_edit.png" alt="Szerkeszt"/></a>
	</td>
	<td align="center" valign="middle" class="last"><a onclick="return DeleteRow();" href="<?= ModuleHelper::GetFunctionLink("admin/index/delete", array("id" => $product->id)) ?>"><img src="/images_admin/icons/icon_delete.png" alt="Szerkeszt"/></a></td>
</tr>

<?php $last_id = $product->id; endforeach; ?>
</tbody>
</table>


<div class="pages">
	<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => max(1, URI::GetNamedParam("page", 1)-1))) ?>" class="btn_prev">Előző oldal</a>

	<div class="pager">
		<?php for($i=1; $i<=$num_pages; $i++): ?>
		<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => $i)) ?>" <?php if($i==URI::GetNamedParam("page", 1)): ?> class="on" <?php endif; ?>><?= $i ?></a>
		<?php endfor; ?>
	</div>

	<a href="<?= ModuleHelper::GetFunctionLink("admin/index", array("page" => min($num_pages, URI::GetNamedParam("page", 1)+1))) ?>" class="btn_next">Következő oldal</a>
	<br class="clearfix"/>
</div>
</div>
 
