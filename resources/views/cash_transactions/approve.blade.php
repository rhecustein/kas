@extends('layouts.app')

@section('title', 'Data transaksi belum disetujui')

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				<h3>Transaksi belum disetujui</h3>
				<p class="text-subtitle text-muted">Halaman untuk manajemen data transaksi belum disetujui ,untuk validasi transaksi.
				</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">
							Data transaksi belum disetujui
						</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
</div>
@endsection


@section('content')
<div class="row">
	<div class="col-12">
			<div class="col-12">
				<div class="card">
					<div class="card-body px-3 py-4">
						<div class="row">
							<div class="col-md-4">
								<div class="stats-icon red">
									<i class="iconly-boldActivity"></i>
								</div>
							</div>
							<div class="col-md-8">
								<h6 class="text-muted font-semibold">Total Transaksi Belum Disetujui</h6>
								<h6 class="font-extrabold mb-0">{{$transactionCount}}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>

		<div class="card">
			<div class="card-body">
				<div class="col card">

					<div class="table-responsive">
						<table class="table w-100 table-hover" id="table">
							<thead>
								<tr>
									<th>#</th>
									<th scope="col">Foto Bukti Transaksi</th>
										<th scope="col">Nama Mahasiswa</th>
										<th scope="col">Metode Transaksi</th>
										<th scope="col">Total Bayar</th>
										<th scope="col">Kategori</th>
										<th scope="col">Tanggal</th>
										<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@pushOnce('modal')
@include('cash_transactions.modal.preview')
@endpushOnce

@pushOnce('scripts')
@include('cash_transactions.script_approve')
@endPushOnce

