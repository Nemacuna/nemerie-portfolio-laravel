@extends('layouts.app')

@section('title', $profile['name'] . ' — Portfolio')

@section('content')
    @include('sections.home')
    @include('sections.about')
    @include('sections.education')
    @include('sections.certificates')
    @include('sections.projects')
    @include('sections.contact')
@endsection
