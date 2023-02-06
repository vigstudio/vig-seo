{{-- @dd($data) --}}

<div class="form-group mb-3">
    <label for="seo_title" class="control-label">Keyword</label>
    {!! Form::textarea('vig_seo_keywords', $meta ?? old('vig_seo_keywords'), ['class' => 'form-control', 'rows' => 3, 'id' => 'seo_description', 'placeholder' => 'Keywords', 'data-counter' => 500]) !!}
</div>


<div class="alert alert-secondary">
    <b>Code To Text Ratio:</b> {{ number_format($data['mainText']['code_to_text_ratio']) }}%
</div>
<div class="alert alert-secondary">
    <b>Word Count:</b> {{ number_format($data['mainText']['word_count']) }} <br />
</div>

<div class="alert alert-secondary">
    <b>Keywords Check</b><br />
    @foreach ($data['getKeywords'] as $key => $keyword)
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <b> + {{ $key }} (Count key word: {{ count($keyword) }})</b>
            </li>
        </ul>
    @endforeach
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
                <b> + {{ $key }} ({{ count($links) }})</b>
            </li>
            @foreach ($links as $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>++ {{ $value }}</b>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>
