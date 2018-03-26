@foreach ($categories as $category_list)
    <tr class="cat-item">
        <td>
            {!! $delimiter or "" !!}{{$category_list->title or ""}}
        </td>
    </tr>
    @if (count($category_list->children) > 0)

        @include('admin.category.partials.list', [
          'categories' => $category_list->children,
          'delimiter'  => ' - ' . $delimiter
        ])

    @endif
@endforeach