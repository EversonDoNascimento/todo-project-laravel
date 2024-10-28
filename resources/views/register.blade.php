<x-layout page="Criar tarefa">
    <x-slot:btn>
        <a href="{{route('home')}}" class="btn btn-primary">
                    Home
        </a>
    </x-slot:btn>
    <section class="container-create">
        <h1>Registre-se</h1>
        @if($errors->all())
            <ul class="alert-errors">
                @forEach($errors->all() as $error)   
                    <li>{{$error}}</li>
                @endForEach
            </ul>
        @endif
        <form method="post" action="{{route('user.register_action')}}">
            @csrf
            <x-form.input  
                label="Seu nome" 
                type="text" 
                name="name" 
                required="required" 
                placeholder="Digite seu nome" >
            </x-form.input>
            <x-form.input  
                label="Seu email" 
                type="email" 
                name="email" 
                required="required" 
                placeholder="Digite seu email" >
            </x-form.input>
            <x-form.input  
                label="Sua senha" 
                type="password" 
                name="password" 
                required="required" 
                placeholder="Digite sua senha" >
            </x-form.input>
            <x-form.input  
                label="Confirme a senha" 
                type="password" 
                name="password_confirmation" 
                required="required" 
                placeholder="Confirme sua senha" >
            </x-form.input>
            <div class="button-area">
                <x-form.btn type="reset" value="Limpar"></x-form.btn>
                <x-form.btn type="submit" value="Registre-se"></x-form.btn> 
            </div>
    
        </form>
    </section>
</x-layout>