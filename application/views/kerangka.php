
<html>
<head>
	<title>Laporan Surat kontrol </title>
</head>
<style type="text/css">
	body{
		font-family: Helvetica;
		font-size: 12;
	}
	table{
		border-collapse: collapse; width: 100%;
		font-size: 11px;
	}

	</style>
	<script type="text/JavaScript">

		function cetak(tombol){
			tombol.style.visibility='collapse';
			if(tombol.style.visibility=='collapse'){
				if(confirm('Anda Yakin Mau Mencetak ?')){
					setTimeout('window.print()','1000');
					setTimeout('window.close()','2000');
			}
			else{
				tombol.style.visibility='visible';
			}

			}
		}
</script>
<body>
	<table>
		<tr>
			<td>
				<div>
					<tr id="trTombol">
						<td id="trTombol" class="noline" colspan="5" align="right">
							<input id="btnPrint" type="button" value="Print" onClick="cetak(document.getElementById('trTombol'));"/>
							<input id="btnTutup" type="button" value="Tutup" onClick="window.close();"/></td>
							</tr>
						</div>
					</td>
				</tr>
			</table>

				<table align="center" style="padding-top:10px;" border="1">
					<thead>
						<tr>
							<th colspan="19">
								<table border="0">
									<tr>
										<th width="10" rowspan="4"><img style="width:70px; height:70px;" src="<?php echo base_url(); ?>logo.jpg"></th>
										<th width="600" align="left" style="font-size:14px;"><strong>RUMAH SAKIT BHAYANGKARA KEDIRI</strong></th>
										</tr>
										<tr>
											<th width="600" align="left" style="font-size:16px;"><strong>LAPORAN SURAT KONTROL</strong></th>
										</tr>
										 <?php  $no=1;
										 if (is_array($poli) && count($poli) > 0) {
						 foreach ($poli as $row) {
                                        ?>
										<tr>
											<th width="600" align="left"><strong> POLI : <?php echo $row->nm_poli;?></strong></th>
										</tr>
									 <?php 
						}	
					} 
				else{
					?>
					<tr>
					<th width="600" align="left"><strong> POLI : -</strong></th>
				</tr>
				   <?php 

					}
				
				?>
										<!-- <tr> -->
											<th width="600" align="left"><strong><?php echo $periode ?> : <?php echo $tgl_rencana_kontrol?> s/d <?php echo $tgl_rencana_kontrol2?></strong></th>
										<!-- </tr>  -->
									</table>
								</th>
							
							</tr>
							<tr>
								<th width="10" align ="center">NO</th>

								<th width="60" align ="center">NO SURAT KONTROL</th>
								<th width="50" align ="center">TGL RENCANA KONTROL</th>
								<th width="80" align ="center">NO SEP</th>
								<th width="50" align ="center">NO KARTU</th>
								<th width="120" align ="center">NAMA PASIEN</th>
								<th width="50" align ="center">POLI</th>
								<th width="70" align ="center">DIAGNOSA</th>
							</tr>
						</thead>
						 <?php  $no=1;
						 if (is_array($preview) && count($preview) > 0) {
						 foreach ($preview as $row) {
                                        ?>
									<tr>
					<td align="center" ><?php echo $no++?></td>

					<td align="center" ><?php echo $row->no_surat_kontrol?></td>
					<td align="center" ><?php echo $row->tgl_rencana_kontrol?></td>

					<td align="center" ><?php echo $row->no_sep?></td>

					<td align="center" ><?php echo $row->no_kartu?></td>

					<td align="center" ><?php echo $row->nm_pasien?></td>

					<td align="center" ><?php echo $row->nm_poli?></td>

					<td align="center" ><?php echo $row->diagnosa?></td>

				</tr>
				   <?php 
						}	
					} 
				else{
					?>
					<tr>
					<td height="70" width="20" align="center" colspan="19"><strong><font size="12">TIDAK ADA DATA</font></strong></td>
				</tr>
				   <?php 

					}
				
				?>
				                         
</table>
<table align="center" style="padding-top: 10px;" border="0">
	<tr>
		<td width="1200" align="right" style="font-size:12px;">Kediri, <?php echo $tgl?></td>                   
	</tr>
</table>
<table border="0">
	<tr>
		<td valign="top">
			<table align="left" style="padding-top:12px; padding-left:20px;" border="0" >
				<!-- <tr>
					<td colspan="4"><strong>RESUME:</strong></td>                    
				</tr>
				<tr>
					<td width="60">Jumlah Laki-Laki</td>
					<td width="80">: 0 Pasien</td>
				
				</tr>
				<tr>
					<td>Jumlah Perempuan</td>
					<td>: 0 Pasien</td>
					
				</tr> -->
				<!-- <tr>
					<td>Jumlah Pasien Baru</td>
					<td>: 0 Pasien</td>
					<td>Rumah Sakit</td>
					<td>: 0 Pasien</td>
				</tr>
				<tr>
					<td>Jumlah Pasien Lama</td>
					<td>: 0 Pasien</td>
					<td>Jumlah Kunjungan</td>
					<td>: 0 Pasien</td>
				</tr>
				<tr>
					<td>Umum</td>
					<td>: 0 Pasien</td>
					<td>Jumlah Kunjungan Batal</td>
					<td>: 0 Pasien</td>
				</tr>
				<tr>
					<td>Asuransi</td>
					<td>: 0 Pasien</td>
					<td>Total Jumlah Kunjungan</td>
					<td>: 0 Pasien</td>
				</tr> -->
			</table>
		</td>
		<!-- HAPUS -->

		<td width="5"></td>
		<td width="180">
			<table align="left" style="padding-top:20px; padding-left:600px;" border="0">
				<tr>
					<td align="center"><strong>PETUGAS</strong></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td>&nbsp;</td>
				</tr>
				<tr>
					<td style="font-size:12px;" align="center"><strong><u>Administrator</u></strong></td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</body>
</html>


