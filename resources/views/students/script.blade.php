<script>
	$(function () {
		const table = $("#table").DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('api.v1.datatables.students.index') }}",
			columns: [
				{ data: "DT_RowIndex", name: "DT_RowIndex" },
				{ data: "name", name: "name" },
				{ data: "school_year", name: "school_year" },
				{ data: "action", name: "action" },
			],
		});

		$("#createModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				name: $("#createModal form #name").val(),
				gender: $("#createModal form #gender").val(),
				school_year_start: $("#createModal form #school_year_start").val(),
				school_year_end: $("#createModal form #school_year_end").val(),
			};

			$.ajax({
				url: "{{ route('api.v1.datatables.students.store') }}",
				method: "POST",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					$("#createModal").modal("hide");

					Swal.fire({
						icon: "success",
						title: "Data Mahasiswa berhasil ditambahkan!",
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
				},
				error: (err) => {
					Swal.fire({
						icon: "warning",
						title: "Perhatian!",
						text: err.responseJSON.message,
					});
				},
			});
		});

		$("#table").on("click", ".show-modal", function () {
			const id = $(this).data("id");
			let url =
				"{{ route('api.v1.datatables.students.show', ':paramID') }}".replace(
					":paramID",
					id
				);

			$.ajax({
				url: url,
				method: "GET",
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {
					$("#showModal form #name").val(res.data.name);
					$("#showModal form #gender").val(res.data.gender_name);
					$("#showModal form #school_year_start").val(
						res.data.school_year_start
					);
					$("#showModal form #school_year_end").val(res.data.school_year_end);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#table").on("click", ".update-modal", function () {
			const id = $(this).data("id");
			let url =
				"{{ route('api.v1.datatables.students.show', ':paramID') }}".replace(
					":paramID",
					id
				);
			let updateURL =
				"{{ route('api.v1.datatables.students.update', ':paramID') }}".replace(
					":paramID",
					id
				);

			$.ajax({
				url: url,
				method: "GET",
				header: {
					"Content-Type": "application/json",
				},
				success: (res) => {

					$("#updateModal form #name").val(res.data.name);

					$("#updateModal form #gender").val(res.data.gender);
					$("#updateModal form #school_year_start").val(
						res.data.school_year_start
					);
					$("#updateModal form #school_year_end").val(res.data.school_year_end);

					$("#updateModal form").attr("action", updateURL);
				},
				error: (err) => {
					alert("error occured, check console");
					console.log(err);
				},
			});
		});

		$("#updateModal form").submit(function (e) {
			e.preventDefault();

			const formData = {
				name: $("#updateModal form #name").val(),
				gender: $("#updateModal form #gender").val(),
				school_year_start: $("#updateModal form #school_year_start").val(),
				school_year_end: $("#updateModal form #school_year_end").val(),
			};

			const updateURL = $("#updateModal form").attr("action");

			$.ajax({
				url: updateURL,
				method: "PUT",
				header: {
					"Content-Type": "application/json",
				},
				data: formData,
				success: (res) => {
					table.ajax.reload();
					$("#updateModal").modal("hide");

					Swal.fire({
						icon: "success",
						title: "Data Mahasiswa berhasil diubah!",
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
				},
				error: (err) => {
					Swal.fire({
						icon: "warning",
						title: "Perhatian!",
						text: err.responseJSON.message,
					});
				},
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
						"{{ route('api.v1.datatables.students.destroy', ':paramID') }}".replace(
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
						error: (err) => {
							Swal.fire({
								icon: "warning",
								title: "Perhatian!",
								text: err.responseJSON.message,
							});
						},
					});
				}
			});
		});
	});
</script>
