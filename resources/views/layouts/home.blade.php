<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
     <div class="container">
        <div class="sidebar">
            <img src="assets/images/logo.png" alt="">
        </div>
        <div class="content">
            <nav>
                <a href="" class="btn btn-primary">
                    Criar Tarefa
                </a>
            </nav>
            <main>
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
                    <p class="graph-header-tasks-left">Restam 3 tarefas a serem realizadas</p>
                </section>
                <section class="list">
                    <div class="list-header">
                        <select class="list-header-select" name="" id="">
                            <option value="1">Todas as tarefas</option>
                        </select>
                    </div>
                    <div class="task-list">
                        <div class="task">
                            <div class="title">
                                <input type="checkbox">
                                <div class="title-task">Título da tarefa</div>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <div class="title-priority">Título da tarefa</div>
                            </div>
                            <div class="actions">
                                <a href="#">
                                    <img src="/assets/images/icon-edit.png" alt="Edit of icon">
                                </a>
                                <a href="#">
                                    <img src="/assets/images/icon-delete.png" alt="Delete of icon">
                                </a>
                            </div>
                        </div>
                        <div class="task">
                            <div class="title">
                                <input type="checkbox">
                                <div class="title-task">Título da tarefa</div>
                            </div>
                            <div class="priority">
                                <div class="sphere"></div>
                                <div class="title-priority">Título da tarefa</div>
                            </div>
                            <div class="actions">
                                Editar - Excluir
                            </div>
                        </div>
                    </div>
                </section>
            </main>
        </div>
     </div>
</body>
</html>