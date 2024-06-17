@extends('layouts.app')

@if(Auth::user()->role->name == 'student')
	@section('title', 'Laporan Riwayat Transaksi')
@else
	@section('title', 'Laporan Transaksi Kas')
@endif

@section('page-heading')
<div class="page-heading">
	<div class="page-title">
		<div class="row">
			<div class="col-12 col-md-6 order-md-1 order-last">
				@if(Auth::user()->role->name == 'student')
				<h3>Laporan  Riwayat Transaksi </h3>
				@else
				<h3>Laporan Transaksi Kas</h3>
				@endif
				<p class="text-subtitle text-muted">Halaman laporan transaksi kas.</p>
			</div>
			<div class="col-12 col-md-6 order-md-2 order-first">
				<nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
					<ol class="breadcrumb">
						@if(Auth::user()->role->name == 'student')
						<li class="breadcrumb-item active" aria-current="page">
							Laporan Riwayat Transaksi
						</li>
						@else
						<li class="breadcrumb-item">
							<a href="{{ route('dashboard') }}">Dashboard</a>
						</li>
							<li class="breadcrumb-item active" aria-current="page">
							Laporan Transaksi Kas
						</li>
						@endif
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
		@include('utilities.alert')
		<div class="row">
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Hari Ini
								</h6>
								<h6 class="font-extrabold mb-0">{{ $cashTransactions['cashTransactionTodayCount'] }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Minggu Ini
								</h6>
								<h6 class="font-extrabold mb-0">{{ $cashTransactions['cashTransactionCurrentWeekCount'] }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Bulan Ini
								</h6>
								<h6 class="font-extrabold mb-0">{{ $cashTransactions['cashTransactionCurrentMonthCount'] }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
								<div class="stats-icon purple">
									<i class="iconly-boldChart"></i>
								</div>
							</div>
							<div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
								<h6 class="text-muted font-semibold">
									Total Tahun Ini
								</h6>
								<h6 class="font-extrabold mb-0">{{ $cashTransactions['cashTransactionCurrentYearCount'] }}</h6>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-12">
		<div class="card text-center">
			<div class="card-header">
				<h4>Filter Data dengan Rentang Tanggal</h4>
			</div>
			<div class="card-body">
				<form action="" method="GET">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group has-icon-left">
								<label for="start_date">Tanggal Mulai:</label>
								<div class="position-relative">
									<input type="date" class="form-control" value="{{ request('start_date') }}" name="start_date"
										id="start_date" placeholder="Masukkan tanggal mulai...">
									<div class="form-control-icon">
										<i class="bi bi-calendar2-fill"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group has-icon-left">
								<label for="end_date">Tanggal Akhir:</label>
								<div class="position-relative">
									<input type="date" class="form-control" value="{{ request('end_date') }}" name="end_date"
										id="end_date" placeholder="Masukkan tanggal akhir...">
									<div class="form-control-icon">
										<i class="bi bi-calendar2-fill"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary px-5">Filter</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

	@isset($cashTransactions['filteredResult'])
	<div class="col-12">
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table w-100 table-hover" id="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Pelajar</th>
								<th>Kategori</th>
								<th>Tanggal Transaksi</th>
								<th>Nominal Pembayaran</th>
								<th>Status</th>
								<th>Dicatat Oleh</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($cashTransactions['filteredResult'] as $cashTransaction)
							<tr>
								<td>{{ $loop->iteration }}</td>
								<td>{{ $cashTransaction->student->name }}</td>
								<td>{{ $cashTransaction->category }}</td>
								<td>{{ $cashTransaction->date_paid_formatted }}</td>
								<td>{{ $cashTransaction->amount_formatted }}</td>
								<td class="text-bold-500">
									<span class="badge {{$cashTransaction->approved?'text-bg-success':'text-bg-danger'}}">{{$cashTransaction->approved?'Terverifikasi':'Belum Terverifikasi'}}</span>
								</td>
								<td>{{ $cashTransaction->createdBy->name }}</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4" align="right"><b>Total</b></td>
								<td>{{ $cashTransactions['sum'] }}</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
	@endisset
</div>
@endsection


@pushOnce('scripts')
@endPushOnce
