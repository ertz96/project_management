<div class="accordion">
    <div class="accordion-item">
        <button class="accordion-header text-center mb-4">Task Settings</button>
        <div class="accordion-content">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Add Task</button>
                    <div class="accordion-content">
                        <form action="/task" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Task Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="user">User E-Mail</label>
                                <input type="text" id="user" name="user" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="project">Project ID</label>
                                <input type="text" id="project" name="project" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Task</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Delete Task</button>
                    <div class="accordion-content">
                        @foreach ($tasks as $task)
                            <div class="task-item" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div class="task-title">{{ $task->id . ': ' . $task->title }}</div>
                                <form method="post" action="/task/{{ $task->id }}" style="margin-left: 10px;">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
