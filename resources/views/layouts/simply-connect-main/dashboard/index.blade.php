@extends('app')
@section('title', __('common.dashboard'))

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
            @if(Auth::user()->state === \App\Models\Enums\UserState::ON_LEAVE)
            <div class="row">
              <div class="col-sm-12">
                <div class="alert alert-warning" role="alert">
                  You are on leave! File a PIREP to set your status to active!
                </div>
              </div>
            </div>
          @endif    
			<div class="row">
				<div class="col-md-12">
					<h3>
						My Stats
					</h3>
				</div>
			</div>
			<div class="row">
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background">
                            <i class="fas fa-plane icon"></i>
                          </div>
                          <h3 class="header">{{ $user->flights }}</h3>
                          <h5 class="description">{{ trans_choice('common.flight', $user->flights) }}</h5>
                        </div>
                      </div>
				</div>
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background">
                            <i class="far fa-clock icon"></i>
                          </div>
                          <h3 class="header">@minutestotime($user->flight_time)</h3>
                          <h5 class="description">@lang('dashboard.totalhours')</h5>
                        </div>
                      </div>
				</div>
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background">
                            <i class="fas fa-plane-arrival icon"></i>
                          </div>
                          <h3 class="header">{{ Widget::personalStats(['type' => 'avglanding']) }}</h3>
                          <h5 class="description">Average Landing Rate</h5>
                        </div>
                      </div>
				</div>
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background">
                            <i class="fas fa-chart-line icon"></i>
                          </div>
                          <h3 class="header">{{ Widget::personalStats(['type' => 'avgscore']) }}</h3>
                          <h5 class="description">Average Flight Score</h5>
                        </div>
                      </div>
				</div>
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background"> {{--110px font-size--}}
                            <i class="fas fa-ruler icon"></i>
                          </div>
                          <h3 class="header">{{ Widget::personalStats(['type' => 'avgdistance']) }}</h3>
                          <h5 class="description">Average Distance</h5>
                        </div>
                      </div>
				</div>
				<div class="col-md-2">
                    <div class="card card-primary text-white dashboard-box">
                        <div class="card-body text-center">
                          <div class="icon-background">
                            <i class="fas fa-globe-europe icon"></i>
                          </div>
                          <h3 class="header">{{ Widget::personalStats(['type' => 'totdistance']) }}</h3>
                          <h5 class="description">Total Distance</h5>
                        </div>
                      </div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-8">
					<h3>Whats Happening on Simply Connect</h3>
					<div class="row">
            <div class="card border-black-bottom dashboard-table">
              <h4 class="card-header">Latest Flights</h4>
              <div class="card-body">
						   {{ Widget::latestPireps(['count' => 5]) }}
              </div>
            </div>
					</div>
					<div class="row">
						<div class="col-md-4 pl-0">{{Widget::TopPilotsByPeriod(['type' =>'average landing rate', 'count' => 10])}}</div>
						<div class="col-md-4 p-0">{{Widget::TopPilotsByPeriod(['type' =>'flights', 'count' => 10])}}</div>
						<div class="col-md-4 pr-0">{{Widget::TopPilotsByPeriod(['type' =>'distance', 'count' => 10])}}</div>
					</div>
				</div>
				<div class="col-md-4">
                    <div class="nav nav-tabs" role="tablist">
                        @lang('dashboard.yourlastreport')
                      </div>
                      <div class="card border-black-bottom">
                        @if($last_pirep === null)
                          <div class="card-body" style="text-align:center;">
                            @lang('dashboard.noreportsyet') <a
                              href="{{ route('frontend.pireps.create') }}">@lang('dashboard.fileonenow')</a>
                          </div>
                        @else
                          @include('dashboard.pirep_card', ['pirep' => $last_pirep])
                        @endif
                      </div>
                    {{ Widget::latestNews(['count' => 5]) }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
