{{-- @dd($data) --}}
<div class="alert alert-secondary">
    <b>Code To Text Ratio:</b> {{ number_format($data['full_page']['codeToTxtRatio']['ratio']) }}% ({{ $data['full_page']['codeToTxtRatio']['text_length'] }}/{{ $data['full_page']['codeToTxtRatio']['total_length'] }}) <br />
</div>
<div class="alert alert-secondary">
    <b>Word Count:</b> {{ $data['full_page']['word_count'] }} <br />
</div>
<div class="alert alert-secondary">
    <b>Keyword</b><br />
    @foreach ($data['full_page']['keywords'] as $word => $count)
        <span class="badge bg-primary rounded-pill">{{ $word }} ({{ $count }})</span>
    @endforeach
</div>
<div class="alert alert-secondary">
    <b>Long Tail Keywords</b><br />
    @foreach ($data['full_page']['longTailKeywords'] as $word => $count)
        <span class="badge bg-primary rounded-pill">{{ $word }} ({{ $count }})</span>
    @endforeach
</div>


<div class="alert alert-secondary">
    <b>Headers</b><br />
    @foreach ($data['full_page']['headers'] as $key => $header)
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <b> + {{ $key }}</b> <span class="badge bg-primary rounded-pill">Count: {{ $header['count'] }}</span>
            </li>
            @foreach ($header['headers'] as $value)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <b>++ {!! $value !!}</b>
                </li>
            @endforeach
        </ul>
    @endforeach
</div>

<div class="alert alert-secondary">
    <b>Links</b><br />
    <span>Total: {{ $data['full_page']['links']['count'] }}</span><br />
    <span>Internal: {{ $data['full_page']['links']['internal'] }}</span><br />
    <span>External: {{ $data['full_page']['links']['external'] }}</span><br />
    <span>Follow: {{ $data['full_page']['links']['follow'] }}</span><br />
    <span>Nofollow: {{ $data['full_page']['links']['nofollow'] }}</span><br />
</div>

<div class="alert alert-secondary">
    <b>Image</b><br />
    <span>Count: {{ $data['full_page']['images']['count'] }}</span><br />
    <span>Has alt: {{ $data['full_page']['images']['count_alt'] }}</span><br />
</div>
