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
            <tr>
                <td width="30%" colspan="2">No.PMO</td>
                <td colspan="7">: <?= $pmo['no_pmo'] ?></td>
            </tr>
            <tr>
                <td colspan="2">No Sales Order</td>
                <td colspan="7">: <?= $pmo['no_sales'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Area</td>
                <td colspan="7">: <?= $pmo['area'] ?></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 40%;">Nama Pelanggan</td>
                <td colspan="7" style="width: 55%;">: <?= $pmo['nama_pelanggan'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Nama Proyek</td>
                <td colspan="7">: <?= $pmo['nama_proyek'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Plant</td>
                <td colspan="7">: <?= $pmo['plant'] ?></td>
            </tr>
            <tr>
                <td colspan="2">Item</td>
                <td colspan="7"></td>
            </tr>
            <tr style="text-align:center ;">
                <td rowspan="<?= count($item) + 1 ?>" style="text-align:left"></td>
                <td rowspan="<?= count($item) + 1 ?>" style="text-align:left"></td>
                <td>No</td>
                <td>Kode Material</td>
                <td>Jenis</td>
                <td>Tipe</td>
                <td>Satuan</td>
                <td>Volume</td>
                <td>Ket</td>
            </tr>
            <?php $no = 1;
            foreach ($item as $d) : ?>
                <tr style="width: 55%;">
                    <td style="text-align:center"><?= $no++; ?></td>
                    <td><?= $d['kode_material'] ?></td>
                    <td><?= $d['jenis_produk'] ?></td>
                    <td><?= $d['tipe_produk'] ?></td>
                    <td><?= $d['satuan'] ?></td>
                    <td><?= $d['volume'] ?></td>
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