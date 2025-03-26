@props(['type' => 'info', 'message' => ''])

@php
    $colors = [
        'success' => 'bg-green-100 text-green-700 border-green-400',
        'error' => 'bg-red-100 text-red-700 border-red-400',
        'warning' => 'bg-yellow-100 text-yellow-700 border-yellow-400',
        'info' => 'bg-blue-100 text-blue-700 border-blue-400',
    ];
@endphp
<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" x-transition
    class="inline-block px-4 py-2 text-sm border-l-4 rounded shadow-sm {{ $colors[$type] ?? $colors['info'] }}">
    {{ $message }}
</div>
