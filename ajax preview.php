<script type="text/javascript">
    $(function(){
      $.fn.datebox.defaults.formatter = function(date){
                    var y = date.getFullYear();
                    var m = date.getMonth()+1;
                    var d = date.getDate();
                    return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
            };
            
            $.fn.datebox.defaults.parser = function(s){
		if (!s) return new Date();
		var ss = s.split('-');
		var y = parseInt(ss[0],10);
		var m = parseInt(ss[1],10);
		var d = parseInt(ss[2],10);
		if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
			return new Date(y,m-1,d);
		} else {
			return new Date();
		}
            };  
    });
    
function preview()
{
    var cmbinstalasi= $("#cmbinstalasi_lapregkun").combobox('getValue');    
    // var opts = $("#cmbunit_lapregkun").combobox('options');
    // var cmbunit = $("#cmbunit_lapregkun").combobox('getValue');
    // if (opts.separator == ','){
    var  cmbunit = $("#cmbunit_lapregkun").combobox('getValues');
		// cmbunit = String(cmbunit).replace(",","','","gi");
    // }
    
    // var opts2 = $("#cmbpenjamin_lapregkun").combobox('options');
    // var cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValue');
    // if (opts2.separator == ','){
    var cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValues');
		// cmbpenjamin = String(cmbpenjamin).replace(",", "','", "gi");
  //   }
	
	// var opts4 = $("#cmbshift_lapregkun").combobox('options');
    // var cmbshift = $("#cmbshift_lapregkun").combobox('getValue');
    // if (opts4.separator == ','){
        cmbshift = $("#cmbshift_lapregkun").combobox('getValues');
		// cmbshift = String(cmbshift).replace(",", "','", "gi");
  //   }
    
    var ckstatus = $("#ckstatusbatal_lapregkun").prop('checked'); 
    var ckstatustidakbatal = $("#cktidakbatal_lapregkun").prop('checked');
    var ckkonsul_lapregkun = $("#ckkonsul_lapregkun").prop('checked');

    var txtperiode1= $("#txtperiode1_lapregkun").textbox('getValue');
    var txtperiode2= $("#txtperiode2_lapregkun").textbox('getValue');
    var namaunit= $("#cmbunit_lapregkun").combobox('getText');
    //var namapenjamin= $("#cmbpenjamin_lapregkun").combobox('getValue');
    var kd_ruangperawatan = $("#cmbruang_lapregkun").combobox('getValues');
    var nama_ruangperawatan = $("#cmbruang_lapregkun").combobox('getText');
    var kd_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getValues');
    var nama_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getText');
    
    var cmbcara_keluar = $("#cmbcara_keluar").combobox('getValues');
    var cmbdiagnosa_primer = $("#cmbdiagnosa_primer").combobox('getValues');
    var cmbdiagnosa_sekunder = $("#cmbdiagnosa_sekunder").combobox('getValues'); 
    var cmbjenis_akses = $("#cmbjenis_akses").combobox('getValues');  
    var cmbdokter = $("#cmbdokter").combobox('getValues'); 
    var cmbkelpenjamin = $("#cmbkelpenjamin_lapregkun").combobox('getValue'); 
    
    var url = 'index.php/laporan/laporan_verif_register_kunjungan/preview?cmbinstalasi='+cmbinstalasi+'&cmbunit='+cmbunit+'&cmbshift='+cmbshift
        +'&txtperiode1='+txtperiode1+'&txtperiode2='+txtperiode2+'&namaunit='+namaunit+'&cmbpenjamin='+cmbpenjamin+'&ckstatus='+ckstatus
        +'&ckstatustidakbatal='+ckstatustidakbatal+'&kd_ruangperawatan='+kd_ruangperawatan+'&nama_ruangperawatan='+nama_ruangperawatan
        +'&kd_kamarperawatan='+kd_kamarperawatan+'&nama_kamarperawatan='+nama_kamarperawatan+'&cmbcara_keluar='+cmbcara_keluar
        +'&cmbdiagnosa_primer='+cmbdiagnosa_primer+'&cmbdiagnosa_sekunder='+cmbdiagnosa_sekunder+'&ckkonsul_lapregkun='+ckkonsul_lapregkun
        +'&cmbjenis_akses='+cmbjenis_akses+'&cmbdokter='+cmbdokter+'&cmbkelpenjamin='+cmbkelpenjamin;
    var win = window.open(url, '_blank');
    win.focus();
}

