<script type="text/javascript">
    $(function(){
      $(".sep").hide();
      $(".kartu").hide();
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

        $('#grid-rencana_kontrol').datagrid({
              url : 'index.php/vklaim/rencana_kontrol/get_datarencana_kontrol',
              singleSelect:true,
              rownumbers:'true',
              pagination:'true',
              columns:[[
                      {field:'no_surat_kontrol',title:'NO SURAT KONTROL', width:150},
                      {field:'tgl_rencana_kontrol',title:'TGL RENCANA KONTROL', width:160},
                      {field:'no_sep',title:'NO SEP', width:150},
                      {field:'no_kartu',title:'NO KARTU', width:100},
                      {field:'nama',title:'NAMA', width:200},
                      {field:'kd_poli',title:'POLI', width:50},
                      {field:'kd_dpjp',title:'DPJP', width:50},
                      {field:'diagnosa',title:'Diagnosa', width:350}
              ]],
              onDblClickRow:function(index, row){
                      $('#txtnosep').textbox('setValue',row.no_sep);
                      $('#txtnokartu').textbox('setValue',row.no_kartu);
                      $("#txtnorencana_kontrol").textbox('setValue',row.no_surat_kontrol);
                      $("#dttglrencana_kontrol").datebox('setValue',row.tgl_rencana_kontrol);
                      $("#cmbjnskontrol").combobox('setValue',row.kd_jeniskontrol);
                      if(row.kd_jeniskontrol== 1){
                        $('.sep').hide();
                        $('.kosong').hide();
                        $('.kartu').show();
                        $('#txtnokartu').textbox('textbox').focus();
                      }
                      else if(row.kd_jeniskontrol== 2){
                        $('.kartu').hide();
                        $('.kosong').hide();
                        $('.sep').show();
                        $('#txtnosep').textbox('textbox').focus();
                      }
                      reloadpoli();   
                      // $('#cmbpolirencana_kontrol').combogrid('grid').datagrid('load',{ q : row.kd_poli});
                      $("#cmbpolirencana_kontrol").combogrid('setValue',row.kd_poli);
                      reloaddpjp();
                      // $('#cmbdpjp').combogrid('grid').datagrid('load',{ q : row.kd_dpjp});
                      $("#cmbdpjp").combogrid('setValue',row.kd_dpjp);
                      $("#txtdiagnosa").textbox('setValue',row.diagnosa);
                      $("#txtnama").textbox('setValue',row.nama);
                      $("#txtjeniskelamin").textbox('setValue',row.kelamin);
                      $("#dttgllahir").datebox('setValue',row.tgllahir);
            }
        });
    });

    function reloadpoli(){
      var jenis_kontrol = $("#cmbjnskontrol").combogrid('getValue');
        var no_sep = $("#txtnosep").textbox('getValue');
        var no_kartu = $("#txtnokartu").textbox('getValue');
        var tgl_rencana_kontrol = $("#dttglrencana_kontrol").datebox('getValue');

      $('#cmbpolirencana_kontrol').combogrid({
                panelWidth:700,
                url: 'index.php/vklaim/rencana_kontrol/getcmbpoli',
                idField:'kdpoli',
                textField:'nmpoli',
                mode:'remote',
                fitColumns:true,
                queryParams:{
                jenis_kontrol : jenis_kontrol,
                tgl_rencana_kontrol : tgl_rencana_kontrol,
                no_sep :no_sep,
                no_kartu :no_kartu
                },
                columns:[[
                {field:'kdpoli',title:'KODE',width:50},
                {field:'nmpoli',title:'NAMA',width:200},
                {field:'kapasitas',title:'KAPASITAS',width:100},
                {field:'jmlRencanaKontroldanRujukan',title:'JML RENCANA KONTROL RUJUKAN',width:250},
                {field:'persentase',title:'PERSENTASE',width:100}
                ]],
                onSelect : function(index, row){
                  reloaddpjp();
                }
            });
    }

    function reloaddpjp(){
        var poli = $("#cmbpolirencana_kontrol").combogrid('getValue');
        var jenis_kontrol = $("#cmbjnskontrol").combobox('getValue');
        var tgl_rencana_kontrol = $("#dttglrencana_kontrol").datebox('getValue');

        $('#cmbdpjp').combogrid({
                panelWidth:550,
                url: 'index.php/vklaim/rencana_kontrol/getcmbdpjp',
                idField:'kodedokter',
                textField:'namadokter',
                mode:'remote',
                fitColumns:true,
                queryParams:{
                jenis_kontrol : jenis_kontrol,
                tgl_rencana_kontrol : tgl_rencana_kontrol,
                poli :poli
                },
                columns:[[
                {field:'kodedokter',title:'KODE',width:50},
                {field:'namadokter',title:'NAMA',width:250},
                {field:'jadwalpraktek',title:'JADWAL PRAKTEK',width:150},
                {field:'kapasitas',title:'KAPASITAS',width:100}
                ]],

            });
    }

    function cari_sep()
    {
       // reset();
        $.messager.progress({title:'Please wait',msg:'Process...'});

        var no_sep = $('#txtnosep').textbox('getValue');

        $.ajax({
           type : "POST",
           url  : "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/cari_sep",
           data : "no_sep="+ no_sep,
           success: function(response){

                $.messager.progress('close');
                response= JSON.parse(response);

                if(response.message != 'Sukses'){
                    $.messager.alert('Warning',response.message,'warning');
                    return;
                }
                else{
                	  $("#txtnokartu").textbox('setValue',response.no_kartu);
                      $("#txtdiagnosa").textbox('setValue',response.diagnosa);
                      $("#txtnama").textbox('setValue',response.nama);
                      $("#txtjeniskelamin").textbox('setValue',response.kelamin=='P'?'Perempuan':'Laki-laki');
                      $("#dttgllahir").datebox('setValue',response.tgl_lahir);
                    reloadpoli();
                }
          },
          error:function(data)
          {
                $.messager.progress('close');
               $.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
          }
        });
    }

    function cari_peserta()
    {
       // reset();
        $.messager.progress({title:'Please wait',msg:'Process...'});

        var no_kartu = $('#txtnokartu').textbox('getValue');

        $.ajax({
           type : "POST",
           url  : "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/cari_peserta",
           data : "no_kartu="+ no_kartu,
           success: function(response){

                $.messager.progress('close');
                response= JSON.parse(response);

                if(response.message != 'OK'){
                    $.messager.alert('Warning',response.message,'warning');
                    return;
                }
                else{
                	if(response.aktif != 'AKTIF'){
	                    $.messager.alert('Warning',response.keterangan,'warning');
	                    return;
	                }

                    $("#txtdiagnosa").textbox('setValue','');
                      $("#txtnama").textbox('setValue',response.nama);
                      $("#txtjeniskelamin").textbox('setValue',response.sex=='P'?'Perempuan':'Laki-laki');
                      $("#dttgllahir").datebox('setValue',response.tglLahir);
                }
          },
          error:function(data)
          {
                $.messager.progress('close');
               $.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
          }
        });
    }

    function simpan_rencana_kontrol()
    {
        $.messager.progress({title:'Please wait',msg:'Process...'});

        var no_kartu = $('#txtnokartu').textbox('getValue');
        var jenis_kontrol = $('#cmbjnskontrol').combobox('getValue');
        var no_sep = $('#txtnosep').textbox('getValue');
        var tgl_rencana_kontrol = $('#dttglrencana_kontrol').datebox('getValue');
        var dpjp = $('#cmbdpjp').combogrid('getValue');
        var poli_rencana_kontrol = $('#cmbpolirencana_kontrol').combogrid('getValue');
        var no_surat_kontrol = $("#txtnorencana_kontrol").textbox('getValue');
        $.ajax({
           type : "POST",
           url  : "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/simpan_rencana_kontrol",
           data : "no_kartu="+ no_kartu + "&jenis_kontrol=" + jenis_kontrol+"&no_sep="+no_sep+"&tgl_rencana_kontrol="+tgl_rencana_kontrol+"&dpjp="+dpjp +"&poli_rencana_kontrol="+poli_rencana_kontrol+"&no_surat_kontrol="+no_surat_kontrol ,
           success: function(response){

                $.messager.progress('close');
                response= JSON.parse(response);

                if(response.message != 'Ok'){
                    $.messager.alert('Warning',response.message,'warning');
                    return;
                }

                $.messager.show({
                      title:'Pesan',
                      msg:'Simpan Berhasil',
                      timeout:2000,
                      showType:'slide'
              });
               $("#txtnorencana_kontrol").textbox('setValue',response.no_surat_kontrol);
               $('#grid-rencana_kontrol').datagrid('load',{
                                periode1: $("#txtperiode1").datebox('getValue'),
                                periode2:$("#txtperiode2").datebox('getValue'),
                                no_kartu: $("#txtnokartu_filter").textbox('getValue')
                            });
              // reset();
          },
          error:function(data)
          {
                $.messager.progress('close');
               $.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
          }
        });
    }

    function hapus_rencana_kontrol(){
        var no_surat_kontrol = $("#txtnorencana_kontrol").textbox('getValue');
        if(no_surat_kontrol==""){
            $.messager.alert('Warning',"No rencana_kontrol tidak boleh kosong",'warning');
            return;
        }

        $.ajax({
           type : "POST",
           url  : "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/hapus_rencana_kontrol",
           data : "no_surat_kontrol="+no_surat_kontrol ,
           success: function(response){

                $.messager.progress('close');
                response= JSON.parse(response);

                if(response.message != 'Sukses'){
                    $.messager.alert('Warning',response.message,'warning');
                    return;
                }

                $.messager.show({
                      title:'Pesan',
                      msg:'Hapus Berhasil',
                      timeout:2000,
                      showType:'slide'
              });
               $('#grid-rencana_kontrol').datagrid('load',{
                                periode1: $("#txtperiode1").datebox('getValue'),
                                periode2:$("#txtperiode2").datebox('getValue'),
                                no_kartu: $("#txtnokartu_filter").textbox('getValue')
                            });
              reset();
          },
          error:function(data)
          {
                $.messager.progress('close');
               $.messager.alert('Peringatan', data.responseText,'warning').window({width:500});
          }
        });

    }

    function reset(){
        $('#txtnokartu').textbox('clear');
        $('#txtnosep').textbox('clear');
        $('#dttglrencana_kontrol').datebox('clear');
        $('#cmbdpjp').combogrid('clear');
        $('#cmbpolirencana_kontrol').combogrid('clear');
        $("#txtnorencana_kontrol").textbox('clear');
        $('#cmbjnskontrol').combobox('clear');
        $("#txtdiagnosa").textbox('clear');
        $("#txtnama").textbox('clear');
        $("#txtjeniskelamin").textbox('clear');
        $("#dttgllahir").datebox('clear');
        $('#grid-rencana_kontrol').datagrid('load',{
            periode1: $("#txtperiode1").datebox('getValue'),
            periode2: $("#txtperiode2").datebox('getValue'),
            no_kartu: $("#txtnokartu_filter").textbox('getValue')
        });

    }
    function cari(){
        $('#grid-rencana_kontrol').datagrid('load',{
        	filtertgl: $("#cmbfiltertgl").combobox('getValue'),
            periode1: $("#txtperiode1").datebox('getValue'),
            periode2: $("#txtperiode2").datebox('getValue'),
            no_kartu: $("#txtnokartu_filter").textbox('getValue')
        });
    }
    function cetak(){
    	var poli_rencana_kontrol = $("#cmbpolirencana_kontrol").combogrid('getText');
    	var no_surat_kontrol = $("#txtnorencana_kontrol").textbox('getValue');
    	var nama = $("#txtnama").textbox('getValue');
    	var no_kartu = $("#txtnokartu").textbox('getValue');
    	var dpjp = $("#cmbdpjp").combogrid('getText');
      var tgllahir = $("#dttgllahir").datebox('getValue');
      var kelamin = $("#txtjeniskelamin").textbox('getValue');
      var diagnosa = $("#txtdiagnosa").textbox('getValue');
      var tgl_rencana_kontrol = $("#dttglrencana_kontrol").datebox('getValue');
      var jenis_kontrol = $("#cmbjnskontrol").combobox('getValue');

      if (no_surat_kontrol == ''){
        $.messager.alert('Warning','Surat kontrol / SPRI tidak boleh kosong!','warning');
        return;
      }

      if(jenis_kontrol == 1){
        var url = "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/cetak_inap?poli_rencana_kontrol="+poli_rencana_kontrol+"&no_surat_kontrol="+no_surat_kontrol+"&nama="+nama+"&no_kartu="+no_kartu+"&dpjp="+dpjp+"&kelamin="+kelamin+'&tgllahir='+tgllahir+'&diagnosa='+diagnosa+'&tgl_rencana_kontrol='+tgl_rencana_kontrol + '&jenis_kontrol='+ jenis_kontrol;
      }else if (jenis_kontrol == 2){
        var url = "http://192.168.0.251/evoMedis_rsbkediri/index.php/vklaim/rencana_kontrol/cetak?poli_rencana_kontrol="+poli_rencana_kontrol+"&no_surat_kontrol="+no_surat_kontrol+"&nama="+nama+"&no_kartu="+no_kartu+"&dpjp="+dpjp+"&kelamin="+kelamin+'&tgllahir='+tgllahir+'&diagnosa='+diagnosa+'&tgl_rencana_kontrol='+tgl_rencana_kontrol + '&jenis_kontrol='+ jenis_kontrol;
      }
        var win = window.open(url, '_blank');
        win.focus();
    }

