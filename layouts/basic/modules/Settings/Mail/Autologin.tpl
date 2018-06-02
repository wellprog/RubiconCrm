{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}

<div class="autologinContainer">
	<div class="widget_header row">
		<div class="col-xs-12">
			{include file=\App\Layout::getTemplatePath('BreadCrumbs.tpl', $MODULE)}
			&nbsp;{\App\Language::translate('LBL_AUTOLOGIN_DESCRIPTION', $QUALIFIED_MODULE)}
		</div>
	</div>
	{assign var=ALL_ACTIVEUSER_LIST value=\App\Fields\Owner::getInstance()->getAccessibleUsers()}
	<ul id="tabs" class="nav nav-tabs nav-justified" role="tablist">
		<li role="presentation" class="active"><a href="#userListTab"  aria-controls="userListTab" role="tab" data-toggle="tab">{\App\Language::translate('LBL_USER_LIST', $QUALIFIED_MODULE)} </a></li>
		<li role="presentation"><a href="#configurationTab"  aria-controls="configurationTab" role="tab" data-toggle="tab">{\App\Language::translate('LBL_CONFIGURATION', $QUALIFIED_MODULE)} </a></li>
	</ul>
	<br />
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="userListTab">
			<table class="table table-bordered table-condensed themeTableColor userTable">
				<thead>
					<tr class="blockHeader" >
						<th class="mediumWidthType">
							<span>{\App\Language::translate('LBL_RC_USER', $QUALIFIED_MODULE)}</span>
						</th>
						<th class="mediumWidthType">
							<span>{\App\Language::translate('LBL_CRM_USER', $QUALIFIED_MODULE)}</span>
						</th>
					</tr>
				</thead>
				<tbody>
					{foreach from=$MODULE_MODEL->getAccountsList() key=KEY item=ITEM}
						{assign var=USERS value=$MODULE_MODEL->getAutologinUsers($ITEM.user_id)}
						<tr data-id="{$ITEM.user_id}">
							<td><label>{$ITEM.username}</label></td>
							<td>
								<select class="chzn-select users form-control" multiple name="users">
									{foreach key=OWNER_ID item=OWNER_NAME from=$ALL_ACTIVEUSER_LIST}
										<option value="{$OWNER_ID}" {if in_array($OWNER_ID, $USERS)} selected {/if} data-userId="{$CURRENT_USER_ID}">{$OWNER_NAME}</option>
									{/foreach}
								</select>
							</td>
						</tr>
					{/foreach}
				</tbody>
			</table>
		</div>
		<div role="tabpanel" class="tab-pane" id="configurationTab">
			{assign var=CONFIG value=Settings_Mail_Config_Model::getConfig('autologin')}
			<div class="pull-left pagination-centered ">
				<input class="configCheckbox" type="checkbox" name="autologinActive" id="autologinActive" value="1" {if $CONFIG['autologinActive']=='true'}checked=""{/if}>
			</div>
			<div class="col-xs-10 pull-left">
				<label for="autologinActive">{\App\Language::translate('LBL_AUTOLOGIN_ACTIVE', $QUALIFIED_MODULE)}</label>
			</div>
		</div>
	</div>
</div>
