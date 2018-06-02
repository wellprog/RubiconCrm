{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
<button class="btn btn-primary add_lang btn-sm pull-right marginBottom10px">{\App\Language::translate('LBL_ADD_LANG', $QUALIFIED_MODULE)}</button>
<table  class="table tableRWD table-bordered table-condensed listViewEntriesTable">
	<thead>
		<tr class="blockHeader">
			<th><strong>{\App\Language::translate('LBL_Lang_label',$QUALIFIED_MODULE)}</strong></th>
			<th><strong>{\App\Language::translate('LBL_Lang_name',$QUALIFIED_MODULE)}</strong></th>
			<th><strong>{\App\Language::translate('LBL_Lang_prefix',$QUALIFIED_MODULE)}</strong></th>
			<th><strong>{\App\Language::translate('LBL_Lang_action',$QUALIFIED_MODULE)}</strong></th>
		</tr>
	</thead>
	<tbody>
		{foreach from=App\Language::getAll(false, true) item=LANG key=ID}
			<tr data-prefix="{$LANG['prefix']}">
				<td>{$LANG['label']}</td>
				<td>{$LANG['name']}</td>
				<td>{$LANG['prefix']}</td>
				<td>
					<a href="index.php?module=LangManagement&parent=Settings&action=Export&lang={$LANG['prefix']}" class="btn btn-primary btn-xs marginLeft10">{\App\Language::translate('Export',$QUALIFIED_MODULE)}</a>
					{if $LANG['isdefault'] neq '1'}
						<button class="btn btn-success btn-xs marginLeft10" data-toggle="confirmation" id="setAsDefault">{\App\Language::translate('LBL_DEFAULT',$QUALIFIED_MODULE)}</button>
						<button class="btn btn-danger btn-xs" data-toggle="confirmation" data-original-title="" id="deleteItemC">{\App\Language::translate('LBL_Delete',$QUALIFIED_MODULE)}</button>
					{/if}
				</td>
			</tr>
		{/foreach}
	</tbody>
</table>
