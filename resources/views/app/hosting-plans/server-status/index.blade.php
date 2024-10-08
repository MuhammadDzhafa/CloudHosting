@extends('layouts.template-landing-page.web.master')

@section('server-status')
@include('app.hosting-plans.server-status.section1')
@include('app.hosting-plans.server-status.section2')
@include('app.hosting-plans.server-status.section3')
@include('app.hosting-plans.server-status.section4')

@endsection