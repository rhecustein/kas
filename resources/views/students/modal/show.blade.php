<div class="modal fade text-left" id="showModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Lihat Data Mahasiswa
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="name">Nama Lengkap:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="name" disabled />
										<div class="form-control-icon">
											<i class="bi bi-person-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="gender">Jenis Kelamin:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="gender" disabled />
										<div class="form-control-icon">
											<i class="bi bi-gender-male"></i>
										</div>
									</div>
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="email">Alamat Email:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="email" disabled />
										<div class="form-control-icon">
											<i class="bi bi-envelope-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="phone_number">Alamat Email:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="phone_number" disabled />
										<div class="form-control-icon">
											<i class="bi bi-telephone-fill"></i>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label for="school_year_start">Tahun Ajaran Masuk:</label>
									<div class="input-group">
										<input type="number" class="form-control" id="school_year_start"
											placeholder="Masukkan Tahun Ajaran Masuk..." disabled>
										<span class="input-group-text">-</span>
										<input type="number" class="form-control " id="school_year_end"
											placeholder="Masukkan tahun ajaran akhir..." disabled>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
