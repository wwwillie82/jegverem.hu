<div class="data">
<div class="filter">
    <div class="select">
        <select onchange="GoToURL(this, 'admin/index/module:etlap|admin|index/category:');">
            <option value="">Összes kategória</option>
            <? foreach($categories as $cat): ?>
            <option value="<?php echo $cat->id; ?>" <? if($selected_category == $cat->id): ?>selected="selected"<? endif; ?>><?php echo $cat->title; ?></option>
            <? endforeach; ?>
        </select>
    </div>

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
	<th align="center" valign="middle" width="20">Id</th>
	<th align="left" valign="middle"><?php echo Localization::_("Megnevezés"); ?> <?php echo ColumnSorter::Make("admin/index", "products.name"); ?></th>
    <th align="left" valign="middle" width="180"><?php echo Localization::_("Kategória"); ?> <?php echo ColumnSorter::Make("admin/index", "cat_title"); ?></th>
	<th align="center" valign="middle" width="20"><img src="/images_admin/icons/icon_order.gif" alt="" /></th>
    <th align="center" valign="middle" width="40"><?php echo Localization::_("Szerkeszt"); ?></th>
	<th align="center" valign="middle" width="30" class="last"><?php echo Localization::_("Töröl"); ?></th>
</tr>
</thead>

<tbody>
<? $last_id = 0; foreach($products as $product): ?>
<tr <? if($products->IsOdd()): ?>class="dark"<? endif; ?> >
	<td align="center" valign="middle"><?php echo $product->id; ?></td>
    <td align="left" valign="middle"><?php echo $product->name; ?></td>
    <td align="left" valign="middle"><?php echo $product->cat_title; ?></td>

    <td align="center" valign="middle" align="left">
        <? if ($last_id > 0): ?>
        <a href="<?php echo ModuleHelper::GetFunctionLink("admin/index|switchproduct", array("from_id" => $last_id, "to_id" => $product->id)); ?>"><img src="/images_admin/icons/icon_order_switch.png" alt="" /></a>
        <? else: ?>
        <img src="/images_admin/icons/icon_order_switch_off.png" alt="" />
        <? endif; ?>
    </td>

	<td align="center" valign="middle">
		<a href="<?php echo ModuleHelper::GetFunctionLink("admin/edit", array("id" => $product->id)); ?>"><img src="/images_admin/icons/icon_edit.png" alt="Szerkeszt"/></a>
	</td>
	<td align="center" valign="middle" class="last"><a onclick="return DeleteRow();" href="<?php echo ModuleHelper::GetFunctionLink("admin/index/delete", array("id" => $product->id)); ?>"><img src="/images_admin/icons/icon_delete.png" alt="Szerkeszt"/></a></td>
</tr>

<? $last_id = $product->id; endforeach; ?>
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
 
