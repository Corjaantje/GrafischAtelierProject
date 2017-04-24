<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('scheduler/dhtmlxscheduler.css') }}">
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<script src="{{ URL::asset('scheduler/dhtmlxscheduler.js') }}"></script>
	<script src="{{ URL::asset('scheduler/ext/dhtmlxscheduler_units.js') }}"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Agenda'))
<div class="container">
	<!---->
	<div class="row">
		<div class="col-md-12">
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:750px; padding:10px;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="unit_tab" style="right:280px;"></div>
		</div>
		<div class="dhx_cal_header"></div>
		<div class="dhx_cal_data"></div>
	</div></div>
	</div>
	<!---->
</div>
@include('layouts.footer')
<script>
	scheduler.locale.labels.unit_tab = "Unit";
	scheduler.createUnitsView({
		name:"unit",
		property:"unit_id", //the mapped data property
		list:[              //defines the units of the view
			{key:1, label:"Section A"},
			{key:2, label:"Section B"},
			{key:3, label:"Section C"}
		]
	});

	scheduler.init('scheduler_here', new Date(), "unit");
	scheduler.parse([
		{id:1, text:"Task1", start_date:"04/20/2017 12:00", end_date:"04/20/2017 15:00",
			unit_id:"1"},
		{id:2, text:"Task2", start_date:"04/20/2017 09:00", end_date:"04/20/2017 12:00",
			unit_id:"3"},
		{id:3, text:"Task3", start_date:"04/20/2017 09:00", end_date:"04/20/2017 14:00",
			unit_id:"2"}
	],"json");
</script>
</body>
</html>

