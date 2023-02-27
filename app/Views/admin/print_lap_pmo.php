<!DOCTYPE html>

<head>
    <title>Perintah Mengerjakan Order</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            width: 95%;
            height: auto;
            position: absolute;
            border: 0px solid;
            padding-top: 10px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-family: Arial, Helvetica, sans-serif;

        }

        table,
        th,
        td {
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            padding: 5px 5px 5px 5px;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <table style="border: 0px;">
            <tr style="border: 0px;">
                <td style="width: 20%;border: 0px;">
                    <img src="<?= base_url(); ?>/img/logo.png" alt="Girl in a jacket" style="width: 80% ; text-align:right;">
                </td>
                <td colspan="2" style="width: 80%;border: 0px;">
                    <h1 style="font-size:14px ;">PT Waskita Beton Precast Tbk. <br> Plant Subang</h1>

                </td>
            </tr>
        </table>
        <h4 id=judul>Perintah Mengerjakan Order (PMO)</h4>
        <br>
        <!-- <p>Nama : adsa</p> -->

        <table style="width: 100%;">
            <tr style="text-align:center ;">
                <td style="width: 5%;">No</td>
                <td style="width: 35%;">Tgl PMO</td>
                <td style="width: 30%;">No PMO</td>
                <td style="width: 30%;">No Sales Order</td>
                <td style="width: 30%;">Kode Material</td>
                <td style="width: 30%;">Area</td>
                <td style="width: 30%;">Pelanggan</td>
                <td style="width: 30%;">Proyek</td>
                <td style="width: 30%;">Ket</td>
            </tr>
            <?php $no = 1;
            foreach ($pmo as $d) : ?>
                <tr>
                    <td style="width: 5%;text-align:center"><?= $no++; ?></td>
                    <td><?= $d['tgl_pmo'] ?></td>
                    <td><?= $d['no_pmo'] ?></td>
                    <td><?= $d['no_sales'] ?></td>
                    <td><?= $d['kode_material'] ?></td>
                    <td><?= $d['area'] ?></td>
                    <td><?= $d['nama_pelanggan'] ?></td>
                    <td><?= $d['nama_proyek'] ?></td>
                    <td><?= $d['ket'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>

        <!-- <p>menyatakan dengan sebenar-benarnya akan bersungguh-sungguh belajar dan bekerja.</p> -->
        <!-- <p></p>

        <div style="width: 50%; text-align: left; float: left;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;">Arbrian Abdul Jamal</div> -->

    </div>
</body>

</html>