function preview2()
{
    var cmbinstalasi= $("#cmbinstalasi_lapregkun").combobox('getValue');    
    var opts = $("#cmbunit_lapregkun").combobox('options');
    var cmbunit = $("#cmbunit_lapregkun").combobox('getValue');
    if (opts.separator == ','){
        cmbunit = $("#cmbunit_lapregkun").combobox('getValues');
        //cmbunit = String(cmbunit).replace(",","','");
		cmbunit = String(cmbunit).replace(",","','","gi");
    }
    
    var opts2 = $("#cmbpenjamin_lapregkun").combobox('options');
    var cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValue');
    if (opts2.separator == ','){
        cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValues');
        //cmbpenjamin = String(cmbpenjamin).replace(",","','");
		cmbpenjamin = String(cmbpenjamin).replace(",", "','", "gi");
    }
	
	var opts4 = $("#cmbshift_lapregkun").combobox('options');
    var cmbshift = $("#cmbshift_lapregkun").combobox('getValue');
    if (opts4.separator == ','){
        cmbshift = $("#cmbshift_lapregkun").combobox('getValues');
        //cmbpenjamin = String(cmbpenjamin).replace(",","','");
		cmbshift = String(cmbshift).replace(",", "','", "gi");
    }
    
    var ckstatus = $("#ckstatusbatal_lapregkun").prop('checked'); 
    var ckstatustidakbatal = $("#cktidakbatal_lapregkun").prop('checked');
    var ckkonsul_lapregkun = $("#ckkonsul_lapregkun").prop('checked');

    var txtperiode1= $("#txtperiode1_lapregkun").textbox('getValue');
    var txtperiode2= $("#txtperiode2_lapregkun").textbox('getValue');
    var namaunit= $("#cmbunit_lapregkun").combobox('getText');
    //var namapenjamin= $("#cmbpenjamin_lapregkun").combobox('getValue');
    var kd_ruangperawatan = $("#cmbruang_lapregkun").combobox('getValues');
    var nama_ruangperawatan = $("#cmbruang_lapregkun").combobox('getText');
    var kd_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getValues');
    var nama_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getText');
    
    var cmbcara_keluar = $("#cmbcara_keluar").combobox('getValues');
    var cmbdiagnosa_primer = $("#cmbdiagnosa_primer").combobox('getValues');
    var cmbdiagnosa_sekunder = $("#cmbdiagnosa_sekunder").combobox('getValues');
    var cmbkelpenjamin = $("#cmbkelpenjamin_lapregkun").combobox('getValue');
    
    var url = 'index.php/laporan/laporan_verif_register_kunjungan_pdf/preview?cmbinstalasi='+cmbinstalasi+'&cmbunit='+cmbunit+'&cmbshift='+cmbshift
        +'&txtperiode1='+txtperiode1+'&txtperiode2='+txtperiode2+'&namaunit='+namaunit+'&cmbpenjamin='+cmbpenjamin+'&ckstatus='+ckstatus
        +'&ckstatustidakbatal='+ckstatustidakbatal+'&kd_ruangperawatan='+kd_ruangperawatan+'&nama_ruangperawatan='+nama_ruangperawatan
        +'&kd_kamarperawatan='+kd_kamarperawatan+'&nama_kamarperawatan='+nama_kamarperawatan+'&cmbcara_keluar='+cmbcara_keluar
        +'&cmbdiagnosa_primer='+cmbdiagnosa_primer+'&cmbdiagnosa_sekunder='+cmbdiagnosa_sekunder+'&ckkonsul_lapregkun='+ckkonsul_lapregkun+'&cmbkelpenjamin='+cmbkelpenjamin;
    var win = window.open(url, '_blank');
    win.focus();
}

