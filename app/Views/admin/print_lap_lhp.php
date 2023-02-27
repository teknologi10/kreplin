<!DOCTYPE html>

<head>
    <title>Laporan Harian Produksi</title>
    <meta charset="utf-8">
    <style>
        #judul {
            text-align: center;
        }

        #halaman {
            /* width: 95%; */
            height: auto;
            position: absolute;
            border: 0px solid;
            padding-top: 10px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-family: Arial, Helvetica, sans-serif;

        }

        /* table,
        th,
        td {
            border: 1px solid;
            width: 100%;
            border-collapse: collapse;
            padding: 5px 5px 5px 5px;
            font-size: 9pt;
        } */

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 12px;
        }

        th {
            border: 1px solid #000000;
            text-align: center;
            vertical-align: middle;
            height: 12px;
            margin: 2px;
            background-color: #5f9ea0;
            font-size: 12px;
        }

        td {
            border: 1px solid #000000;
            /* text-align: center;
            height: 20px;
            margin: 8px;
            background-color: #5f9ea0; */
        }

        ol,
        ol li {
            margin-left: 0;
            padding-left: 0;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <table>
            <tr colspan="3">
                <td style="width:20%; border: 1px solid #ffffff;" nobr="true">
                    <img src="<?= base_url(); ?>/img/logo.png" alt="Girl in a jacket" style="text-align:right;">
                </td>
                <td colspan="11" style="border: 1px solid #ffffff;">
                    <h1 style="font-size:14px ;">PT Waskita Beton Precast Tbk. <br> Plant Subang</h1>

                </td>
            </tr>
        </table>
        <br>
        <center>
            <h4 id=judul style="text-align:center ;font-size:20px ;">
                Laporan Harian Produksi (LHP)
            </h4>
        </center>
        <br>
        <!-- <p>Nama : adsa</p> -->

        <table width="100%" cellpadding="4">
            <tr style="text-align:center ;">
                <th width="3%">No</th>
                <th width="10%">Plant</th>
                <th width="10%">No Sales Order</th>
                <th width="10%">Proyek</th>
                <th width="8%">Kode Material</th>
                <th width="10%">Jenis Produk</th>
                <th width="10%">Tipe Produk</th>
                <th width="9%">Tgl Produksi</th>
                <th width="5%">Vol PMO</th>
                <th width="5%">Ra Prod</th>
                <th width="5%">Ri Prod</th>
                <th width="5%">Reject</th>
                <th width="5%">Kumulasi</th>
                <th width="5%">Sisa Prod</th>
            </tr>
            <?php $no = 1;
            foreach ($lhp as $d) : ?>
                <tr>
                    <td style="text-align:center"><?= $no++; ?></td>
                    <td><?= $d['plant'] ?></td>
                    <td><?= $d['no_sales'] ?></td>
                    <td><?= $d['proyek'] ?></td>
                    <td><?= $d['kode_material'] ?></td>
                    <td><?= $d['jenis_produk'] ?></td>
                    <td><?= $d['tipe_produk'] ?></td>
                    <td style="text-align:center"><?= $d['tgl_produksi'] ?></td>
                    <td style="text-align:center"><?= $d['volume'] ?></td>
                    <td style="text-align:right"><?= $d['ra_pro'] ?></td>
                    <td style="text-align:right"><?= $d['ri_pro'] ?></td>
                    <td style="text-align:right"><?= $d['reject'] ?></td>
                    <td style="text-align:right"><?= kumulasi($d['id'], $d['kode_material']) ?></td>
                    <td style="text-align:right"><?= ($d['volume'] - kumulasi($d['id'], $d['kode_material'])) ?></td>
                </tr>
            <?php endforeach; ?>
            <tr style="text-align:center ;">
                <th colspan="9">Jumlah</th>
                <th style="text-align:right"><?= $total['ra']; ?></th>
                <th style="text-align:right"><?= $total['ri']; ?></th>
                <th style="text-align:right"><?= $total['re']; ?></th>
                <th colspan="2" style="background-color: #000000;"></th>
            </tr>
        </table>

        <!-- <p>menyatakan dengan sebenar-benarnya akan bersungguh-sungguh belajar dan bekerja.</p> -->
        <!-- <p></p>

        <div style="width: 50%; text-align: left; float: left;">Purwodadi, 20 Januari 2020</div><br>
        <div style="width: 50%; text-align: left; float: right;">Yang bertanda tangan,</div><br><br><br><br><br>
        <div style="width: 50%; text-align: left; float: left;">Arbrian Abdul Jamal</div> -->

    </div>
</body>

</html>