<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data barang</title>
</head>

<body>
    <h4>pilih barang</h4>
    <form action="<?php echo $_server["PHP_SELF"]; ?>" method="get">
        <table>
            <tr>
                <td>pilih barang</td>
                <td>:</td>
                <td>
                    <select name="id">
                        <?php
                        include "koneksi.php";
                        $sql = "SELECT id,namabarang FROM barang";
                        $hasil = mysqli_query($conn, $sql);
                        $no = 0;
                        while ($data  = mysqli_fetch_array($hasil)) {
                            $no++;
                            $ket = "";
                            if (isset($_GET['id'])) {
                                $id = trim($_GET['id']);
                                if ($id == $data['id']) {
                                    $ket =  "selected";
                                }
                            }
                        ?>
                            <option <?php echo $ket; ?> value="<?php echo $data['id']; ?>">
                                <?php echo $data['id']; ?> - <?php echo $data['namabarang']; ?>
                            </option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
                <td>
                    <input type="submit" name="submit" value="pilih">
                </td>
            </tr>
        </table>
    </form>

    <h2> Detaile Data Barang</h2>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM barang WHERE id =$id";
        $hasil = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($hasil);
    }
    ?>
    <table>
        <tr>
            <td>ID</td>
            <td>:</td>
            <td>
                <input type="text" name="id" value="<?php echo $data['id']; ?>">
            </td>
        </tr>
        <tr>
            <td>nama barang</td>
            <td>:</td>
            <td>
                <input type="text" name="namabarang" value="<?php echo $data['namabarang']; ?>">
            </td>
        </tr>
        <tr>
            <td>Harga</td>
            <td>:</td>
            <td>
                <input type="number" name="harga" value="<?php echo $data['harga']; ?>">
            </td>
        <tr>
            <td>Stok</td>
            <td>:</td>
            <td>
                <input type="number" name="stok" value="<?php echo $data['stok']; ?>">
            </td>
    </table>
</body>

</html>