<div class="accordion">
    <div class="accordion-item">
        <button class="accordion-header text-center mb-4">User Settings</button>
        <div class="accordion-content">
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Add User</button>
                    <div class="accordion-content">
                        <form action="/user" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Add User</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-header text-center mb-4">Delete User</button>
                    <div class="accordion-content">
                        @foreach ($users as $user)
                            <div class="task-title" style="display: flex; align-items: center; margin-bottom: 10px;">
                                <div>{{ $user->id . ': ' . 'Name: ' . $user->name . ' E-Mail: ' . $user->email }}</div>
                                @if ($user->name !== 'admin')
                                    <form method="POST" action='/user/{{ $user->id }}' style="margin-left: 10px;">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
