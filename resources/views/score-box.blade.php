{{-- @dd($data) --}}
<div class="alert alert-secondary">
    <b>Code To Text Ratio:</b> {{ number_format($data['mainText']['code_to_text_ratio']) }}%
</div>
<div class="alert alert-secondary">
    <b>Word Count:</b> {{ number_format($data['mainText']['word_count']) }} <br />
</div>

<div class="alert alert-secondary">
    <b>Headers</b><br />
    @foreach ($data['headers'] as $key => $header)
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <b> + {{ $key }}</b>
            </li>
            @foreach ($header as $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>++ {!! $value['text'] !!}</b>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>

<div class="alert alert-secondary">
    <b>Link</b><br />
    @foreach ($data['links'] as $key => $links)
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <b> + {{ $key }}</b>
            </li>
            @foreach ($links as $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>++ {{ $value }}</b>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
