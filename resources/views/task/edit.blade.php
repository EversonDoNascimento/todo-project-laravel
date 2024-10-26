<x-layout page="Editar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
                    Home
        </a>
    </x-slot:btn>

    <section class="container-create">
        <h1>Editar tarefa</h1>
        <form method="post" action="{{route('task.edit_action')}}">
            @csrf
            <input type="hidden" value="{{$task->id}}" name="id">
            <x-form.input  
                label="Título da tarefa:"
                value="{{$task->title}}" 
                type="text" 
                name="title" 
                required="required" 
                placeholder="Digite o título da tarefa" >
            </x-form.input>
            <x-form.input 
                label="Data de realização:"
                 value="{{$task->duo_date}}"
                type="datetime-local" 
                name="duo_date" 
                required="required" 
                placeholder="Digite uma data" >
            </x-form.input>
            <x-form.select 
                label="Categoria:"
                value="{{$task->category_id}}" 
                name="category_id" 
                required="required" 
                placeholder="Caregoria" 
                :data=$categories >
            </x-form.select>
            <x-form.inputArea 
                label="Descrição:" 
                name="description" 
                required="required"
                value="{{$task->description}}" 
                placeholder="Digite uma descrição">
            </x-form.inputArea>
            <div class="button-area">
                <x-form.btn type="reset" value="Resetar"></x-form.btn>
                <x-form.btn type="submit" value="Editar"></x-form.btn> 
            </div>
    
        </form>
    </section>
</x-layout>