<div class="nav nav-tabs bg-light-green text-white" role="tablist">
  @lang('widgets.latestnews.news')
</div>
<div class="card border-black-bottom">
  <div class="card-body" style="min-height: 0px">
    @if($news->count() === 0)
      <div class="text-center text-muted" style="padding: 30px;">
        @lang('widgets.latestnews.nonewsfound')
      </div>
    @endif

    @foreach($news as $i => $item)
      @if($i > 0)
        <h4 class="mt-2">{{ $item->subject }}</h4>
      @else
        <h4>{{ $item->subject }}</h4>
      @endif
      <p class="category">{{ $item->user->name_private }}
        - {{ show_datetime($item->created_at) }}</p>

      {{ $item->body }}
    @endforeach
    <div class="d-flex justify-content-center mt-4">
      {{ $news->links() }}
    </div>
  </div>
</div>
