<div class="card mb-2">
  <div class="card-header p-1">
    <h5 class="m-1 p-0">
      @lang('DisposableTools::common.sundetails')
      @if(isset($location)) | {{ $location }} @endif
      <i class="fas fa-adjust float-right"></i>
    </h5>
  </div>
  @if(isset($details))
    <div class="card-body p-0">
      <table class="table table-borderless table-sm table-striped mb-0">
        @if($twilight_begin > 1)
          <tr>
            <td class="text-left">@lang('DisposableTools::common.twilight_begin')</td>
            <td class="text-right">{{ Carbon::parse($twilight_begin)->format('H:i') }} UTC</td>
          </tr>
        @endif
        @if($sunrise > 1)
        <tr>
          <td class="text-left">@lang('DisposableTools::common.sunrise')</td>
          <td class="text-right">{{ Carbon::parse($sunrise)->format('H:i') }} UTC</td>
        </tr>
        @endif
        @if($sunset > 1)
        <tr>
          <td class="text-left">@lang('DisposableTools::common.sunset')</td>
          <td class="text-right">{{ Carbon::parse($sunset)->format('H:i') }} UTC</td>
        </tr>
        @endif
        @if($twilight_end > 1)
          <tr>
            <td class="text-left">@lang('DisposableTools::common.twilight_end')</td>
            <td class="text-right">{{ Carbon::parse($twilight_end)->format('H:i') }} UTC</td>
          </tr>
        @endif
        @if($twilight_begin == 1 || $sunrise == 1 || $sunset == 1 || $twilight_end == 1)
          <tr>
            <td class="text-left">Message</td>
            <td class="text-right">Not Able To Calculate All Times</td>
          </tr>
        @endif
      </table>
    </div>
  @elseif(isset($error))
    <div class="card-body p-0 text-center">
      <span class="text-danger">{{ $error }}</span>
    </div>
  @endif
</div>
