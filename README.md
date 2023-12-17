###Config Master Layout
````
1. parent page
<title>@yield('title')</title>
@yield('content')

2. child page
@extends('front.layout.master')
@section('title')
About
@endsection
````

####Active menu
````
#nested menu
request()->is('companies/*')

#single menu
{{ url()->current() == url('/') ? 'active' : '' }}
````
