<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/themes/color.css">
    <link rel="stylesheet" type="text/css" href="https://www.jeasyui.com/easyui/demo/demo.css">
    <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/jquery.min.js"></script> -->
<script src="http://code.jquery.com/jquery-1.8.0.min.js"></script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/easyloader.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/plugins/jquery.combobox.js"></script>
     <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/src/jquery.calendar.js"></script> -->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/plugins/jquery.datebox.js"></script>
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/plugins/jquery.textbox.js"></script>
      <!-- <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui/plugins/jquery.validatebox.js"></script> -->
      <script type="text/javascript" src="<?php echo base_url(); ?>assets/easyui2/plugins/jquery.linkbutton.js"></script>
      <script  type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>	
 

<title>Laporan</title>
</head>

<body>
	
  <!-- <label for="poli">Poli:</label>

  <input id="kd_poli" class="easyui-combobox" data-options="prompt:'Pilih Poli...',

                    valueField:'kdpoli',
                    textField:'nm_poli',
                    url: 'filter/getPoli',
                    " style="width:283px">
  
  <label for="tgl">Tgl:</label>
  
<input id="tgl_rencana_kontrol" value="date(now)" name="tgl_rencana_kontrol" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'">
s/d
<input id="tgl_rencana_kontrol2" value="date(now)" name="tgl_rencana_kontrol2" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'">

<a href="javascript:void(0)" type="button" id="preview" class="easyui-linkbutton"  data-options="iconCls:'icon-search'">Preview</a>
  <br><br> -->

  <table width="100%">
<tr>
<td style="font-size:15px;background-color:#42609E;color:white;font-weight:bold" align="center">Rencana Kontrol</td>
</tr>
</table>
<fieldset class="fieldset" style="width: 100%">

<fieldset class="fieldset" style="width: 100%">
<legend style="font-style:bold">List Rencana Kontrol</legend>
<table style="padding-bottom: 10px;">
    <tr>
      <td>Periode <select class="easyui-combobox" id="cmbfiltertgl" style="width:130px">
          <option value="1">Tgl. Input</option>
          <option value="2">Tgl. Kontrol / SPRI</option>
        </select>
      </td>
      
        <td>:</td>
        <td class="jarak">
          <input id="tgl_rencana_kontrol" value="date(now)" name="tgl_rencana_kontrol" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'" style="width:110px"2>
s/d
<input id="tgl_rencana_kontrol2" value="date(now)" name="tgl_rencana_kontrol2" class="easyui-datebox wtext" data-options="prompt:'YYYY-MM-DD'" style="width:110px">
<td> 
        
  <label for="poli">Poli:</label>

  <input id="kd_poli" class="easyui-combobox" data-options="required:true,prompt:'Pilih Poli...',
                    valueField:'kdpoli',
                    textField:'nm_poli',
                    url: 'filter/getPoli',
                    " style="width:200px">
 <input class="easyui-combobox" id="txtnokartu_filter" data-options="prompt:'No Kartu...' ,
                    valueField:'no_kartu',
                    textField:'no_kartu',
                    url: 'filter/getKartu'," style="width: 160px">
 <input class="easyui-combobox" id="txtnama_filter" data-options="prompt:'Nama Pasien...' ,
                    valueField:'nm_pasien',
                    textField:'nm_pasien',
                    url: 'filter/getNama'," style="width: 160px">    
 <a href="javascript:void(0)" type="button" class="easyui-linkbutton" id="cari" data-options="iconCls:'icon-search'">Cari</a>

<a href="javascript:void(0)" type="button" id="preview" class="easyui-linkbutton"  data-options="iconCls:'icon-search'">Preview</a>

 
      </td>

    </tr>
</table>
<table id="grid-rencana_kontrol" class="easyui-datagrid" height="400"></table>
  
 <!-- <a href="javascript:void(0)" type="button"  onClick="preview()">Preview</a> -->

<!-- button onclick="preview()"><a href="javascript:void(0)">Laporan<a/></button>
	<button onclick="myFunction()">Click me</button>

