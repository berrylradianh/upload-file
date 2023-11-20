<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <form action="{{ url('uploadFile') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor_invoice" class="form-label">Nomor Invoice</label>
                <input class="form-control" name="nomor_invoice" type="text" id="nomor_invoice" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_invoice" class="form-label">Tanggal Invoice</label>
                <input class="form-control" name="tanggal_invoice" type="date" id="tanggal_invoice" required>
            </div>
            <div class="mb-3">
                <label for="jenis_pengiriman" class="form-label">Jenis Pengiriman</label>
                <select class="form-select" name="jenis_pengiriman" id="jenis_pengiriman" required>
                    <option value="Pilihan Satu" hidden>Pilihan Satu</option>
                    <option value="Internal kurir">Internal Kurir</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="total_invoice" class="form-label">Total Invoice</label>
                <input class="form-control" name="total_invoice" type="text" id="total_invoice" required>
            </div>
            <div class="mb-3">
                <label for="file_nomor_tanda_terima" class="form-label">File Nomor Tanda Terima</label>
                <input class="form-control" name="file_nomor_tanda_terima" type="file" id="file_nomor_tanda_terima" required>
            </div>
            <div class="mb-3">
                <label for="tanggal_pengiriman" class="form-label">Tanggal Pengiriman</label>
                <input class="form-control" name="tanggal_pengiriman" type="date" id="tanggal_pengiriman" required>
            </div>
            <input type="submit" class="btn btn-primary" value="Upload">
        </form>
    </div>

    <script>
        document.getElementById("total_invoice").addEventListener("input", function () {
            this.value = this.value.replace(/[^0-9]/g, '');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
