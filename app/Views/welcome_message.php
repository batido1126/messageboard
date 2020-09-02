<!--右邊選單選項-->
<ul id=menu>
	<li><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#go-post">發文</button>
	<li><button type="button" class="btn btn-success" onclick="location.href='#'">TOP</button>
</ul>

<!--新增留言-->
<div class="modal" id="go-post" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">新留言</h4>
			</div>
			<form>
				<div class="modal-body">
					<p>使用者</p>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="insert-user"><br>
					<p>留言內容</p>
					<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="insert-comment">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default canceladdcommentval" data-dismiss="modal">取消</button>
					<button type="button" class="btn btn-primary" data-dismiss="modal" id="insert">送出</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!--刪除留言-->
<div class="modal" id="go-delete" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">確定刪除?</h4>
			</div>
			<div class="modal-body">
				<p>刪除後不可回復!</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">確定</button>
			</div>
		</div>
	</div>
</div>

<!--編輯留言-->
<div class="modal" id="go-edit" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">編輯留言</h4>
			</div>
			<div class="modal-body">
				<p>留言</p>
				<input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" id="update-comment">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal" id="update" data-id="">送出</button>
			</div>
		</div>
	</div>
</div>

<!--顯示留言-->
<div class="container pt-4">
	<div class="mx-auto">
		<table class="table table-striped table-dark" id="show">
			<thead>
				<tr>
					<th>使用者</th>
					<th>留言</th>
					<th>修改留言</th>
					<th>刪除留言</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>
</div>