<!DOCTYPE html>
<html>
<head>
  <title>Report</title>

  <style>
    .tabel{
      font-size: 16px;
      border-collapse: collapse;
    }
    .tabel2{
      padding-left:5px;
      border: 1px solid black;
    }
  </style>
</head>
<body style="font-family: arial; font-size: 16px" >
<center><table style='width:550px; font-size:8pt; font-family:calibri; border-collapse: collapse;' border = '0'>
<td width='70%' align='left' style='padding-right:80px; vertical-align:top'>
  <span style="font-size: 14pt; font-family: Calibri; font-weight: bold" > Darmaji e-buy</span>
  <br>Nama Penjual : </br>
  <br>Telepon : </br>
  <br>Alamat  : </br>
</td>

<!-- right info -->
<td style='vertical-align:top' width='20%' align='left'>
<b><span style='font-size:8pt'>FAKTUR PENJUALAN</span></b></br>
<br>Tanggal : </br>
<br>No Trans. : </br>
<br>id Pelanggan :</br>
</td>
</table>
<div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Unduh Bukti</a>
    </div>
<table style="width:550x; font-size: 8pt; font-family: calibri; border-collapse: collapse; border: 0" >
  <td width='70%'; align='left' style="padding-right: 80px; vertical-align: top" >
  </br>
  <br>Nama koustomer : </br>
  <br>Alamat  : </br>
  <br>telepon : </br>
  <br>status  : </br>
  </td>
</table>
  
<table cellspacing="0" style="width: 550px; font-size: 8pt; font-family: calibri; border-collapse: collapse;">

<tr align="center">
  <td width="20%" style="border-bottom:1px solid black;"> Kode Product</td>
  <td width="35%" style="border-bottom:1px solid black;"> Product Name</td>
  <td width="15%" style="border-bottom:1px solid black;"> Price (Rp)</td>
  <td width="5%" style="border-bottom:1px solid black;">Qty</td>
  <td width="27%" style="border-bottom:1px solid black;"> Ongkir</td>
  <td width="23%" style="border-bottom:1px solid black;"> Total Harga</td>

<tr><td align="center">T</td><td align="center">A</td><td align="center">Rp</td><td align="center">1</td><td align="center">Rp.0,00</td><td style='text-align:center;'>Rp.</td>
<tr><td align="center">T12</td><td align="center">T</td><td align="center">Rp</td><td align="center">1</td><td align="center">Rp.0,00</td><td style='text-align:center;'>Rp.</td></tr>
<tr><td colspan = '5'><div style='text-align:right'>Total Yang Harus Di Bayar Adalah : </div></td><td style='text-align:center;'>Rp</td></tr><tr><td colspan = '5'><div style='text-align:center;'>Terbilang :Rp</div></td></tr>
</tr>

</table>

</body>
</html>