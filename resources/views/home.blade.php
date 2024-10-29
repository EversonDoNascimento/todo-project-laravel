
<x-layout>
    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
                Criar Tarefa
        </a>
        <a style="margin-left: 10px;" href="{{route('user.logout')}}" class="btn btn-primary">
                Sair
        </a>
    </x-slot:btn>
    <section class="graph">
        <div>                    
            <h2>Progresso do Dia</h2>
            <hr class="line-header" />
            Data
        </div>
        <div class="graph-header-subtitle">Tarefas: <b id="finished-tasks">{{count($tasks)}}/{{$qtdTasksFinished}}</b></div>
        <div class="graph-area">
            <div class="graph-placeholder">
        </div>
        </div>
        <div class="graph-info">
            <div> <img src="/assets/images/icon-info.png" alt=""></div>
            
            <span id="remaining-tasks">Restam {{count($tasks) - $qtdTasksFinished}} tarefas a serem realizadas</span>
        </div>

    </section>
    <section class="list">
        <div class="list-header">
            <select class="list-header-select" name="" id="">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">
        @foreach($tasks as $task)
            <x-task :data=$task/>
        @endforeach
        </div>
    </section>
</x-layout>
<script>
   const updateStatus = async (element) => {
    // Selecting elements, that will have dynamic values
    const finishedTasksEl = document.querySelector("#finished-tasks");
    const remainingTasks = document.querySelector("#remaining-tasks");
    // Splitting the element value by '/', and creating variables with array values
    const [total, finished] = finishedTasksEl.innerText.split("/");
    // Getting task status
    let status = element.checked;
    // Getting task id
    let id = element.dataset.id;
    // Defining the base url for requisition
    const url = "{{route('task.is_done')}}"
    const request = await fetch(url, {
        method: "POST",
        headers: {
            "Content-type": "application/json",
            "accept": "application/json"
        },
        // The csrf_token must be send in the requisition
        body: JSON.stringify({status,id,_token: "{{csrf_token()}}"})
    })
    const result = await request.json();
    if(result.success){
        alert("Status atualizado com sucesso!");
        // Verify if status is true or false
        if(status){ 
            finishedTasksEl.innerText = `${total}/${+finished + 1}`;      
            remainingTasks.innerText = `Restam ${total - (+finished + 1)} tarefas  a serem realizadas`;
        }else{
            finishedTasksEl.innerText = `${total}/${+finished - 1}`;
            remainingTasks.innerText = `Restam ${total - (+finished - 1)} tarefas  a serem realizadas`;
        }
 
    }
    else{
        element.checked = !status;
    }
   }
</script>