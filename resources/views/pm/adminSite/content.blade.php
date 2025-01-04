<div class="accordion">
    <div class="accordion-item">
        <button class="accordion-header text-center mb-4">User  and Projects</button>
        <div class="accordion-content">
            @foreach ($projectUsers as $projectUser )
                @foreach ($users as $user)
                    @if ($user->id == $projectUser ->user_id)
                        <div class="accordion">
                            @foreach ($projects as $project)
                                @if ($project->id == $projectUser ->project_id)
                                    <div class="accordion-item">
                                        <button class="accordion-header project-title">{{ $user->name . ': ' . $project->title }}</button>
                                        <div class="accordion-content">
                                            <h2 class="project-title">{{ $user->name . ': ' . $project->title }}<br></h2>
                                            <h5 class="project-title">{{ $project->description}}</h5>
                                            <div class="mb-4">
                                                @foreach ($tasks as $task)
                                                    @if ($task->project_id == $projectUser ->project_id && $task->user_id == $projectUser ->user_id)
                                                        <div class="task-item">
                                                            <div class="task-title">{{ $task->id . ': ' . $task->title }}</div>
                                                            <div class="task-description">{{ $task->description }}</div>
                                                            <div data-task-id="{{ $task->id }}" class="task-status {{ $task->is_completed ? 'text-success' : 'text-danger' }}" onclick="toggleTaskStatus({{ $task->id }}, {{ $task->is_completed ? 1 : 0 }})">
                                                                {{ $task->is_completed ? 'Completed' : 'Not Completed' }}
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>