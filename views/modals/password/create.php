<form ng-submit="submitPassword(modalData)">
	<div class="modal-header">
		<h3 class="modal-title">Create</h3>
	</div>
	<div class="modal-body">

		<div class="form-group">
			<select class="form-control" name="client_id" ng-model="modalData.client" ng-options="opt as opt.title for opt in clients"></select>
		</div>

		<div class="form-group">
			<input type="text" class="form-control" required="true" name="name" ng-model="modalData.name" placeholder="Name">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" required="true" name="username" ng-model="modalData.username" placeholder="Username">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" required="true" name="password" ng-model="modalData.password" placeholder="Password">
		</div>

		<div class="form-group">
			<input type="text" class="form-control" name="url" ng-model="modalData.url" placeholder="URL">
		</div>

		<div class="form-group">
			<textarea class="form-control" rows="3" name="note" ng-model="modalData.note" placeholder="make a note"></textarea>
		</div>

	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" ng-click="ok()">OK</button>
		<button class="btn btn-warning" ng-click="cancel()">Cancel</button>
	</div>
</form>
