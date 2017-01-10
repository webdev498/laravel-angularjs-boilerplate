<form ng-submit="updatePassword(modalData)">
	<div class="modal-header">
		<h3 class="modal-title">Edit</h3>
	</div>
	<div class="modal-body">


			<ul>
				<li>
					<label for="title">Title:</label>
					<input type="text" class="form-control" name="name" ng-model="modalData.name" placeholder="Name">
				</li>
			</ul>


	</div>
	<div class="modal-footer">
		<button class="btn btn-primary" ng-click="ok()">OK</button>
		<button class="btn btn-warning" ng-click="cancel()">Cancel</button>
	</div>
</form>
