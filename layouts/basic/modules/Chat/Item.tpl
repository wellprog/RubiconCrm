{*<!-- {[The file is published on the basis of YetiForce Public License 3.0 that can be found in the following directory: licenses/LicenseEN.txt or yetiforce.com]} -->*}
{strip}
	<div class="chatItem {if \App\User::getCurrentUserId() == $ROW['userid']}active{/if}" data-cid="{$ROW['id']}">
		<div class="pull-right">
			<small>
				{\App\Fields\DateTime::formatToViewDate($ROW['created'])}
			</small>  
		</div>
		<div class="author">
			<i class="fa fa-comment-o" aria-hidden="true"></i>
			<span>{$ROW['user_name']}</span>
		</div>
		<div class="messages">{$ROW['messages']}</div>
	</div>
{/strip}
