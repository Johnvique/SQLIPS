<?php


	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/users.php");
	include("$currDir/users_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('users');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "users";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`users`.`id`" => "id",
		"`users`.`name`" => "name",
		"`users`.`email`" => "email",
		"`users`.`address`" => "address",
		"`users`.`country`" => "country"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`users`.`id`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`users`.`id`" => "id",
		"`users`.`name`" => "name",
		"`users`.`email`" => "email",
		"`users`.`address`" => "address",
		"`users`.`country`" => "country"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`users`.`id`" => "ID",
		"`users`.`name`" => "Name",
		"`users`.`email`" => "Email",
		"`users`.`address`" => "Address",
		"`users`.`country`" => "Country"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`users`.`id`" => "id",
		"`users`.`name`" => "name",
		"`users`.`email`" => "email",
		"`users`.`address`" => "address",
		"`users`.`country`" => "country"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`users` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = true;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 0;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "users_view.php";
	$x->RedirectAfterInsert = "users_view.php?SelectedID=#ID#";
	$x->TableTitle = "Users";
	$x->TableIcon = "resources/table_icons/teamwork.png";
	$x->PrimaryKey = "`users`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150);
	$x->ColCaption = array("Name", "Email", "Address", "Country");
	$x->ColFieldName = array('name', 'email', 'address', 'country');
	$x->ColNumber  = array(2, 3, 4, 5);

	// template paths below are based on the app main directory
	$x->Template = 'templates/users_templateTV.html';
	$x->SelectedTemplate = 'templates/users_templateTVS.html';
	$x->TemplateDV = 'templates/users_templateDV.html';
	$x->TemplateDVP = 'templates/users_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `users`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='users' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `users`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='users' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`users`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: users_init
	$render=TRUE;
	if(function_exists('users_init')){
		$args=array();
		$render=users_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: users_header
	$headerCode='';
	if(function_exists('users_header')){
		$args=array();
		$headerCode=users_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: users_footer
	$footerCode='';
	if(function_exists('users_footer')){
		$args=array();
		$footerCode=users_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>