<!-- resources/views/components/static-page.blade.php -->
@props(['slug'])

@php
$page = \App\Models\StaticPage::where('slug', $slug)->first();
@endphp

@if($page)

<div {!! $attributes->merge(['class' => 'static-page-content']) !!}>
    {!! $page->content !!}
</div>
@else
<!-- Optional: Handle case when no page is found -->
<div class="text-gray-500">
    Content not available
</div>
@endif