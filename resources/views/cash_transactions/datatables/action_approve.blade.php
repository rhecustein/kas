<td class="text-bold-500">
	<div class="btn-group gap gap-3 mb-3" role="group">
		<button type="button" class="btn btn-danger btn-sm delete" data-id="{{ $model->id }}">
			<i class="bi bi-trash-fill p-2"></i>Hapus
		</button>
		<button type="button" class="btn btn-success btn-sm approved-modal" data-id="{{ $model->id }}" data-bs-toggle="modal"
			data-bs-target="#approvedModal">
			<i class="bi bi-check-circle p-2"></i>Approved
		</button>
	</div>
</td>
