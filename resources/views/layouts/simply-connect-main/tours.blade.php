@extends('app')
@section('title', 'Tours')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-map-marked-alt"></i> Tours</h2>
          <p class="lead mb-5">Discover &amp; explore. We understand that from time to time some pilots may want a break from flying our scheduled return flights. We&rsquo;ve created a series of tours for each aircraft class which will take you on a journey discovering different parts of the world.</p>

          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a aria-controls="section-1-pane" aria-labelledby="section-1-tab" class="nav-link active" id="section-1-tab" data-toggle="tab" href="#section-1-pane" role="tab">Tab 1</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-2-pane" aria-labelledby="section-2-tab" class="nav-link" id="section-2-tab" data-toggle="tab" href="#section-2-pane" role="tab">Tab 2</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-3-pane" aria-labelledby="section-3-tab" class="nav-link" id="section-3-tab" data-toggle="tab" href="#section-3-pane" role="tab">Tab 3</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="section-1-pane" role="tabpanel">

              @foreach ([
                  0 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => 'https://via.placeholder.com/1665x332.png?text=1665x332',
                      'link' => '#',
                      'title' => 'Tour 1',
                  ],
                  1 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => 'https://via.placeholder.com/1665x332.png?text=1665x332',
                      'title' => 'Tour 2',
                  ],
                  2 => [
                      'description' => 'Lorem ipsum dolor sit amet.',
                      'image' => 'https://via.placeholder.com/1665x332.png?text=1665x332',
                      'title' => 'Tour 3',
                  ],
              ] as $k => $v)
                <div class="border-bottom py-2">
                  <h3 class="mt-0">{{ $v['title'] }}</h3>
                  <img alt="{{ htmlspecialchars($v['title']) }}" class="d-block my-2" src="{{ $v['image'] }}">
                  <div class="d-flex align-items-center">
                    <p class="flex-fill lead m-0">{{ $v['description'] }}</p>
                    <p class="m-0">
                      @if(!empty($v['link']))
                        <a class="btn btn-sm btn-info" href="{{ $v['link'] }}" role="button">Tour Legs &amp; Info</a>
                      @else
                        <a class="btn btn-sm btn-info disabled" role="button">Tour Legs &amp; Info</a>
                      @endif
                    </p>
                  </div>
                </div>
              @endforeach

            </div>
            <div class="tab-pane fade" id="section-2-pane" role="tabpanel">...</div>
            <div class="tab-pane fade" id="section-3-pane" role="tabpanel">...</div>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection