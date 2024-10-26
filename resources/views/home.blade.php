
<x-layout>
    <x-slot:btn>
        <a href="{{route('task.create')}}" class="btn btn-primary">
                Criar Tarefa
        </a>
    </x-slot:btn>
    <section class="graph">
        <div>                    
            <h2>Progresso do Dia</h2>
            <hr class="line-header" />
            Data
        </div>
        <div class="graph-header-subtitle">Tarefas: <b>6/3</b></div>
        <div class="graph-area">
            <div class="graph-placeholder">
        </div>
        </div>
        <div class="graph-info">
            <div> <img src="/assets/images/icon-info.png" alt=""></div>
            
            <span>Restam 3 tarefas a serem realizadas</span>
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