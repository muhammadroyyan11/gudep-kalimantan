<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Gudep</title>

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('/assets/images/client-bg.png');
            background-size: cover;
            /* Adjust the size as needed */
            background-repeat: no-repeat;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 8px;
            width: 400px;
        }

        .title-container {
            background: linear-gradient(to right, #1E90FF, #87CEEB);
            /* Gradien dari biru tua (#1E90FF) ke biru muda biru langit (#87CEEB) dari kiri ke kanan */
            padding: 10px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 15px;
        }



        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        /* Warna default untuk button */
        input[type="button"],
        input[type="submit"] {
            cursor: pointer;
            background: linear-gradient(to right, #1E90FF, #87CEEB);
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        /* Warna default untuk hover */
        input[type="button"]:hover,
        input[type="submit"]:hover {
            background: linear-gradient(to right, #87CEEB, #1E90FF);
            color: #1E90FF;
            /* Warna teks saat hover */
        }



        /* New style for the message container */
        .message-container {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            background-color: #4CAF50;
            color: white;
        }

        /* New style for the error container */
        .error-container {
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            background-color: #ff6347;
            /* Tomato color */
            color: white;
        }

        .footer {
            color: #1E90FF;
            text-align: center;
            padding: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="title-container">
            <img class="logo" src="assets/images/logo1.png" alt="Logo">
            <h2 style="color: #FFFFFF;">PENDAFTARAN NOMOR GUGUS DEPAN KWARCAB BULUNGAN</h2>
        </div>

        <form method="post" id="form" action="login/register_action">
            <label for="npsn">NPSN:</label>
            <input type="text" name="npsn" id="npsn" required>
            <input type="button" value="Cek" onclick="cekNPSN()">
            <br>

            <label for="nama_gudep">NAMA PANGKALAN:</label>
            <input type="text" name="nama_gudep" id="nama_gudep" readonly>
            <br>

            <label for="kwarran">KWARTIR RANTING:</label>
            <select name="kwarran" id="kwarran" required>
                <option value="" disabled selected>Silahkan Pilih Kwartir Ranting</option>
                <option value="Tanjung Selor">Tanjung Selor</option>
                <option value="Tanjung Palas">Tanjung Palas</option>
                <option value="Tanjung Palas Tengah">Tanjung Palas Tengah</option>
                <option value="Tanjung Palas Timur">Tanjung Palas Timur</option>
                <option value="Tanjung Palas Barat">Tanjung Palas Barat</option>
                <option value="Tanjung Palas Utara">Tanjung Palas Utara</option>
                <option value="Bunyu">Bunyu</option>
                <option value="Peso">Peso</option>
                <option value="Sekatak">Sekatak</option>
                <option value="Peso Hilir">Peso Hilir</option>
            </select>

            <br>

            <input type="submit" id="submit" name="submit" value="DAFTAR">
        </form>

        <!-- Conditionally show the message or error container -->
        <div class="footer">
            Kwartir Cabang Pramuka Bulungan | Kak Syahabudin
        </div>
    </div>

    <script>
        function cekNPSN() {
            var npsn = document.getElementById('npsn').value;
            var xhr = new XMLHttpRequest();
            console.log(npsn);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = xhr.responseText;
                    if (response === 'NPSN TIDAK DITEMUKAN' || response === 'Data tidak valid') {
                        showError("PANGKALAN ANDA TIDAK BERADA DI WILAYAH KWARCAB BULUNGAN");
                    } else {
                        clearError();
                        document.getElementById('nama_gudep').value = response;
                    }
                }
            };
            xhr.open('GET', '<?= site_url("cek") ?>?npsn=' + npsn, true);
            xhr.send();
        }

        // New function to show error message
        function showError(message) {
            var errorContainer = document.createElement('div');
            errorContainer.className = 'error-container';
            errorContainer.innerHTML = message;
            document.querySelector('.container').appendChild(errorContainer);
        }

        // New function to clear error messages
        function clearError() {
            var errorContainers = document.querySelectorAll('.error-container');
            errorContainers.forEach(function(container) {
                container.remove();
            });
        }
    </script>

    <script type="text/javascript">
        $("#form").submit(function(e) {
            e.preventDefault();
            var me = $(this);
            $("#submit").prop('disabled', true).html('Loading...');
            $(".form-group").find('.text-danger').remove();
            $.ajax({
                url: <?= url("login/register_action")?>,
                type: 'post',
                data: new FormData(this),
                contentType: false,
                cache: false,
                dataType: 'JSON',
                processData: false,
                success: function(json) {
                    if (json.success == true) {
                        location.href = json.redirect;
                        return;
                    } else {
                        $("#submit").prop('disabled', false)
                            .html('<?= cclang("save") ?>');
                        $.each(json.alert, function(key, value) {
                            var element = $('#' + key);
                            $(element)
                                .closest('.form-group')
                                .find('.text-danger').remove();
                            $(element).after(value);
                        });
                    }
                }
            });
        });
    </script>

</body>

</html>