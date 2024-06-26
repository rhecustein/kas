<div class="modal fade text-left" id="createModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
					Tambah Data Mahasiswa
				</h5>
				<button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
					<i data-feather="x"></i>
				</button>
			</div>
			<div class="modal-body">
				<form class="form form-vertical">
					<div class="form-body">
						<div class="row">
							{{--<div class="col-lg-4">
								 <div class="form-group has-icon-left d-none">
									<label for="student_identification_number">NIP/NPM:</label>
									<div class="position-relative">
										<input type="number" class="form-control" id="student_identification_number"
											placeholder="Masukkan NIP/NPM" />
										<div class="form-control-icon">
											<div class="bi bi-person-badge-fill"></div>
										</div>
									</div>
								</div>
							</div> --}}
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="name">Nama Lengkap:</label>
									<div class="position-relative">
										<input type="text" class="form-control" id="name" placeholder="Masukkan nama lengkap..." />
										<div class="form-control-icon">
											<i class="bi bi-person-fill"></i>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group has-icon-left">
									<label for="gender">Jenis Kelamin:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="gender">
											<div><i class="bi bi-gender-male"></i></div>
										</label>
										<select class="form-select" id="gender">
											<option value="">Pilih Jenis Kelamin</option>
											<option value="1">Laki-laki</option>
											<option value="2">Perempuan</option>
										</select>
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
											placeholder="Masukkan Tahun Ajaran Masuk..." value="2020">
										<span class="input-group-text">-</span>
										<input type="number" class="form-control " id="school_year_end"
											placeholder="Masukkan tahun ajaran akhir..." value="2023">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Tambah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
