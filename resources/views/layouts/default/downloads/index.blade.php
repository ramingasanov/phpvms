@extends('app')
@section('title', trans_choice('common.download', 2))

@section('content')
  @include('flash::message')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-file-download"></i> {{ trans_choice('common.download', 2) }}</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet.</p>

          @if(!$grouped_files || \count($grouped_files) === 0)
            <div class="jumbotron text-center">@lang('downloads.none')</div>
          @else
            @foreach($grouped_files as $group => $files)
              <div class="col-sm-12">
                <h3 class="mt-0">
                  {{ $group }}
                </h3>
		@foreach($files as $file)
                <div class="row mt-3">
                  <div class="col-sm-2">
                    <img alt="{{ htmlspecialchars($group) }}" src="https://via.placeholder.com/200x200?text=200x200">
                  </div>
                  <div class="col-sm-10">
                    <h4 class="mt-0">
                      {{ $file->name }}
                    </h4>
                    {{-- Only show description if one is provided --}}
                    @if($file->description)
                      <p>
                        {{ $file->description }}
                        <span class="text-muted">{{ $file->download_count . ' ' . trans_choice('common.download', $file->download_count) }}</span>
                      </p>
                    @endif
                    <p>
                      <a class="btn btn-primary" href="{{ route('frontend.downloads.download', [$file->id]) }}" role="button" target="_blank">Download</a>
                    </p>
                  </div>
                </div>
		@endforeach
              </div>
            @endforeach
          @endif
          <div class="row">

            @foreach ([
                0 => [
                    'description' => 'Lorem ipsum dolor sit amet.',
                    'image' => 'https://via.placeholder.com/200x200?text=200x200',
                    'link' => 'https://example.com',
                    'title' => 'File 1'
                ],
                1 => [
                    'description' => 'Lorem ipsum dolor sit amet.',
                    'image' => 'https://via.placeholder.com/200x200?text=200x200',
                    'link' => 'https://example.com',
                    'title' => 'File 2'
                ],
                2 => [
                    'description' => 'Lorem ipsum dolor sit amet.',
                    'image' => 'https://via.placeholder.com/200x200?text=200x200',
                    'link' => 'https://example.com',
                    'title' => 'File 3'
                ]
            ] as $v)
            @endforeach

          </div>

        </div>
      </div>
    </div>
  </div>
@endsection

@section('content')
@endsection