function preview3()
{
    var cmbinstalasi= $("#cmbinstalasi_lapregkun").combobox('getValue');    
    var opts = $("#cmbunit_lapregkun").combobox('options');
    var cmbunit = $("#cmbunit_lapregkun").combobox('getValue');
    if (opts.separator == ','){
        cmbunit = $("#cmbunit_lapregkun").combobox('getValues');
        //cmbunit = String(cmbunit).replace(",","','");
		cmbunit = String(cmbunit).replace(",","','","gi");
    }
    
    var opts2 = $("#cmbpenjamin_lapregkun").combobox('options');
    var cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValue');
    if (opts2.separator == ','){
        cmbpenjamin = $("#cmbpenjamin_lapregkun").combobox('getValues');
        //cmbpenjamin = String(cmbpenjamin).replace(",","','");
		cmbpenjamin = String(cmbpenjamin).replace(",", "','", "gi");
    }
	
	var opts4 = $("#cmbshift_lapregkun").combobox('options');
    var cmbshift = $("#cmbshift_lapregkun").combobox('getValue');
    if (opts4.separator == ','){
        cmbshift = $("#cmbshift_lapregkun").combobox('getValues');
        //cmbpenjamin = String(cmbpenjamin).replace(",","','");
		cmbshift = String(cmbshift).replace(",", "','", "gi");
    }
    
    var ckstatus = $("#ckstatusbatal_lapregkun").prop('checked'); 
    var ckstatustidakbatal = $("#cktidakbatal_lapregkun").prop('checked');
    var ckkonsul_lapregkun = $("#ckkonsul_lapregkun").prop('checked');

    var txtperiode1= $("#txtperiode1_lapregkun").textbox('getValue');
    var txtperiode2= $("#txtperiode2_lapregkun").textbox('getValue');
    var namaunit= $("#cmbunit_lapregkun").combobox('getText');
    //var namapenjamin= $("#cmbpenjamin_lapregkun").combobox('getValue');
    var kd_ruangperawatan = $("#cmbruang_lapregkun").combobox('getValues');
    var nama_ruangperawatan = $("#cmbruang_lapregkun").combobox('getText');
    var kd_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getValues');
    var nama_kamarperawatan = $("#cmbkamar_lapregkun").combobox('getText');
    
    var cmbcara_keluar = $("#cmbcara_keluar").combobox('getValues');
    var cmbdiagnosa_primer = $("#cmbdiagnosa_primer").combobox('getValues');
    var cmbdiagnosa_sekunder = $("#cmbdiagnosa_sekunder").combobox('getValues');
    var cmbkelpenjamin = $("#cmbkelpenjamin_lapregkun").combobox('getValue');
    
    var url = 'index.php/laporan/laporan_verif_register_kunjungan_excel/preview?cmbinstalasi='+cmbinstalasi+'&cmbunit='+cmbunit+'&cmbshift='+cmbshift
        +'&txtperiode1='+txtperiode1+'&txtperiode2='+txtperiode2+'&namaunit='+namaunit+'&cmbpenjamin='+cmbpenjamin+'&ckstatus='+ckstatus
        +'&ckstatustidakbatal='+ckstatustidakbatal+'&kd_ruangperawatan='+kd_ruangperawatan+'&nama_ruangperawatan='+nama_ruangperawatan
        +'&kd_kamarperawatan='+kd_kamarperawatan+'&nama_kamarperawatan='+nama_kamarperawatan+'&cmbcara_keluar='+cmbcara_keluar
        +'&cmbdiagnosa_primer='+cmbdiagnosa_primer+'&cmbdiagnosa_sekunder='+cmbdiagnosa_sekunder+'&ckkonsul_lapregkun='+ckkonsul_lapregkun+'&cmbkelpenjamin='+cmbkelpenjamin;
    var win = window.open(url, '_blank');
    win.focus();
}

function resetdialog(){
			$('#cmbinstalasi_lapregkun').combobox('clear');
			$('#cmbunit_lapregkun').combobox('clear');
			$('#cmbpenjamin_lapregkun').combobox('clear');
			$('#cmbshift_lapregkun').combobox('clear');		
			$('#txtperiode1_lapregkun').combobox('clear');
			$('#txtperiode2_lapregkun').combobox('clear');
			var date = new Date();
			var dateString = date.getFullYear() + "-" +("0" + (date.getMonth() + 1).toString()).substr(-2) + "-" + ("0" + date.getDate().toString()).substr(-2);
			$("#txtperiode1_lapregkun").textbox('setValue',dateString);
            $("#txtperiode2_lapregkun").textbox('setValue',dateString);
			$('#cmbruang_lapregkun').combobox('clear');
            $('#hdruang_lapregkun').hide();
            $('#cmbkamar_lapregkun').combobox('clear');
            $('#hdkamar_lapregkun').hide();
		};
        function reloadpenjamin(){
            var cmbkelpenjamin = $("#cmbkelpenjamin_lapregkun").combobox('getValue');
            $("#cmbpenjamin_lapregkun").combobox({
                onBeforeLoad: function(a){
                    a.cmbkelpenjamin= cmbkelpenjamin;
                }
                // url:'index.php/laporan/laporan_verif_register_kunjungan/getcmbpenjamin',
                // queryParams:{
                //     cmbkelpenjamin : cmkelpenjamin
                // }
            });
            // $("#cmbpenjamin_lapregkun").combobox('reload');
        }
