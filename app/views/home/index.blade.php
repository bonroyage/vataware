@section('content')

<iframe src="http://www.klausbasan.de/vatgm/DisplayInclude.htm" class="mapContainer"></iframe>
<div class="smallMapStats">
PILOTS ONLINE: <span style="color:#138995;">{{ $pilots }}</span>&nbsp; &nbsp; ATC ONLINE: <span style="color:#138995;">{{ $atc }}</span>
</div>
<div style="margin-top: -5px;">
@include('search.bar')
</div>
<div class="container"><br /><br />
	<div class="tiles" style="text-align: center;">
		<a href="#" class="tile" style="background-color:#138995;">
			<div style="margin-top: 50px;">
				<i class="fa fa-user" style="font-size:50px; margin-bottom: 15px;"></i><br />
				Pilot Information
			</div>
		</a>
		<a href="#" class="tile" style="background-color:#199caa;">
			<div style="margin-top: 50px;">
				<i class="fa fa-desktop" style="font-size:50px; margin-bottom: 15px;"></i><br />
				ATC Information
			</div>
		</a>
		<a href="#" class="tile" style="background-color:#1cb1c1;">
			<div style="margin-top: 50px;">
				<i class="fa fa-sun-o" style="font-size:50px; margin-bottom:15px;"></i><br />
				Weather Information
			</div>
		</a>
		<a href="#" class="tile" style="background-color:#1fbfcf;">
			<div style="margin-top: 50px;">
				<i class="fa fa-globe" style="font-size:50px; margin-bottom: 15px;"></i><br />
				Statistics
			</div>
		</a>
		<a href="#" class="tile" style="background-color:#22cbdc;">
			<div style="margin-top: 50px;">
				<i class="fa fa-cloud-download" style="font-size:50px; margin-bottom: 15px;"></i><br />
				Resources
			</div>
		</a>
	</div>
	<div>
		<h2 class="section-header">Statistics</h2>
		<div class="well well-sm">
			<div class="row homeStats">
				<div class="col-lg-2" style="border-right:3px solid #2e7d7d;">
					<h2>{{ $users }}</h2>
					<small>Users Online</small>
				</div>
				<div class="col-lg-2" style="border-right:3px solid #92c36f;">
					<h2>{{ $day }}</h2>
					<small>Flights Today</small>
				</div>
				<div class="col-lg-2" style="border-right:3px solid #ee592f;">
					<h2>{{ $month }}</h2>
					<small>Flights This Month</small>
				</div>
				<div class="col-lg-2" style="border-right:3px solid #92c36f;">
					<h2>{{ $year }}</h2>
					<small>Flights This Year</small>
				</div>
				<div class="col-lg-2" style="border-right:3px solid #ee592f;">
					<h2>{{ $change }}%<sup><i style="color:#138995; font-size: 17px;" class="glyphicon glyphicon-arrow-{{ $changeArrow }}"></i> </sup></h2>
					<small>Compared to last year</small>
				</div>
				<div class="col-lg-2">
					<h2>{{ $distance }}</h2>
					<small>Miles flown today</small>
				</div>
			</div>
		</div>
	</div>
	<h2 class="section-header">Active flights</h2>
	<table class="table table-striped table-hover" style="margin-top: 20px;">
		<thead>
			<tr>
				<th>Callsign</th>
				<th>Type</th>
				<th>Pilot</th>
				<th>From</th>
				<th>To</th>
				<th>Duration</th>
			</tr>
		</thead>
		<tbody class="rowlink" data-link="row">
			@foreach($flights as $flight)
			<tr>
				<td><a href="{{ URL::route('flight.show', $flight->id) }}">{{ $flight->callsign }}</a></td>
				<td>{{ $flight->aircraft_id }}</td>
				<td>{{ $flight->pilot->name }}</td>
				<td>
					@if($flight->departure)
					<img src="{{ asset('assets/images/flags/' . $flight->departure_country_id . '.png') }}"> {{ $flight->departure->id }} {{ $flight->departure->city }}
					@endif
				</td>
				<td>
					@if($flight->arrival)
					<img src="{{ asset('assets/images/flags/' . $flight->arrival_country_id . '.png') }}"> {{ $flight->arrival->id }} {{ $flight->arrival->city }}
					@endif
				<td>{{ ($flight->state == 0) ? '<em>Departing</em>' : $flight->traveled_time }}</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>

@stop