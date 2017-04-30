<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('scheduler/dhtmlxscheduler.css') }}">
	<script src="{{ URL::asset('js/app.js') }}"></script>
	<script src="{{ URL::asset('scheduler/dhtmlxscheduler.js') }}"></script>
	<script src="{{ URL::asset('scheduler/ext/dhtmlxscheduler_units.js') }}"></script>
	<script src="{{ URL::asset('scheduler/ext/dhtmlxscheduler_multisection.js') }}"></script>
	<script src="{{ URL::asset('scheduler/ext/dhtmlxscheduler_timeline.js') }}"></script>
	<script src="{{ URL::asset('scheduler/locale/locale_nl.js') }}" charset="utf-8"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.header', array('title'=>'Agenda'))
	<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:750px; padding:10px;margin: 10px;'>
		<div class="dhx_cal_navline">
			<div class="dhx_cal_prev_button">&nbsp;</div>
			<div class="dhx_cal_next_button">&nbsp;</div>
			<div class="dhx_cal_today_button"></div>
			<div class="dhx_cal_date"></div>
			<div class="dhx_cal_tab" name="unitweek_tab" style="right:280px;"></div>
			<div class="dhx_cal_tab" name="timeline_tab" style="right:280px;"></div>
			<div class="dhx_cal_tab" name="unit_tab" style="right:280px;"></div>
		</div>
		<div class="dhx_cal_header"></div>
		<div class="dhx_cal_data"></div>
	</div>
@include('layouts.footer')
<script>
	scheduler.locale.labels.unit_tab = "Dag";
	scheduler.config.readonly = true;
	scheduler.config.xml_date= "%Y-%m-%d %H:%i";
	scheduler.config.default_date = "%l %j %M %Y";
	scheduler.config.multisection = true;
	scheduler.createUnitsView({
		name:"unit",
		property:"type", //the mapped data property
		list: @php echo json_encode($tables) @endphp
	});
	scheduler.templates.unitweek_date = scheduler.templates.week_date;
	scheduler.templates.unitweek_scale_date = scheduler.templates.week_scale_date;
	scheduler.locale.labels.unitweek_tab = "Week";
	scheduler.createUnitsView({
		name:"unitweek",
		property:"type",
		days:7,
		list: @php echo json_encode($tables) @endphp
	});

	scheduler.locale.labels.timeline_tab = "Timeline";
	scheduler.createTimelineView({
		name:"timeline",
		x_unit:"minute",//measuring unit of the X-Axis.
		x_date:"%H:%i", //date format of the X-Axis
		x_step:30,      //X-Axis step in 'x_unit's
		x_size:21,      //X-Axis length specified as the total number of 'x_step's
		x_start:16,     //X-Axis offset in 'x_unit's
		x_length:48,    //number of 'x_step's that will be scrolled at a time
		y_property:"type",
		render: "bar",
		y_unit: @php echo json_encode($tables) @endphp
	});
	scheduler.init('scheduler_here', new Date(), "unit");

	scheduler.parse(@php echo json_encode($reservations); @endphp, "json" );
	scheduler.parse(@php echo json_encode($workshops); @endphp, "json");
</script>
</body>
</html>

