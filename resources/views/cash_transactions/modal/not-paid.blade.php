<div class="modal fade" id="notPaidModal" tabindex="-1">
	<div class="modal-dialog modal-lg modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="notPaidModalLabel">Belum Membayar Minggu Ini</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="row">
					@foreach ($cashTransaction['studentsNotPaidThisWeek'] as $student)
					<div class="col-6">
						<div class="card border rounded">
							<div class="card-body">
								<h5 class="card-title fw-bold">
									{{ $loop->iteration }}. {{ $student->name }}
								</h5>
								<span class="badge rounded-pill text-bg-{{ $student->gender === 1 ? 'info' : 'warning' }}">
									<i class="bi bi-{{ $student->gender === 1 ? 'gender-male' : 'gender-female' }}"></i>
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>
