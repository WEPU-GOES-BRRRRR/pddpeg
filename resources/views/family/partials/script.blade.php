<script>
    function loadDataTable()
    {
        new DataTable('#tabel_keluarga', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        });
    }

    function toggleModal(id)
    {
        $(`#${id}`).modal('show');
        let employee_id = $('#btn_tambah_data_keluarga').data('id')
        $('#form_tambah_keluarga').attr('data-id', employee_id)
    }

    function handleHapus(id) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda mungkin tidak bisa mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ config('app.url') }}/pegawai/hapus/${id}`,
                        method: 'POST',
                        data: {
                            _token: `{{ csrf_token() }}`,
                            _method: `DELETE`
                        },
                        success: function(response) {
                            Swal.fire({
                                title: response.title,
                                icon: response.icon,
                                text: response.text
                            }).then((result1) => {
                                if (result1.isConfirmed) {
                                    window.location.reload()
                                }
                            })
                        }
                    })
                }
            });
        }

        function loadData(id)
        {
            $('#canvas_data').html('');
            $('#canvas_tabel').attr('hidden');
            let html = ``;
            $.ajax({
                url: `{{ config('app.url') }}/keluarga/${id}/get`,
                method: 'GET',
                success: function(response) {
                    response.forEach((data, index) => {
                        html += `
                        <tr>
                            <td>${data.name}</td>
                            <td>${data.gender == 'man' ? 'Laki-laki' : 'Perempuan'}</td>
                            <td>${data.place_of_birth}, ${data.day_of_birth}</td>
                            <td>${data.status}</td>
                            <td>
                                <a href="#"
                                    class="btn btn-sm btn-primary">Detail</a>
                                    <a href="#"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="#"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        `
                    })
                    $('#btn_tambah_data_keluarga').attr('data-id', id);
                    $('#canvas_data').html(html)
                    $('#canvas_tabel').removeAttr('hidden');
                    loadDataTable()
                },
                error: function(erro) {
                    Swal.fire({
                        title: 'Mencari Data Keluarga',
                        icon: 'error',
                        text: 'Gagal menemukan data keluarga!'
                    }).then((resultWhenError) => {
                        if (resultWhenError.isConfirmed) {
                            window.location.reload()
                        }
                    })
                }
            })

        }

        function handleCari() {
            let employee_id = $('#employee').val()

            if (!employee_id) {
                Swal.fire({
                    title: `Peringatan`,
                    icon: `warning`,
                    text: `Harap pilih pegawai terlebih dahulu!`
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.reload()
                    }
                })
            } else {
                $('#canvas_data').html('')
                $('#canvas_tabel').attr('hidden');
                loadData(employee_id);
            }

        }

        function handleSubmit(e)
        {
            e.preventDefault()
            let employee_id = $('#form_tambah_keluarga').data('id')
            $.ajax({
                url: `{{ config('app.url') }}/keluarga/store/${employee_id}`,
                method: 'POST',
                data: {
                    _token: `{{ csrf_token() }}`,
                    name: $('#name').val(),
                    gender: $('#gender').val(),
                    place_of_birth: $('#place_of_birth').val(),
                    day_of_birth: $('#day_of_birth').val(),
                    status: $('#status').val()
                },
                success: function (response) {
                    Swal.fire({
                        title: response.title,
                        icon: response.icon,
                        text: response.text
                    }).then((result) => {
                        if (result.isConfirmed) {
                            loadData(response.id)
                        }
                    })
                },
                error: (error) => console.error(error)
            })
        }
</script>