<p id="demo"></p> -->
</body>

      <script type="text/javascript">
      	// document.getElementById ("preview").addEventListener ("click", preview, false);

     // function myformatter(date){
     //        var y = date.getFullYear();
     //        var m = date.getMonth()+1;
     //        var d = date.getDate();
     //        return y+'-'+(m<10?('0'+m):m)+'-'+(d<10?('0'+d):d);
     //    }
     //    function myparser(s){
     //        if (!s) return new Date();
     //        var ss = (s.split('-'));
     //        var y = parseInt(ss[0],10);
     //        var m = parseInt(ss[1],10);
     //        var d = parseInt(ss[2],10);
     //        if (!isNaN(y) && !isNaN(m) && !isNaN(d)){
     //            return new Date(y,m-1,d);
     //        } else {
     //            return new Date();
     //        }
     //    }  
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
  
		$(document).ready(function() {
 	
            $('#preview').click(function () {
              var cmbpoli= $("#kd_poli").combobox('getValue', false);    
              var  cmbtgl = $("#tgl_rencana_kontrol").textbox('getValue',  false);
              var  cmbtgl2 = $("#tgl_rencana_kontrol2").textbox('getValue',  false);
    		
              var url = 'filter/preview?kd_poli='+cmbpoli+'&tgl_rencana_kontrol='+cmbtgl+'&tgl_rencana_kontrol2='+cmbtgl2;
              var win = window.open(url,'_blank');
              win.focus();
              });

        
            $('#grid-rencana_kontrol').datagrid({
              url : 'filter/getKontrol',
              singleSelect:true,
              rownumbers:'true',
              pagination:'true',
              pageList : [10,20,30,40,50],
              columns:[[
                      {field:'no_surat_kontrol',title:'NO SURAT KONTROL', width:180, align:'center'},
                      {field:'tgl_rencana_kontrol',title:'TGL RENCANA KONTROL', width:130, align:'center'},
                      {field:'no_sep',title:'NO SEP', width:180, align:'center'},
                      {field:'no_kartu',title:'NO KARTU', width:150, align:'center'},
                      {field:'nm_pasien',title:'NAMA', width:200, align:'center'},
                      {field:'nm_poli',title:'POLI', width:150, align:'center'},
                      {field:'diagnosa',title:'Diagnosa', width:350, align:'center'}
              ]],
            //   onDblClickRow:function(index, row){
            //           $('#txtnosep').textbox('setValue',row.no_sep);
            //           $('#txtnokartu').textbox('setValue',row.no_kartu);
            //           $("#txtnorencana_kontrol").textbox('setValue',row.no_surat_kontrol);
            //           $("#dttglrencana_kontrol").datebox('setValue',row.tgl_rencana_kontrol);
            //           $("#cmbjnskontrol").combobox('setValue',row.kd_jeniskontrol);
            //           if(row.kd_jeniskontrol== 1){
            //             $('.sep').hide();
            //             $('.kosong').hide();
            //             $('.kartu').show();
            //             $('#txtnokartu').textbox('textbox').focus();
            //           }
            //           else if(row.kd_jeniskontrol== 2){
            //             $('.kartu').hide();
            //             $('.kosong').hide();
            //             $('.sep').show();
            //             $('#txtnosep').textbox('textbox').focus();
            //           }
            //           reloadpoli();   
            //           // $('#cmbpolirencana_kontrol').combogrid('grid').datagrid('load',{ q : row.kd_poli});
            //           $("#cmbpolirencana_kontrol").combogrid('setValue',row.kd_poli);
            //           reloaddpjp();
            //           // $('#cmbdpjp').combogrid('grid').datagrid('load',{ q : row.kd_dpjp});
            //           $("#cmbdpjp").combogrid('setValue',row.kd_dpjp);
            //           $("#txtdiagnosa").textbox('setValue',row.diagnosa);
            //           $("#txtnama").textbox('setValue',row.nama);
            //           $("#txtjeniskelamin").textbox('setValue',row.kelamin);
            //           $("#dttgllahir").datebox('setValue',row.tgllahir);
            // }
        });
            $('#cari').click(function () {
            $('#grid-rencana_kontrol').datagrid('load',{
            // filtertgl: $("#cmbfiltertgl").combobox('getValue'),
            periode1: $("#tgl_rencana_kontrol").datebox('getValue'),
            periode2: $("#tgl_rencana_kontrol2").datebox('getValue'),
            poli: $("#kd_poli").combobox('getValue'),

            no_kartu: $("#txtnokartu_filter").textbox('getValue'),
            nama: $("#txtnama_filter").textbox('getValue')
                });
            });
    });

	// });

  function preview()
{
    var cmbpoli= $("#kd_poli").combobox('getValue');    
   
    // if (opts.separator == ','){
    var  cmbtgl = $("#tgl_rencana_kontrol").textbox('getValues',false);
		// cmbunit = String(cmbunit).replace(",","','","gi");
    
    var url = 'filter/preview?kd_poli='+cmbpoli+'&tgl_rencana_kontrol='+cmbtgl;
    var win = window.open(url,'_blank');
    win.focus();
}
function reloadpoli(){
            var cmbpoli = $("#cmbruang_lapregkun").combobox('getValue', false);
            $("#cmbruang_lapregkun").combobox({
                onBeforeLoad: function(a){
                    a.cmbpoli= cmbpoli;
                }
                // url:'index.php/laporan/laporan_verif_register_kunjungan/getcmbpenjamin',
                // queryParams:{
                //     cmbkelpenjamin : cmkelpenjamin
                // }
            });
            // $("#cmbpenjamin_lapregkun").combobox('reload');
        }
// function preview(){
//         console.log("Executing action");
//       }


	// preview();

</script>

</html>