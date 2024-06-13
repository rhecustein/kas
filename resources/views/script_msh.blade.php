<script>
$(function(){
	$("#create-transaction").submit(function (e) {
			e.preventDefault();

			const formData = new FormData();
      formData.append('image', $("#image")[0].files[0]);
      formData.append('category',$("#category").val());
      formData.append('student_id',$("#student_id").val());
      formData.append('amount',$("#amount").val());
			formData.append('date_paid',$("#date_paid").val());
			formData.append('transaction_note',$("#transaction_note").val())

			$.ajax({
				url: "{{ route('api.v1.datatables.cash-transactions.store') }}",
				method: "POST",
				processData: false,
        contentType: false,
				data: formData,
				success: (res) => {
					Swal.fire({
						icon: "success",
						title: "Data transaksi kas berhasil ditambahkan!",
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




})
</script>
