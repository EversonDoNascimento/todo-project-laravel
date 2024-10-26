<x-layout page="Criar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
                    Home
        </a>
    </x-slot:btn>
    <section class="container-create">
        <h1>Criar tarefa</h1>
        <form method="post" action="{{route('task.create_action')}}">
            @csrf
            <x-form.input  
                label="Título da tarefa:" 
                type="text" 
                name="title" 
                required="required" 
                placeholder="Digite o título da tarefa" >
            </x-form.input>
            <x-form.input 
                label="Data de realização:" 
                type="datetime-local" 
                name="duo_date" 
                required="required" 
                placeholder="Digite uma data" >
            </x-form.input>
            <x-form.select 
                value="none"
                label="Categoria:" 
                name="category_id" 
                required="required" 
                placeholder="Caregoria" 
                :data=$categories >
            </x-form.select>
            <x-form.inputArea 
                label="Descrição:" 
                name="description" 
                required="required" 
                placeholder="Digite uma descrição">
            </x-form.inputArea>
            <div class="button-area">
                <x-form.btn type="reset" value="Resetar"></x-form.btn>
                <x-form.btn type="submit" value="Salvar"></x-form.btn> 
            </div>
    
        </form>
    </section>
</x-layout>