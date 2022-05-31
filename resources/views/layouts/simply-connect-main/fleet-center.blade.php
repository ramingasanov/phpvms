@extends('app')
@section('title', 'Fleet Center')

@section('content')
  <div class="container py-3 py-md-4">
    <div class="p-4">
      <div class="row">
        <div class="col-md-12">
          <h2><i class="fas fa-plane"></i> Fleet Center</h2>
          <p class="lead mb-5">Lorem ipsum dolor sit amet.</p>

          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a aria-controls="section-1-pane" aria-labelledby="section-1-tab" class="nav-link active" id="section-1-tab" data-toggle="tab" href="#section-1-pane" role="tab">GA Fleet</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-2-pane" aria-labelledby="section-2-tab" class="nav-link" id="section-2-tab" data-toggle="tab" href="#section-2-pane" role="tab">PAX Fleet</a>
            </li>
            <li class="nav-item" role="presentation">
              <a aria-controls="section-3-pane" aria-labelledby="section-3-tab" class="nav-link" id="section-3-tab" data-toggle="tab" href="#section-3-pane" role="tab">section-3</a>
            </li>
          </ul>

          <div class="tab-content">
            <div class="tab-pane fade show active" id="section-1-pane" role="tabpanel">

              @foreach ([
                  0 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 8,
                      'title' => 'Airbus A319',
                  ],
                  1 => [
                      'division' => 'Test Division',
                      'download_link' => '#',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 8,
                      'title' => 'Airbus A320',
                  ],
                  2 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 8,
                      'title' => 'Airbus A321',
                  ],
                  3 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Airbus A330',
                  ],
                  3 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Airbus A340',
                  ],
                  4 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Airbus A350',
                  ],
                  5 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 2,
                      'title' => 'Airbus A300',
                  ],
                  6 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Airbus A310',
                  ],
                  7 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 8,
                      'title' => 'Boeing 737',
                  ],
                  8 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Boeing 748',
                  ],
                  9 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Boeing 752',
                  ],
                  10 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Boeing 787',
                  ],
                  11 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Md 88',
                  ],
                  12 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Crj 500/700',
                  ],
                  13 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Dashq8',
                  ],
                  14 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Bae 146',
                  ],
                  15 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Embraer 190/175',
                  ],
                  16 => [
                      'division' => 'Test Division',
                      'image' => 'https://via.placeholder.com/600x200?text=Plane+image+goes+here.',
                      'number_in_fleet' => 3,
                      'title' => 'Cj4',
                  ],
              ] as $k => $v)
                <div class="media mt-{{ $k === 0 ? '3' : '5' }}">
                  <img class="align-self-center mr-5" src="{{ $v['image'] }}">
                  <div class="media-body">
                    <h5 class="mt-0">
                      {{ $v['title'] }}
                    </h5>
                    <p>
                      <b>Division:</b> {{ $v['division'] }}<br>
                      <b>Number in fleet:</b> {{ $v['number_in_fleet'] }}
                    </p>
                    <p>
                      <a class="btn btn-sm btn-info" data-target="#fleet-{{ $k }}-modal" data-toggle="modal" href="#fleet-{{ $k }}-modal">Aircraft Info &amp; Downloads</a>
                    </p>
                  </div>
                </div>
                <div class="modal fade" id="fleet-{{ $k }}-modal" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">
                          {{ $v['title'] }}
                        </h5>
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>
                          <b>Division:</b> {{ $v['division'] }}<br>
                          <b>Number in fleet:</b> {{ $v['number_in_fleet'] }}
                        </p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        @if (isset($v['download_link']))
                          <a class="btn btn-primary" href="{{ $v['download_link'] }}">Download</a>
                        @else
                          <a class="btn btn-primary disabled">Download</a>
                        @endif
                      </div>
                    </div>
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