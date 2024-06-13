<script>
	$(function () {
			const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.approved.list') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{	data:"preview",name:"preview"},
				{ data: "student.name", name: "student_id" },
				{ data: "amount", name: "amount" },
				{ data: "category", name: "category" },
				{ data: "date_paid_formatted", name: "date_paid" },
				{ data: "action", name: "action" },
			],
		});

		$("#table").on("click", ".preview", function (e) {
			$("#to-preview").attr('src',$(this).data("src"));
		});

		$("#table").on("click", ".approved-modal", function () {

			Swal.fire({
				title: "Setujui?",
				text: "Transaksi tersebut akan disetujui!",
				icon: "warning",
				showCancelButton: true,
				reverseButtons: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				cancelButtonText: "Tidak",
				confirmButtonText: "Ya!",
			}).then((result) => {
				if (result.isConfirmed) {
					const id = $(this).data("id");
					console.log(id);
					$.ajax({
						url: `{{ route('api.v1.approved') }}`,
						method: "POST",
						data:{id:id},
						header: {
							"Content-Type": "application/json",
						},
						success: (res) => {
							Swal.fire({
										icon: "success",
										title: "Transaksi Berhasil Disetujui!",
										toast: true,
										position: "center",
										showConfirmButton: false,
										timer: 3000,
										timerProgressBar: true,
										didOpen: (toast) => {
											toast.addEventListener("mouseenter", Swal.stopTimer);
											toast.addEventListener("mouseleave", Swal.resumeTimer);
										},
								});
								table.ajax.reload();
						},
						error: (err) => {
							alert("error occured, check console");
							console.log(err);
						},
					});
				}
			});

		});

		$("#table").on("click", ".delete", function (e) {
			e.preventDefault();

			Swal.fire({
				title: "Hapus?",
				text: "Data tersebut akan dihapus!",
				icon: "warning",
				showCancelButton: true,
				reverseButtons: true,
				confirmButtonColor: "#3085d6",
				cancelButtonColor: "#d33",
				cancelButtonText: "Tidak",
				confirmButtonText: "Ya!",
			}).then((result) => {
				if (result.isConfirmed) {
					const id = $(this).data("id");
					const url =
						"{{ route('api.v1.datatables.cash-transactions.destroy', ':paramID') }}".replace(
							":paramID",
							id
						);

					$.ajax({
						url: url,
						method: "DELETE",
						success: (res) => {
							Swal.fire({
								icon: "success",
								title: "Data berhasil dihapus!",
								toast: true,
								position: "top-end",
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener("mouseenter", Swal.stopTimer);
									toast.addEventListener("mouseleave", Swal.resumeTimer);
								},
							});

							table.ajax.reload();
						},
					});
				}
			});
		});


	});
</script>
