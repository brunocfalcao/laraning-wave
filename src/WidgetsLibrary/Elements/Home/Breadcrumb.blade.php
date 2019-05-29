{{--
    return array('breadcrumbs' => [
            ['link' => route('wave.dashboard'), 'caption' => 'Home'],
            ['caption' => 'Test'],
    ]);
 --}}
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{ route('wave.home') }}">Home</a></li>
    @if(isset($breadcrumbs))
        @foreach($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item">
                @if(isset($breadcrumb['link']))
                    <a href="{{ $breadcrumb['link'] }}">{{ $breadcrumb['caption'] }}</a>
                @else
                    {{ $breadcrumb['caption'] }}
                @endif
        @endforeach
    @else
    @endif
</ol>