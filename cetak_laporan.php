<?php
session_start();
if (empty($_SESSION['username'])){
    header('index.php');
} else {
    //require_once "admin/data_kelahiran.php";
    include "koneksi.php";
         $admin=$_SESSION['username'];
?>
<style>
<!--
 /* Font Definitions */
 @font-face
    {font-family:Wingdings;
    panose-1:5 0 0 0 0 0 0 0 0 0;
    mso-font-charset:2;
    mso-generic-font-family:auto;
    mso-font-pitch:variable;
    mso-font-signature:0 268435456 0 0 -2147483648 0;}
@font-face
    {font-family:"Cambria Math";
    panose-1:2 4 5 3 5 4 6 3 2 4;
    mso-font-charset:0;
    mso-generic-font-family:roman;
    mso-font-pitch:variable;
    mso-font-signature:-536870145 1107305727 0 0 415 0;}
@font-face
    {font-family:Calibri;
    panose-1:2 15 5 2 2 2 4 3 2 4;
    mso-font-charset:0;
    mso-generic-font-family:swiss;
    mso-font-pitch:variable;
    mso-font-signature:-536859905 -1073732485 9 0 511 0;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
    {mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-parent:"";
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:0cm;
    line-height:107%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoHeader, li.MsoHeader, div.MsoHeader
    {mso-style-priority:99;
    mso-style-link:"Header Char";
    margin:0cm;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 225.65pt right 451.3pt;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoFooter, li.MsoFooter, div.MsoFooter
    {mso-style-priority:99;
    mso-style-link:"Footer Char";
    margin:0cm;
    margin-bottom:.0001pt;
    mso-pagination:widow-orphan;
    tab-stops:center 225.65pt right 451.3pt;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoListParagraph, li.MsoListParagraph, div.MsoListParagraph
    {mso-style-priority:34;
    mso-style-unhide:no;
    mso-style-qformat:yes;
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:36.0pt;
    mso-add-space:auto;
    line-height:107%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpFirst, li.MsoListParagraphCxSpFirst, div.MsoListParagraphCxSpFirst
    {mso-style-priority:34;
    mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-type:export-only;
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:0cm;
    margin-left:36.0pt;
    margin-bottom:.0001pt;
    mso-add-space:auto;
    line-height:107%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpMiddle, li.MsoListParagraphCxSpMiddle, div.MsoListParagraphCxSpMiddle
    {mso-style-priority:34;
    mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-type:export-only;
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:0cm;
    margin-left:36.0pt;
    margin-bottom:.0001pt;
    mso-add-space:auto;
    line-height:107%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
p.MsoListParagraphCxSpLast, li.MsoListParagraphCxSpLast, div.MsoListParagraphCxSpLast
    {mso-style-priority:34;
    mso-style-unhide:no;
    mso-style-qformat:yes;
    mso-style-type:export-only;
    margin-top:0cm;
    margin-right:0cm;
    margin-bottom:8.0pt;
    margin-left:36.0pt;
    mso-add-space:auto;
    line-height:107%;
    mso-pagination:widow-orphan;
    font-size:11.0pt;
    font-family:"Calibri",sans-serif;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
span.HeaderChar
    {mso-style-name:"Header Char";
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-link:Header;}
span.FooterChar
    {mso-style-name:"Footer Char";
    mso-style-priority:99;
    mso-style-unhide:no;
    mso-style-locked:yes;
    mso-style-link:Footer;}
.MsoChpDefault
    {mso-style-type:export-only;
    mso-default-props:yes;
    mso-ascii-font-family:Calibri;
    mso-ascii-theme-font:minor-latin;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-hansi-font-family:Calibri;
    mso-hansi-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;
    mso-fareast-language:EN-US;}
.MsoPapDefault
    {mso-style-type:export-only;
    margin-bottom:8.0pt;
    line-height:107%;}
 /* Page Definitions */
 @page
    {mso-footnote-separator:url("surat%20kp_files/header.htm") fs;
    mso-footnote-continuation-separator:url("surat%20kp_files/header.htm") fcs;
    mso-endnote-separator:url("surat%20kp_files/header.htm") es;
    mso-endnote-continuation-separator:url("surat%20kp_files/header.htm") ecs;}
@page WordSection1
    {size:595.3pt 841.9pt;
    margin:72.0pt 72.0pt 72.0pt 72.0pt;
    mso-header-margin:35.4pt;
    mso-footer-margin:35.4pt;
    mso-paper-source:0;}
div.WordSection1
    {page:WordSection1;}
 /* List Definitions */
 @list l0
    {mso-list-id:207841245;
    mso-list-type:hybrid;
    mso-list-template-ids:594294936 603625328 69271555 69271557 69271553 69271555 69271557 69271553 69271555 69271557;}
@list l0:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;}
@list l0:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l0:level3
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l0:level4
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l0:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l0:level6
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l0:level7
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l0:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l0:level9
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l1
    {mso-list-id:355079537;
    mso-list-type:hybrid;
    mso-list-template-ids:2031152824 1217329878 69271555 69271557 69271553 69271555 69271557 69271553 69271555 69271557;}
@list l1:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;}
@list l1:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l1:level3
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l1:level4
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l1:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l1:level6
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l1:level7
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l1:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l1:level9
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l2
    {mso-list-id:785584813;
    mso-list-type:hybrid;
    mso-list-template-ids:-548755868 -1041962848 69271555 69271557 69271553 69271555 69271557 69271553 69271555 69271557;}
@list l2:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;}
@list l2:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l2:level3
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l2:level4
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l2:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l2:level6
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l2:level7
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l2:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l2:level9
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l3
    {mso-list-id:1184703954;
    mso-list-type:hybrid;
    mso-list-template-ids:1065153000 647109210 69271555 69271557 69271553 69271555 69271557 69271553 69271555 69271557;}
@list l3:level1
    {mso-level-start-at:0;
    mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;
    mso-fareast-font-family:Calibri;
    mso-fareast-theme-font:minor-latin;
    mso-bidi-font-family:"Times New Roman";
    mso-bidi-theme-font:minor-bidi;}
@list l3:level2
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level3
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l3:level4
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l3:level5
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level6
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
@list l3:level7
    {mso-level-number-format:bullet;
    mso-level-text:\F0B7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Symbol;}
@list l3:level8
    {mso-level-number-format:bullet;
    mso-level-text:o;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:"Courier New";}
@list l3:level9
    {mso-level-number-format:bullet;
    mso-level-text:\F0A7;
    mso-level-tab-stop:none;
    mso-level-number-position:left;
    text-indent:-18.0pt;
    font-family:Wingdings;}
ol
    {margin-bottom:0cm;}
ul
    {margin-bottom:0cm;}
-->
</style>

</head>

<body lang=IN style='tab-interval:36.0pt'>
    <title>Laporan Transaksi</title>

<div class=WordSection1 style="margin-top:0.5cm;">

<div align=center>

<h2><center>Laporan Transaksi</center></h2>
                         
                         <table border="1" align="center">
                  <tr>
                    <th><center>No.</center></th>
                    <th><center>Nama Customer</center></th>
                    <th><center>Alamat Customer</center></th>
                    <th><center>Total Transaksi</center></th>
                    <th><center>No HP</center></th>
                </tr>

                                    <?php
                //Detail keranjang belanja
                $total = 0;
                $no = 1;
                            $get = mysql_query('SELECT * FROM transaksi');
                            while($get_row = mysql_fetch_array($get)){
                                //$sub = $get_row['harga_obat'] * $value;
                                echo '
                                <tr">
                                    <td align="center">'.$no.'</td>
                                    <td align="center">'.$get_row['transaksi_nama'].'</td>
                                    <td align="center">'.$get_row['transaksi_alamat'].'</td>
                                    <td align="center">'.$get_row['transaksi_total'].'</td>
                                    <td align="center">'.$get_row['transaksi_hp'].'</td>
                                </tr>                           
                                ';
                                $no++;
                            }
                            
                
                ?>
                   </table>

              

<?php } ?>
<script>
window.print();
</script>