</script>
<style>
    fieldset{
        border-style:solid ;
        border-width: 1px;
        border-color:#d7cccc; 
        background:#f6f4f4;
		width:560px;
    }
    shadow{
        float: left;
        width: 100%;
        
         box-shadow: 1px 1px 3px 1px #888888;
    }
</style>
<h1 class="margin-t-0">Laporan Verifikasi Registrasi Kunjungan</h1>
<hr>
<fieldset class="fieldset">
<legend style="font-style:bold">Filter Data</legend>
<table style="padding-bottom: 10px;">  
    <tr>     
        <td>Instalasi</td>
		<td>:</td>
        <td class="jarak"><input id="cmbinstalasi_lapregkun" name="cmbinstalasi_lapregkun"  class="easyui-combobox" data-options="prompt:'Masukkan Instalasi...',
                    valueField: 'kd_instalasi',
                    textField: 'nama_instalasi',
                    url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbinstalasi',
                    onSelect: function(rec){
                        var url = 'index.php/laporan/laporan_verif_register_kunjungan/getcmbunit?kd_instalasi='+rec.kd_instalasi;
                        $('#cmbunit_lapregkun').combobox('clear');
                        $('#cmbunit_lapregkun').combobox('reload', url);
                        
                        $('#cmbruang_lapregkun').combobox('clear');
                        $('#cmbkamar_lapregkun').combobox('clear');

                        if(rec.kd_instalasi==3){
                            $('#hdruang_lapregkun').show();
                            $('#hdkamar_lapregkun').show();
                        } else {
                            $('#hdruang_lapregkun').hide();
                            $('#hdkamar_lapregkun').hide();
                        }
                    }" style="width:283px"></td>
    </tr>
	<tr>
		<td>Nama Unit</td>
		<td>:</td>
        <td class="jarak"><input id="cmbunit_lapregkun" name="cmbunit_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Unit...',
                                                valueField:'kd_unit',
                                                textField:'nama_unit',
                                                multiple:'true',
                                                " style="width:283px"></td>
    </tr>
    <tr id="hdruang_lapregkun" style="display: none;">
        <td>Nama Ruang</td>
        <td>:</td>
        <td class="jarak"><input id="cmbruang_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Ruang...',
                    valueField:'kd_ruangperawatan',
                    textField:'nama_ruangperawatan',
                    url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbruang',
                    multiple:'true',
                    onSelect: function(rec){
                    	var kd_ruangperawatan = $('#cmbruang_lapregkun').combobox('getValues');
                        var url = 'index.php/laporan/laporan_verif_register_kunjungan/getcmbkamar?kd_ruangperawatan='+kd_ruangperawatan;
                        $('#cmbkamar_lapregkun').combobox('clear');
                        $('#cmbkamar_lapregkun').combobox('reload', url);
                    }" style="width:283px"></td>
    </tr>
    <tr id="hdkamar_lapregkun" style="display: none;">
        <td>Nama Kamar</td>
        <td>:</td>
        <td class="jarak"><input id="cmbkamar_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Kamar...',
                                                valueField:'kd_kamarperawatan',
                                                textField:'nama_kamarperawatan',
                                                multiple:'true',
                                                " style="width:283px"></td>
    </tr>
    <tr>
        <td width="120">Kel. Penjamin</td>
        <td>:</td>
        <td class="jarak"><input id="cmbkelpenjamin_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Penjamin...',
                                                valueField:'kd_kelpenjamin',
                                                textField:'nama_kelpenjamin',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbkelpenjamin',
                                                onSelect: function(data){
                                                    reloadpenjamin();
                                                }
                                                " style="width:283px"></td>
    </tr>
	<tr>
        <td width="120">Nama Penjamin</td>
		<td>:</td>
        <td class="jarak"><input id="cmbpenjamin_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Penjamin...',
                                                valueField:'kd_detkelpenjamin',
                                                textField:'nama_penjamin',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbpenjamin',
                                                multiple:'true',
                                                " style="width:283px"></td>
	</tr>
	<tr>
		<td width="50">Shift</td>
		<td>:</td>
        <td class="jarak"><input id="cmbshift_lapregkun" class="easyui-combobox" data-options="prompt:'Masukkan Shift...',
                                                valueField:'shift',
                                                textField:'shift',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getshift',
                                                multiple:'true',
                                                " style="width:283px"></td>
    </tr>
		
    <tr>
        <td>Periode</td>
		<td>:</td>
        <td class="jarak"><input id="txtperiode1_lapregkun" value="date(now)" name="txtperiode1_lapregkun" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'"> s/d
		<input id="txtperiode2_lapregkun" value="date(now)" name="txtperiode2_lapregkun" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'"> </td>
    </tr>
	<tr>
		<td>Status</td>
		<td>:</td>
        <td class="jarak">
			<label><input type="checkbox" checked="checked" id="cktidakbatal_lapregkun" class="easyui-checkbox">Tidak Batal</label>
			<label><input type="checkbox" checked="checked" id="ckstatusbatal_lapregkun" class="easyui-checkbox">Batal</label>
            <label><input type="checkbox" id="ckkonsul_lapregkun" class="easyui-checkbox">Konsul</label>
		</td>
    </tr>
    <tr>
        <td width="120">Cara Keluar</td>
		<td>:</td>
        <td class="jarak"><input id="cmbcara_keluar" class="easyui-combobox" data-options="prompt:'Masukkan Cara Keluar...',
                                                valueField:'kd_statuskeluar',
                                                textField:'nama_statuskeluar',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbcarakeluar',
                                                multiple: 'true'
                                                " style="width:283px"></td>
	</tr>
    <tr>
        <td width="120">Diagnosa Primer</td>
		<td>:</td>
        <td class="jarak"><input id="cmbdiagnosa_primer" class="easyui-combobox" data-options="prompt:'Masukkan Diagnosa Primer...',
                                                valueField:'kd_icdx',
                                                textField:'penyakit',
                                                mode: 'remote',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbdiagnosa',
                                                " style="width:283px"></td>
	</tr>
    <tr>
        <td width="120">Diagnosa Sekunder</td>
		<td>:</td>
        <td class="jarak"><input id="cmbdiagnosa_sekunder" class="easyui-combobox" data-options="prompt:'Masukkan Diagnosa Sekunder...',
                                                valueField:'kd_icdx',
                                                textField:'penyakit',
                                                mode: 'remote',
                                                url: 'index.php/laporan/laporan_verif_register_kunjungan/getcmbdiagnosa',
                                                " style="width:283px"></td>
	</tr>
    <tr>
        <td width="120">Jenis Akses</td>
		<td>:</td>
        <td class="jarak"><input id="cmbjenis_akses" class="easyui-combobox" data-options="prompt:'Masukkan Jenis Akses...',
                                                valueField:'kd_jenis_akses',
                                                textField:'nama_jenis_akses',
                                                multiple:'true',
                                                url: 'index.php/poliklinik/poliklinik/getcmb_jenisakses',
                                                " style="width:283px"></td>
	</tr>
    <tr>
        <td width="120">Dokter</td>
		<td>:</td>
        <td class="jarak"><input id="cmbdokter" class="easyui-combobox" data-options="prompt:'Masukkan Dokter...',
                                                valueField:'kd_paramedis',
                                                textField:'nama_paramedis',
                                                multiple:'true',
                                                url: 'index.php/poliklinik/poliklinik/getcmb_dokter',
                                                " style="width:283px"></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
		<td class="jarak">
			<a href="javascript:void(0)" type="button" class="easyui-linkbutton" onClick="preview()" data-options="iconCls:'icon-search'">Preview</a>
<!--
			<a href="javascript:void(0)" type="button" class="easyui-linkbutton" onClick="preview2()" data-options="iconCls:'icon-search'">Export to PDF</a>
-->
			<a href="javascript:void(0)" type="button" class="easyui-linkbutton" onClick="preview3()" data-options="iconCls:'icon-search'">Export to Excel</a>
			<a href="javascript:void(0)" type="button" class="easyui-linkbutton" onClick="resetdialog()" data-options="iconCls:'icon-reset'">Reset</a>
		</td>
	</tr>
</table>