</script>
<style>
    .jarak{ padding-left: 5px; padding-right: 15px;}
    fieldset{
        border-style:solid ;
        border-width: 1px;
        border-color:#d7cccc;
        background:#f6f4f4;
    }
    shadow{
        float: left;
        width: 100%;

         box-shadow: 1px 1px 3px 1px #888888;
    }
</style>
<table width="100%">
<tr>
<td style="font-size:15px;background-color:#42609E;color:white;font-weight:bold" align="center">Rencana Kontrol</td>
</tr>
</table>
<fieldset class="fieldset" style="width: 80%">
<legend style="font-style:bold">Form Rencana Kontrol</legend>
<table>
    <tr>
        <td>
            <a class="easyui-linkbutton" data-options="iconCls:'icon-save'" onclick="simpan_rencana_kontrol();">Simpan</a>
            <a class="easyui-linkbutton" data-options="iconCls:'icon-hapus'" onclick="hapus_rencana_kontrol();">Hapus</a>
            <a class="easyui-linkbutton" data-options="iconCls:'icon-print'" onclick="cetak();">Cetak</a>
            <a class="easyui-linkbutton" data-options="iconCls:'icon-reset'" onclick="reset();">Reset</a>
        </td>
    </tr>
</table>
<table border="0">
  <tr>
    <td width="200px">No. SPRI / Surat Kontrol</td>
        <td class="jarak">
            <input class="easyui-textbox wtext" id="txtnorencana_kontrol" data-options="prompt:'No Surat Kontrol...'" disabled style="width: 160px" >
        </td>
  </tr>
  <tr>
    <td>Jenis Kontrol</td>
        <td class="jarak">
            <input class="easyui-combobox wtext" id="cmbjnskontrol" data-options="prompt:'Jenis Kontrol...',
                                valueField: 'kd_jeniskontrol',
                                textField: 'nm_jeniskontrol',
                                url: 'index.php/vklaim/rencana_kontrol/getcmbjenis_kontrol',
                                onSelect: function(rec){
                                  if(rec.kd_jeniskontrol== 1){
                                    $('.sep').hide();
                                    $('.kosong').hide();
                                    $('.kartu').show();
                                    $('#txtnokartu').textbox('textbox').focus();
                                  }
                                  else if(rec.kd_jeniskontrol== 2){
                                    $('.kartu').hide();
                                    $('.kosong').hide();
                                    $('.sep').show();
                                    $('#txtnosep').textbox('textbox').focus();
                                  }
                                  reloadpoli();                               
                                },
                                onLoadSuccess : function(){
                                  $('#cmbjnskontrol').combobox('textbox').focus();
                                  $('#cmbjnskontrol').combobox('showPanel');
                                }
                                ">
        </td>        
  </tr>
  <tr>
    <td width="70px" class="sep">No SEP</td>
        <td class="jarak sep" width="200px">
            <input class="easyui-textbox wtext" id="txtnosep" data-options="prompt:'No SEP...'" style="width: 160px" >
            <a class="easyui-linkbutton" data-options="iconCls:'icon-search'" onclick="cari_sep();">Cari</a>
        </td>
        <td width="70px" class="kartu">No Kartu</td>
        <td class="jarak kartu" width="200px">
            <input class="easyui-textbox wtext" id="txtnokartu" data-options="prompt:'No Kartu...'" style="width: 160px">
            <a class="easyui-linkbutton" data-options="iconCls:'icon-search'" onclick="cari_peserta();">Cari</a>
        </td>
        <td class="kosong">&nbsp;</td>
        <td class="kosong">&nbsp;</td>
        <td>Nama</td>
        <td class="jarak"><input class="easyui-textbox wtext" id="txtnama" data-options="prompt:'Nama...'" style="width: 200px" disabled></td>
  </tr>
  <tr>
    <td>Tgl Rencana Kontrol / Inap</td>
        <td class="jarak">
            <input class="easyui-datebox wtext" id="dttglrencana_kontrol" data-options="prompt:'YYYY-MM-DD', onSelect: function(rec){
                                  reloadpoli();
                                }">
        </td>
        <td>Jenis Kelamin</td>
        <td class="jarak"><input class="easyui-textbox wtext" id="txtjeniskelamin" data-options="prompt:'Jenis Kelamin...'" style="width: 150px" disabled></td>
  </tr>
  <tr>
    <td>Spesialis</td>
        <td class="jarak">
            <input class="easyui-combogrid" id="cmbpolirencana_kontrol" data-options="prompt:'Pilih Poli...'" style="width: 300px">
        </td>
        <td>Tgl. Lahir</td>
        <td class="jarak"><input class="easyui-datebox wtext" id="dttgllahir" data-options="prompt:'Tgl Lahir...'" style="width: 150px" disabled></td>
  </tr>
  <tr>
    <td>DPJP</td>
        <td class="jarak">
            <input class="easyui-combogrid" id="cmbdpjp" data-options="prompt:'pilih DPJP...'" style="width: 300px">
        </td>
        <td>Diagnosa</td>
        <td class="jarak"><input class="easyui-textbox wtext" id="txtdiagnosa" data-options="prompt:'Diagnosa...'" style="width: 500px" disabled></td>
  </tr>
</table>
</fieldset>
<fieldset class="fieldset" style="width: 90%">
<legend style="font-style:bold">List Rencana Kontrol</legend>
<table style="padding-bottom: 10px;">
    <tr>
        <td>Periode <select class="easyui-combobox" id="cmbfiltertgl" style="width:130px">
        	<option value="1">Tgl. Input</option>
        	<option value="2">Tgl. Kontrol / SPRI</option>
        </select></td>
        <td>:</td>
        <td class="jarak"><input id="txtperiode1" value="date(now)" name="txtperiode1" class="easyui-datebox wtext" style="width:100px" data-options="prompt:'YYYY-MM-DD'">s/d
        <input id="txtperiode2" value="date(now)" name="txtperiode2" class="easyui-datebox wtext" style="width:100px" data-options="prompt:'YYYY-MM-DD'">
        <input class="easyui-textbox wtext" id="txtnokartu_filter" data-options="prompt:'No Kartu...'" style="width: 160px">
        <a href="javascript:void(0)" type="button" class="easyui-linkbutton" onClick="cari()" data-options="iconCls:'icon-search'">Cari</a></td>
    </tr>
</table>
<table id="grid-rencana_kontrol" class="easyui-datagrid" height="340"></table>
</fieldset>
