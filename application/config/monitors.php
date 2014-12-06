<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
$monitor_templates = array(
	'uptime' => array(
			'actionid'		=> 1,
			'actionName'	=> 'External monitoring',
			'name'			=>	'External',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Uptime',
			'type' 			=>	'add',
			'basketid'		=>	41
			),
		
	'uptime_locations' => array(
			'actionid'		=> 111,
			'actionName'	=> 'external_loc',
			'name'			=>	'external_loc',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Locations',
			'type' 			=>	'loc',
			'basketid'		=>	132
			),
	'uptime_frequency' => array(
			'actionid'		=> 12,
			'actionName'	=> 'TestFrequency',
			'name'			=>	'',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Uptime frequency',
			'type' 			=>	'update',
			'basketid'		=>	49,
			'list'			=> array(
								array('actionid'=>12, 'basketid'=>49, 'name'=>'1-60min'),
								array('actionid'=>24, 'basketid'=>50, 'name'=>'3-60min'),
								array('actionid'=>21, 'basketid'=>51, 'name'=>'5-60min'),
								array('actionid'=>25, 'basketid'=>52, 'name'=>'10-60min'),
								array('actionid'=>20, 'basketid'=>53, 'name'=>'15-60min')
						)
			),
	'servers' => array(
			'actionid'		=> 135,
			'actionName'	=> 'Server',
			'name'			=>	'Server',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Servers',
			'type' 			=>	'add',
			'basketid'		=>	161
			),
	'full_page' => array(
			'actionid'		=> 63,
			'actionName'	=> 'Advanced External',
			'name'			=>	'full_page',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Full page',
			'type' 			=>	'add',
			'basketid'		=>	85
			),
	'full_page_locations' => array(
			'actionid'		=> 113,
			'actionName'	=> 'fullpage_loc',
			'name'			=>	'fullpage_loc',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Full page locations',
			'type' 			=>	'loc',
			'basketid'		=>	134
			),
			
	'full_page_frequency' => array(
			'actionid'		=> 67,
			'actionName'	=> 'Advanced External Frequency',
			'name'			=>	'-advancedexternal',
			'nameType'		=>	'suffix',
			'value' 		=>	0,
			'title' 		=>	'Full page frequency',
			'type' 			=>	'update',
			'basketid'		=>	86,
			'list'			=> array(
								array('actionid'=>64, 'basketid'=>89, 'name'=>'5min'),
								array('actionid'=>65, 'basketid'=>88, 'name'=>'10min'),
								array('actionid'=>66, 'basketid'=>87, 'name'=>'15min'),
								array('actionid'=>67, 'basketid'=>86, 'name'=>'20min')
						)
			),
	'transaction' => array(
			'actionid'		=> 15,
			'actionName'	=> 'Add transaction',
			'name'			=>	'Transaction',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Transaction',
			'type' 			=>	'add',
			'basketid'		=>	43
			),
			
	'transaction_locations' => array(
			'actionid'		=> 112,
			'actionName'	=> 'transaction_loc',
			'name'			=>	'transaction_loc',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Transaction locations',
			'type' 			=>	'loc',
			'basketid'		=>	133
			),
			
	'transaction_frequency' => array(
			'actionid'		=> 36,
			'actionName'	=> 'Transaction Frequency',
			'name'			=>	'-transaction',
			'nameType'		=>	'suffix',
			'value' 		=>	0,
			'title' 		=>	'Transaction frequency',
			'type' 			=>	'update',
			'basketid'		=>	70,
			'list'			=> array(
								array('actionid'=>33, 'basketid'=>67, 'name'=>'5 min'),
								array('actionid'=>34, 'basketid'=>68, 'name'=>'10 min'),
								array('actionid'=>35, 'basketid'=>69, 'name'=>'15 min'),
								array('actionid'=>36, 'basketid'=>70, 'name'=>'20 min')
						)
			),
	'application' => array(
			'actionid'		=> 133,
			'actionName'	=> 'applications',
			'name'			=>	'applications',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Applications',
			'type' 			=>	'add',
			'basketid'		=>	159
			),
	'sms' => array(
			'actionid'		=> 10,
			'actionName'	=> 'SMS',
			'name'			=>	'SMS',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'SMS',
			'type' 			=>	'add',
			'basketid'		=>	54
			),
			
	'custom' => array(
			'actionid'		=> 0,
			'actionName'	=> 'custom',
			'name'			=>	'custom',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Custom monitor',
			'type' 			=>	'add',
			'basketid'		=>	0
			),
	'subaccountB' => array(
			'actionid'		=> 0,
			'actionName'	=> 'SubaccountB',
			'name'			=>	'SubaccountB_s',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'Subaccount',
			'type' 			=>	'add',
			'basketid'		=>	0
			),
	'rum' => array(
			'actionid'		=> 0,
			'actionName'	=> 'RUM_',
			'name'			=>	'RUM_',
			'nameType'		=>	'prefix',
			'value' 		=>	0,
			'title' 		=>	'RUM',
			'type' 			=>	'update',
			'basketid'		=>	0,
			'list'			=> array(
								array('actionid'=>0, 'basketid'=>0, 'name'=>'RUM_1'),
								array('actionid'=>0, 'basketid'=>0, 'name'=>'RUM_2'),
								array('actionid'=>0, 'basketid'=>0, 'name'=>'RUM_3'),
								array('actionid'=>0, 'basketid'=>0, 'name'=>'RUM_4'),
								array('actionid'=>0, 'basketid'=>0, 'name'=>'RUM_5')
						)
			)
);
*/
?>