<div class="task">
    <div class="title">
        <form method="get" id="form-is-done" action="{{route('task.is_done')}}">
            <input type="hidden" name="id" value="{{$data['id']}}">
            <input
                id="is-done"
                type="checkbox"
                @if($data && $data['is_done']):
                    checked 
                @endif
                >
        </form>
        <div  class="title-task">{{$data['title'] ?? "" }}</div>
    </div>
    <div class="priority">
        <div class="sphere"></div>
        <div class="title-priority">{{$data->category->title ?? ""}}</div>
    </div>
    <div class="actions">
        <a href="{{route('task.edit')}}?id={{$data['id'] ?? ''}}">
            <img src="/assets/images/icon-edit.png" alt="Edit of icon">
        </a>
        <a href="{{route('task.delete')}}?id={{$data['id'] ?? ''}}">
            <img src="/assets/images/icon-delete.png" alt="Delete of icon">
        </a>
    </div>
</div>

