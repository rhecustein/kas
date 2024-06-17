@extends('layouts.app')

@section('title', 'Dashboard')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row p-4">
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
					<button class="btn btn-success font-bold m-3 mb-5" data-bs-toggle="modal" data-bs-target="#guid"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-journal-text" viewBox="0 0 16 16">
  <path d="M5 10.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 0 1h-2a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5m0-2a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
  <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2"/>
  <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z"/>
</svg><span class="p-2">Panduan Transaksi</span></button>
				</nav>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="guid" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Tata Cara Bayar di Sistem Uang Kas Online</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
					<p class="h-6 p-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg> <span class="p-2 font-bold">Memulai Transaksi</span></p>
								<p class="p-3">1. Mengisi formulir pembayaran padahalam dashboard.</p>
								<p class="p-3">2. Upload foto bukti transaksi pada formulir transaksi.</p>
								<p class="p-3">3. Tekan Tombol "Buat Transaksi" untuk memulai proses pengajuan transaksi. </p>

<p class="h-6 p-3"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783"/>
</svg> <span class="p-2 font-bold"> Notifikasi Pembayaran</span></p>

<p class="p-3">1. Anda akan menerima notifikasi melalui email atau notifikasi dalam aplikasi mengenai status pembayaran.</p>
<p class="p-3">2. Periksa status pembayaran pada menu "Laporan Transaksi" <b>filter data dengan rentang tanggal</b> transaksi untuk menapilkan riwayat transaksi dan status transaksi.</p>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
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
											<option value="UKT"  selected>Uang Kuliah Tunggal</option>
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

								<div class="col-md-12">
								<div class="form-group has-icon-left">
									<label for="method">Metode Pembayaran:</label>
									<div class="input-group mb-3">
										<label class="input-group-text" for="student_id">
											<div><i class="bi bi-bank"></i></div>
										</label>
										<select class="form-select form-select-sm" id="method">
											<option value="Dana" selected>Dana</option>
											<option value="Setoran Tunai">Setoran Tunai</option>
										</select>
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
