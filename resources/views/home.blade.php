
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
            <div class="container-date">
                <a href="{{route('home', ['date' => $data['date_prev_button']])}}"><div class="button-date button-date-prev"></div></a>
                <span id="dateScreen">{{$data["date_as_string"]?? ""}}</span>
                <a href="{{route('home',['date' => $data['date_next_button']])}}"><div class="button-date button-date-next"></div></a>
            </div>
        </div>
        <div class="graph-header-subtitle">Tarefas: <b id="finished-tasks">{{count($data['tasks'])}}/{{$data['qtdTasksFinished']}}</b></div>
        <div class="graph-area">
            <div class="graph-placeholder">
        </div>
        </div>
        <div class="graph-info">
            <div> <img src="/assets/images/icon-info.png" alt=""></div>
            
            <span id="remaining-tasks">Restam {{count($data['tasks']) - $data['qtdTasksFinished']}} tarefas a serem realizadas</span>
        </div>

    </section>
    <section class="list">
        <div class="list-header">
            <select class="list-header-select" name="" id="">
                <option value="1">Todas as tarefas</option>
            </select>
        </div>
        <div class="task-list">
        @foreach($data['tasks'] as $task)
            <x-task :data=$task/>
        @endforeach
        </div>
    </section>
</x-layout>
<script>

//     const buttonsAlterDays = {
//         prevDay: document.querySelector(".button-date-prev"),
//         nextDay: document.querySelector(".button-date-next") 
//     }
//     const dateEl = document.querySelector("#dateScreen");
//     const months = ["Jan","Fev","Mar","Abr","Mai","Jun","Jul","Ago","Set","Out","Nov","Dez"];
//     let countD = 0;
//     // Function return the value of total days of mounth
//    const getLastDayOfMonth = (date) => {
//     // 2024, 9 + 1, 0
//         const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
//         return lastDay.getDate();
//    }


//     const updateDate = (currentDate, days) => {
//         // Sum the current day with days
//         currentDate.setDate(currentDate.getDate() + days);
//         // Get the max quantity of days in the Month
//         const maxDaysInMonth =  getLastDayOfMonth(currentDate);
//         // Verifying if the current date is less than the max days month
//         if(currentDate.getDate() > maxDaysInMonth){
//             currentDate.setDate(maxDaysInMonth);
//         }
//         return currentDate;
//     }

//     const requestTasks = async (fullDate) => {
//         const url = "/";
//         // const data = await fetch(url, {
//         //     method: "GET",
//         //     headers: {
//         //         'Content-type': 'application/json',
//         //         'accept':'application/json'
//         //     },
//         //     body: {fullDate: `${fullDate.year}-${fullDate.month}-${fullDate.day}`, _token: "{{csrf_token()}}"}
//         // })

//         const data = fetch("/?date=2024-10-30");
//         const result = await data;
//         console.log(result);

//     }
//     buttonsAlterDays.nextDay.addEventListener("click", () => {
//         countD++;
//         let fullDate = {
//             day: updateDate(new Date(), countD).getDate(),
//             month: updateDate(new Date(), countD).getMonth(),
//             year: updateDate(new Date(), countD).getFullYear()
//         }
//         dateEl.innerHTML = `${fullDate.day} ${months[fullDate.month]} de ${fullDate.year}`;
//         requestTasks(fullDate);
//     })
//     buttonsAlterDays.prevDay.addEventListener("click", () => {
//         countD--;
//         let fullDate = {
//             day: updateDate(new Date(), countD).getDate(),
//             month: updateDate(new Date(), countD).getMonth(),
//             year: updateDate(new Date(), countD).getFullYear()
//         }
//         dateEl.innerHTML = `${fullDate.day} ${months[fullDate.month]} de ${fullDate.year}`;
//         requestTasks(fullDate);
//     })

   


//     let dateMonth = new Date().getMonth();
//     let day = new Date().getDate();
//     let year = new Date().getFullYear();
//     dateEl.innerHTML = `${day} ${months[dateMonth]} de ${year}`;


   const updateStatus = async (element) => {
    // By Selecting elements, that will have dynamic values
    const finishedTasksEl = document.querySelector("#finished-tasks");
    const remainingTasks = document.querySelector("#remaining-tasks");
    // By Splitting the element value by '/', and creating variables with array values
    const [total, finished] = finishedTasksEl.innerText.split("/");
    // By Getting task status
    let status = element.checked;
    // By Getting task id
    let id = element.dataset.id;
    // By Defining the base url for requisition
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