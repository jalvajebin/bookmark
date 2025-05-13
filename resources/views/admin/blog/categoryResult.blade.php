@if ($categories)
    @foreach ($categories as $key => $data)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $data->title_en }}</td>
            <td>
                <div class="form-check form-switch">
                    <input class="form-check-input statusCategory" type="checkbox" role="switch"
                        value="{{ $data->id }}" @if ($data->status == 1) checked @endif>
                </div>
            </td>
            <td>
                <ul class="list-unstyled hstack gap-1 mb-0">
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Edit">
                        <a href="#" class="btn btn-sm btn-soft-info editCategoryIcon"
                            data-id="{{ $data->id }}"><i class="mdi mdi-pencil-outline"></i></a>
                    </li>
                    <li data-bs-toggle="tooltip" data-bs-placement="top" aria-label="Delete">
                        <a href="#" class="btn btn-sm btn-soft-danger deleteCategoryIcon"
                            data-id="{{ $data->id }}"><i class="mdi mdi-delete-outline"></i></a>
                    </li>
                </ul>
            </td>
        </tr>
    @endforeach
@else
    <tr>
        <td colspan="4">There are no data.</td>
    </tr>
@endif
