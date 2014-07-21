<?php
if($Settings['member_group']==null) {
require( 'Settings.php');
$StatSQL = mysql_connect($Settings['sql_host'],$Settings['sql_username'],$Settings['sql_password']);
@mysql_select_db($Settings['sql_database']) or die( "Unable to select database");
$query="CREATE TABLE `".$Settings['sql_tableprefix']."Groups` ( `id` bigint(25) NOT NULL auto_increment, `Name` varchar(150) NOT NULL default '', `Name_prefix` varchar(150) NOT NULL default '', `Name_suffix` varchar(150) NOT NULL default '', `View_board` varchar(5) NOT NULL default '', `Edit_profile` varchar(5) NOT NULL default '', `Can_make_topics` varchar(5) NOT NULL default '', `Can_make_replys` varchar(5) NOT NULL default '', `Can_edit_replys` varchar(5) NOT NULL default '', `Can_delete_replys` varchar(5) NOT NULL default '', `Can_add_events` varchar(5) NOT NULL default '', `Can_pm` varchar(5) NOT NULL default '', `Can_dohtml` varchar(5) NOT NULL default '', `Promote_to` varchar(150) NOT NULL default '', `Promote_posts` bigint(25) NOT NULL default '0', `Has_mod_cp` varchar(5) NOT NULL default '', `Has_admin_cp` varchar(5) NOT NULL default '', PRIMARY KEY  (`id`));";
$result=mysql_query($query);
$query = "INSERT INTO ".$Settings['sql_tableprefix']."Groups (`id`, `Name`, `Name_prefix`, `Name_suffix`, `View_board`, `Edit_profile`, `Can_make_topics`, `Can_make_replys`, `Can_edit_replys`, `Can_delete_replys`, `Can_add_events`, `Can_pm`, `Can_dohtml`, `Promote_to`, `Promote_posts`, `Has_mod_cp`, `Has_admin_cp`) VALUES (1, 'Admin', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'yes', 'yes'), (2, 'Moderator', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'yes', 'no'), (3, 'Member', '', '', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'yes', 'none', 0, 'no', 'no'), (4, 'Guest', '', '', 'yes', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'none', 0, 'no', 'no'), (5, 'Banned', '', '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'none', 0, 'no', 'no');"; 
$result = mysql_query($query);
$query = "ALTER TABLE `".$Settings['sql_tableprefix']."Posts` ADD `IP` VARCHAR(20) NOT NULL AFTER `Post`";
$result = mysql_query($query);
$query = "SELECT * FROM ".$Settings['sql_tableprefix']."Posts";
$result = mysql_query($query);
$PostIP1 = mysql_num_rows($result);
$PostIP2 = 0;
while ($PostIP2 < $PostIP1) {
	$RepliesID = mysql_result($result,$PostIP2,"ID");
	$UsersID = mysql_result($result,$PostIP2,"UserID");
	$querys = "SELECT * FROM ".$Settings['sql_tableprefix']."Members WHERE ID=".$UsersID;
	$results = mysql_query($querys);
	$PostIP3 = mysql_num_rows($results);
	$PostIP4 = 0;
	while ($PostIP4 < $PostIP3) {
		$UsersIP = mysql_result($results,$PostIP4,"IP"); 
		++$PostIP4; }
		$query="UPDATE ".$Settings['sql_tableprefix']."Posts SET IP='".$UsersIP."' WHERE ID=".$RepliesID;
        mysql_query($query);
	++$PostIP2; }
$BoardSettings="<?php\n\$Settings['sql_host'] = '".$Settings['sql_host']."';\n\$Settings['sql_database'] = '".$Settings['sql_database']."';\n\$Settings['sql_tableprefix'] = '".$Settings['sql_tableprefix']."';\n\$Settings['sql_username']	= '".$Settings['sql_username']."';\n\$Settings['sql_password']	= '".$Settings['sql_password']."';\n\$Settings['admin_password'] = '".$Settings['admin_password']."';\n\$Settings['board_name'] = '".$Settings['board_name']."';\n\$Settings['board_keywords'] = '".$Settings['board_keywords']."';\n\$Settings['board_description'] = '".$Settings['board_description']."';\n\$Settings['board_html']	= '".$Settings['board_html']."';\n\$Settings['board_logo']	= '".$Settings['board_logo']."';\n\$Settings['board_offline'] = '".$Settings['board_offline']."';\n\$Settings['max_sig_size'] = ".$Settings['max_sig_size'].";\n\$Settings['max_sig_size_admin'] = ".$Settings['max_sig_size_admin'].";\n\$Settings['max_sig_size_moderator'] = ".$Settings['max_sig_size_moderator'].";\n\$Settings['max_sig_size_member'] = ".$Settings['max_sig_size_member'].";\n\$Settings['max_pms'] = ".$Settings['max_pms'].";\n\$Settings['google_ads'] = '".$Settings['google_ads']."';\n\$Settings['google_ads_top'] = '".$Settings['google_ads_top']."';\n\$Settings['google_ads_bottom'] = '".$Settings['google_ads_bottom']."';\n\$Settings['use_gd_register'] = '".$Settings['use_gd_register']."';\n\$Settings['use_gzip'] = '".$Settings['use_gzip']."';\n\$Settings['member_group'] = 'Member';\n\$Settings['guest_group'] = 'Guest';\n?>";
$fp = fopen("Settings.php","w+");
fwrite($fp, $BoardSettings);
fclose($fp);
echo '<meta	http-equiv="Refresh" Content="0; URL=index.php?act=View">'; }
?>