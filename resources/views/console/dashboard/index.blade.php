@extends('layouts.console')

@section('title')
    Dashboard
@endsection

@section('nav')
    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Halaman</a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
    </ol>
    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
@endsection

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col">
            @include('partials.alert')
        </div>
    </div>
    <div class="row">
        <div class="col-lg">

            <div id='map' style="width:100%; height: 400px"></div>

        </div>
    </div>
</div>

<script>
    // initiziliation map

    var openStreet = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

    var street = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


    var satelite = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var dark = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});

    var map = L.map('map', {
        center: [-6.933581160742665, 106.89597601528683],
        zoom: 17,
        layers: [openStreet]
    });

    var baseMaps = {
        "OpenStreetMap": openStreet,
        "Mapbox Streets": street,
        "Mapbox Satellite": satelite,
        "Mapbox Dark": dark,
    };

    var layerControl = L.control.layers(baseMaps).addTo(map);


    // end initiziliation map

    // start marker

    const icon = L.icon({
        // icon builidng cdn
        iconUrl: 'https://cdn.iconscout.com/icon/free/png-256/map-marker-1764984-1502639.png',
        iconSize: [38, 95],
        iconAnchor: [22, 94],
        popupAnchor: [-3, -76],
        shadowUrl: 'https://cdn.iconscout.com/icon/free/png-256/map-marker-1764984-1502639.png',
        shadowSize: [68, 95],
        shadowAnchor: [22, 94]
    });
    var cibentangMark = L.marker([-6.933249, 106.898305], {icon: icon}).addTo(map).bindPopup('Cibentang')

    // end marker



</script>


@endsection


