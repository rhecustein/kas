@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Halo , {{Auth::user()->name}}</h3>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection

@section('content')
<div class="vh-100 d-flex justify-content-center align-items-start w-100">
				<form  id="create-transaction" class="form form-vertical" style="max-width:560px;width:100%;">
					<div class="form-body">
						<div class="row">
							<input type="hidden" value="{{Auth::user()->id}}" id="student_id"/>

							<div class="col-md-12">
								<div class="form-group has-icon-left">
									<label for="student_id">Kategori:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="student_id">
											<div><i class="bi bi-clipboard-minus-fill"></i></div>
										</label>
										<select class="form-select form-select-sm" id="category">
											<option value="UKT">Uang Kuliah Tunggal</option>
											<option value="SPP">Sumbangan Pembinaan Pendidikan</option>
											<option value="Praktikum">Biaya Praktikum</option>
											<option value="Ujian">Biaya Ujian</option>
											<option value="SKS">Biaya SKS</option>
											<option value="Wisuda">Biaya Wisuda</option>
										</select>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="form-group has-icon-right">
									<label for="image">Foto bukti transaksi: </label>
									<div class="position-relative">
										<input type="file" accept="image/*" class="form-control" id="image"  />
										<div class="form-control-icon">
											<div class="bi  bi-card-image"></div>
										</div>
									</div>
								</div>

								<div class="form-group has-icon-left">
									<label for="amount">Tagihan:</label>
									<div class="position-relative">
										<input type="number" class="form-control" id="amount" placeholder="Masukan tagihan..." />
										<div class="form-control-icon">
											<div class="bi bi-cash"></div>
										</div>
									</div>
								</div>



								<div class="form-group has-icon-left">
									<label for="date_paid">Tanggal:</label>
									<div class="position-relative">
										<input type="date" class="form-control" id="date_paid" placeholder="Pilih tanggal..." />
										<div class="form-control-icon">
											<div class="bi bi-calendar-fill"></div>
										</div>
									</div>
								</div>

								<div class="form-group has-icon-left">
									<label for="transaction_note">Catatan:</label>
									<div class="position-relative">
										<textarea class="form-control" id="transaction_note" placeholder="Masukan catatan (opsional)..."
											rows="3"></textarea>
										<div class="form-control-icon">
											<div class="bi bi-card-text"></div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="col-md-12 d-flex justify-content-end gap-2">
							<button type="submit" class="btn btn-success">Buat Transaksi</button>
						</div>
					</div>
				</form>
</div>
@endsection

@pushOnce('scripts')
<script src="{{ asset('extensions/apexcharts/apexcharts.min.js') }}"></script>
@include('script_msh')
@endPushOnce
