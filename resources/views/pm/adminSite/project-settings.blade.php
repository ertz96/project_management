<div class="accordion">
    <div class="accordion-item">
        <button class="accordion-header text-center mb-4">Project Settings</button>
        <div class="accordion-content">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Add Project</button>
                    <div class="accordion-content">
                        <form action="/project" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Project Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" id="description" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="user">User E-Mail (Separate multiple users with commas)</label>
                                <input type="text" id="user" name="user" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Project</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Delete Project</button>
                    <div class="accordion-content">
                        @foreach ($projects as $project)
                            <div class="project-title" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div class="task-title" style="color: black">{{ $project->id . ': ' . $project->title }}
                                </div>
                                <form method="POST" action="/project/{{ $project->id }}" style="margin-left: 10px;">
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
