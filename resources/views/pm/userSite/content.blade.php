<div class="accordion">
    @foreach ($projectUsers as $projectUser)
        @foreach ($projects as $project)
            @if ($project->id == $projectUser->project_id)
                <h2 class="project-title">{{ $project->title }}</h2>
                <div class="mb-4">
                    <div class="accordion-item">
                        <button class="accordion-header project-title">{{ $project->title }}</button>
                        <div class="accordion-content">
                            <h5 class="project-title">{{ $project->description}}</h5>
                            @foreach ($tasks as $task)
                                @if ($task->project_id == $projectUser->project_id)
                                    <div class="task-item">
                                        <div class="task-title">{{ $task->title }}</div>
                                        <div class="task-description">{{ $task->description }}</div>
                                        <div data-task-id="{{ $task->id }}"
                                            class="task-status {{ $task->is_completed ? 'text-success' : 'text-danger' }}"
                                            onclick="toggleTaskStatus({{ $task->id }}, {{ $task->is_completed ? 1 : 0 }})">
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
    @endforeach
</div>