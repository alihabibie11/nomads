@extends('layouts.app')

@section('title', 'List Travel')

@section('content')

<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">

    <div class="container">
      <div class="row">
        <div class="col p-0 pl-3 pl-lg-0">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" aria-current="page">
                Home
              </li>
              <li class="breadcrumb-item active" aria-current="page">
                Paket Travel
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="container">
        <div class="row">
          @foreach ($items as $item)
          <div class="col-6">
            <div class="card card-details mb-4">
              <img src="{{ Storage::url($item->galleries->first()->image) }}" style="max-height: 220px"
                class="card-img-top" alt=" ...">
              <div class="card-body">
                <a href="{{ route('detail', $item->slug) }}">
                  <h5 class="card-title">{{ $item->title }}</h5>
                </a>
                <p class="card-text">
                  {{ \Illuminate\Support\Str::limit($item->about, 20, '...')
                  }}</p>
              </div>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </section>
</main>

@stop