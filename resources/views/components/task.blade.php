<div class="task">
    <div class="title">
     
            <input
                id="is-done"
                type="checkbox"
                data-id="{{$data['id']}}"
                onchange="updateStatus(this)"
                @if($data && $data['is_done']):
                    checked 
                @endif
                >
      
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

   <!-- <form method="get" id="form-is-done" action="{{route('task.is_done')}}">
            <input type="hidden" name="id" value="{{$data['id']}}"> -->