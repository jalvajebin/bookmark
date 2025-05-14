@if ($blogs)
    @foreach ($blogs as $key => $blog)
        <tr>
            <td style="text-align: left;">{{ $key + 1 }}</td>
            <td>{{ $blog->title }} </td>
            <td><a href="{{ $blog->main_images->preview ?? '' }}" target="_blank"><img
                        src=" {{ $blog->main_images->thumbnail ?? asset('admin/images/no-image.png') }}" alt="Blog Image"
                        width=70 height=50></a></td>
            <td><a href="{{ $blog->inner_images->preview ?? '' }}" target="_blank"><img
                        src="{{ $blog->inner_images->thumbnail ?? asset('admin/images/no-image.png') }}" alt="Blog Image"
                        width=70 height=50></a></td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input status" type="checkbox" role="switch" value="{{ $blog->id }}"
                        @if ($blog->status == 1) checked @endif>
                </div>
            </td>
            <td>
                <ul class="list-unstyled hstack gap-1 mb-0">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                        <a href="/admin/blog/edit/{{ $blog->id }}" class="btn btn-sm btn-soft-info editIcon"><i
                                class="mdi mdi-pencil-outline"></i></a>
                    </li>
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                        <a href="#" class="btn btn-sm btn-soft-danger deleteIcon" data-id="{{ $blog->id }}"><i
                                class="mdi mdi-delete-outline"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="10">There are no service.</td>
    </tr>
@endif
