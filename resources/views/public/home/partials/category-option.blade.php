<option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
    {{ $prefix }}{{ $category->name }}
</option>

@if ($category->childrenRecursive)
    @foreach ($category->childrenRecursive as $child)
        @include('public.home.partials.category-option', ['category' => $child, 'prefix' => $prefix . '↪'])
    @endforeach
@endif
